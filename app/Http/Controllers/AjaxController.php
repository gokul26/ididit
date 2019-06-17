<?php

namespace App\Http\Controllers;

use App\voting;
use App\Comments;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function like(Request $request) {
        $msg = "This is a like message.";
        $noteid= $request->input('noteid');
        $vote = new voting;
        $vote->postid = $request->input('noteid');
        $vote->userid = auth()->user()->id;
        $vote->save();
        $votecount= $vote->where('postid', '=', $noteid)->count();
        return response()->json(array('msg'=> $msg,'noteid'=>$noteid,'status'=>'success', 'votecount'=>$votecount), 200);
     }

    public function unlike(Request $request) {
        $msg = "This is a unlike message.";
        $noteid = $request->input('noteid');
        $vuserid = auth()->user()->id;
        $user = voting::where('userid',$vuserid)->delete();
        $vote = new voting;
        $votecount= $vote->where('postid', '=', $noteid)->count();
        return response()->json(array('msg'=> $msg,'noteid'=>$noteid,'status'=>'success', 'votecount'=>$votecount), 200);
     }
}
