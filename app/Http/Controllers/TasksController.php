<?php

namespace App\Http\Controllers;

use App\tasks;
use App\Users;
use App\voting;
use App\Comments;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = tasks::orderBy('created_at','desc')->paginate(2);
        foreach ($tasks as $post)
        {
            $votes = Voting::where('postid', '=', $post['id'])->count();
            $myvote = Voting::where('postid', '=', $post['id'])->where('userid', '=', auth()->user()->id)->count();
        }
        foreach ($tasks as $post)
        {
            $cmts = Comments::where('postid', '=', $post['id'])->count();
        }
        foreach ($tasks as $post)
        {
            $createdBy = Users::select('name')->where('id', '=', $post['user_id'])->get();
        }
        return view('tasks.tasksindex', compact('tasks', 'votes', 'cmts', 'createdBy','myvote'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tasks $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(tasks $tasks)
    {
        //
    }
}
