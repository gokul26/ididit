@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                {{-- <div class="panel-heading">What i did interesting Today</div> --}}
                <div class="panel-body">
                        {!! Form::open(['action'=> 'TasksController@store', 'method'=> 'POST','enctype'=>'multipart/form-data'])!!}
                            <div class="form-group">
                            {{Form::label('body', 'What i did interesting Today')}}
                            {{Form::textarea('body', '', ['id'=>'article-ckeditor','class'=>'form-control', 'placeholder'=>'Body'])}}
                            </div>

                            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                        {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
