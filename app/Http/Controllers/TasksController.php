<?php

namespace App\Http\Controllers;

use App\tasks;
use App\Users;
use App\voting;
use App\Comments;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        //
        $tasks = tasks::orderBy('created_at','desc')->paginate(2);
        foreach ($tasks as $post)
        {
            $votes = Voting::where('postid', '=', $post['id'])->count();
            echo $myvote = Voting::where('postid', '=', $post['id'])->where('userid', '=', auth()->user()->id)->count();
            $cmts = Comments::where('postid', '=', $post['id'])->count();
            $createdBy = Users::select('name')->where('id', '=', $post['user_id'])->get();
        }
        return view('tasks.tasksindex', compact('tasks', 'votes', 'cmts', 'createdBy','myvote'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        
        $this->validate($request, 
        [
            'body'=>'required'
        ]);

        // Creating Posts
        $post = new tasks;
        $post->title = "note_".auth()->user()->id;
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect('/tasks')->with('success', 'Post Created');
    }

    public function show($id)
    {
        $tasks = tasks::findOrFail($id);
        $tuserid = $tasks->user_id;
        $creatorname = Users::select('name')->where('id', $tuserid)->get();
        $comments = Comments::where('postid', '=', $id)->count();
        $likes = Voting::where('postid', '=', $id)->count();
        $myvote = Voting::where('postid', '=', $id)->where('userid', '=', auth()->user()->id)->count();
        return view('tasks.tasksshow',compact('tasks','creatorname', 'likes', 'comments'));
    }

    public function edit(tasks $tasks)
    {
        //
    }

    public function update(Request $request, tasks $tasks)
    {
        //
    }

    public function destroy(tasks $tasks)
    {
        //
    }
}
