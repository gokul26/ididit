@extends('layouts.app')

@section('content')
    <div class="col-sm-12 col-md-8 col-md-offset-2">
        <div class="well">
            <a href="/tasks" class="btn btn-default">Go Back</a>
            <h3>
                @foreach ($creatorname as $creator)
                    <strong>{{$creator->name}}</strong>
                @endforeach
            </h3>
            {!! $tasks->body !!}
            <small>Posted {{$tasks->created_at->diffForHumans()}}</small>
            <span class="pull-right" id="cmt_{{$tasks->id}}" >
                <img style="width:20px;" src="{{ asset('images/comment.png') }}">
                <a href="/tasks/{{$tasks->id}}">{{$comments}} Comments</a>
            </span>
            <span class="pull-right leftspc" id="spnlk_{{$tasks->id}}" onclick="like({{$tasks->id}})">
                <img style="width:20px;" src="{{ asset('images/heart.png') }}">
                <span id="lkcnt_{{$tasks->id}}">{{$likes}}</span>
            </span>
            <hr>
            {{-- Comments Div --}}
            <div id="comments_box"></div>
        </div>
        <div class="well">
            <div class="panel-body">
                <h4>Comment Below</h4>
                <textarea class="form-control" rows="3" id="ncomt"></textarea>
                <br>
                <button class="btn btn-sm btn-success" onclick="comment({{$tasks->id}})">Add Comment</button>
            </div>
        </div>
    </div>
@endsection