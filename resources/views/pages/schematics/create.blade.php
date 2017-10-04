@extends('templates/bootstrap')
@section('content')
<div class="container">
<h1>Upload</h1>
<div class="row">
  {!! Form::open() !!}
  {!! Form::text('title') !!}
{!! Form::text('description') !!}
{!! Form::file('image') !!}
{!!Form::select('category_id', ['L' => 'Large', 'S' => 'Small'])!!}
{!! Form::submit('Upload') !!}
  {!! Form::close() !!}
</div>
</div>
@endsection
