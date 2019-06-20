<?php

namespace App\Http\Controllers;

use App\voting;
use App\tasks;
use App\Users;
use App\Comments;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function like(Request $request) 
    {
        $msg = "This is a like message.";
        $noteid= $request->input('noteid');
        $vote = new voting;
        $votecount= $vote->where('postid', '=', $noteid)->count();
        $vote->postid = $request->input('noteid');
        $vote->userid = auth()->user()->id;
        $vote->save();
        // $posts = new tasks;
        // $posts->likes = $votecount;
        // $posts->save();
        return response()->json(
            array('msg'=> $msg,
            'noteid'=>$noteid,
            'status'=>'success', 
            'votecount'=>$votecount)
            , 200);
    }

    public function unlike(Request $request) 
    {
        $msg = "This is a unlike message.";
        $noteid = $request->input('noteid');
        $vuserid = auth()->user()->id;
        $user = voting::where('userid','=',$vuserid)->where('postid','=',$noteid)->delete();
        $vote = new voting;
        $votecount= $vote->where('postid', '=', $noteid)->count();
        return response()->json(
                array(
                    'msg'=> $msg,
                    'noteid'=>$noteid,
                    'status'=>'success', 
                    'votecount'=>$votecount), 200);
    }

    public function comment(Request $request)
    {
        $msg = "This is a Comment message.";
        $noteid =  $request->input('noteid');
        $username = Users::find(auth()->user()->id);
        $postby = $username->name;
        $cmts = new Comments;
        $cmts->postid = $request->input('noteid');
        $cmts->comment = $request->input('comment');
        $cmts->userid = auth()->user()->id;
        $cmts->username = $postby;
        $cmts->likes = "test";
        $cmts->save();
        $cmtcount= $cmts->where('postid', '=', $noteid)->count();
        // $tasks = new tasks;
        // $tasks->comment = $votecount;
        // $tasks->save();
        return response()->json(
            array('msg'=> $msg, 
                'noteid'=> $request->input('noteid'), 
                'comment'=> $request->input('comment'),
                'status'=>'success'), 200
        );
    }

    public function getComment(Request $request)
    {
        $msg = "This is a Getting message.";
        $noteid =  $request->input('noteid');
        $comments = Comments::where("postid", $noteid)->orderBy('created_at','desc')->get();
        foreach ($comments as $comment)
        {
            $createdBy = Users::select('name')->where('id', '=', $comment['userid'])->get();
        }
        return response()->json(
            array('msg'=> $msg, 
                'noteid'=> $request->input('noteid'), 
                'comments'=> $comments, 
                'createdBy' =>$createdBy ,
                'status'=>'success'), 200);
    }
}
