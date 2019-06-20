@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard
                    <span class="pull-right">
                        <a href="/create" class="btn btn-sm btn-primary">Post something Interesting</a>
                        <a href="/tasks" class="btn btn-sm btn-success">See Posts</a>
                    </span>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Start your Contribution by posting Interesting.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
