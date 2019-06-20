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
        $tasks = tasks::orderBy('created_at','desc')->paginate(6);
        foreach ($tasks as $post)
        {
            $myvote = Voting::where('postid', '=', $post['id'])->where('userid', '=', auth()->user()->id)->get();
        }
        // echo "<pre>";
        // var_dump($tasks->toArray());
        // echo "</pre>";
        return view('tasks.tasksindex', compact('tasks','myvote'));
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
        $username = Users::find(auth()->user()->id);
        $postby = $username->name;
        $post = new tasks;
        $post->title = "note_".auth()->user()->id;
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->username = $postby;
        $post->likes = "0";
        $post->comments = "0";
        $post->save();
        return redirect('/tasks')->with('success', 'Post Created');
    }

    public function show($id)
    {
        $tasks = tasks::findOrFail($id);
        $tuserid = $tasks->user_id;
        $creatorname = Users::select('name')->where('id', $tuserid)->get();
        $commentdata = Comments::where('postid', '=', $id)->orderBy('created_at','desc')->get();
        $likes = Voting::where('postid', '=', $id)->count();
        $myvote = Voting::where('postid', '=', $id)->where('userid', '=', auth()->user()->id)->count();
        return view('tasks.tasksshow',compact('tasks','commentdata','creatorname','likes', 'myvote'));
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
