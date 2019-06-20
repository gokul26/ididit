@extends('layouts.app')

@section('content')
<h1>What's Interesting Today</h1>
    @if(count($tasks)>0)
    <div class="row">
        @foreach ($tasks as $post)
        <div class="col-md-6 col-sm-12">
            <div class="well">
                <h3>
                    {{$post->username}}
                </h3>
                <a href="/tasks/{{$post->id}}">
                    {!!$post->body!!}
                </a>
                Posted {{$post->created_at->diffForHumans()}}
                <span class="pull-right leftspc" id="cmt_{{$post->id}}" >
                    <img style="width:20px;" src="{{ asset('images/comment.png') }}">
                    <a href="/tasks/{{$post->id}}">{{$post->comments}} Comments</a>
                </span>
                <span class="pull-right">
                    <img style="width:20px;" src="{{ asset('images/heart.png') }}">
                    {{$post->likes}}
                </span>
            </div>
        </div>
        @endforeach
    </div>
        {{$tasks->links()}}
    @else
        <div class="row">
            <h4>NOTHING WRITTEN SO FAR</h4>
        </div>
    @endif
@endsection