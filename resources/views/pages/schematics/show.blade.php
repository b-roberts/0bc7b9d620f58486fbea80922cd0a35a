@extends('templates/bootstrap')
@section('content')
<div class="container">
  <div class="row mt-3">
    <div class="col-md-8">
      @include('modules.slider')
      <h1 class="h3 mt-3">{{$schematic->title}}</h1>
      <div class="row">
        <div class="col-6">
          <span>{{$schematic->views->count()}}</span> Views
        </div>
        <div class="col-6">
          <div class="btn-group pull-right" role="group" aria-label="Basic example">
            <a href="{{route('schematic.download',['id'=>$schematic->id])}}" class="btn btn-link">
              <i class="fa fa-download" aria-hidden="true"></i> {{$schematic->downloads->count()}}
            </a>
            <button type="button" class="btn btn-link" onclick="$.post('{{route('schematic.like',['id'=>$schematic->id])}}')">
              <i class="fa fa-thumbs-up" aria-hidden="true"></i> {{$schematic->likes->count()}}
            </button>
            <button type="button" class="btn btn-link"><i class="fa fa-share" aria-hidden="true"></i> Share</button>
            <button id="btnGroupDrop1" type="button" class="btn btn-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
              <a class="dropdown-item" href="#">Report</a>
            </div>
          </div>
        </div>
      </div>
      <hr />
      <a href="{{route('schematic.download',['id'=>$schematic->id])}}" class="btn btn-primary pull-right mt-3 ml-1">
        <i class="fa fa-download" aria-hidden="true"></i> Download
      </a>
      @include('modules.comment',['comment'=>$schematic])
      <br class="clear clearfix mb-3" style="clear:both;" />
      <hr />
      <h3>Comments</h3>
      {!! Form::open(['route'=>'comment.store', 'files' => true]) !!}
        <input type="hidden" name="schematic_id" value="{{$schematic->id}}" />
        <div class="form-group">
          <label for="ipt-comment sr-only sr-only-focusable">Comment</label>
          {!! Form::textarea('description', '',[
            'class'=>'form-control',
            'id'=>'ipt-comment',
            'placeholder'=>'Post a public comment...',
            'rows'=>'1']) !!}
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        {!! Form::close() !!}
      @foreach($schematic->comments as $comment)
        @include('modules.comment',['comment'=>$comment])
      @endforeach
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body text-center">
          <img src="https://lh3.googleusercontent.com/LPDN4CF4FjV9AWD8MBqd4eUt35lntHNNkiETOkoJMdxtURb24PRo2hXgA_L-5IEfgMw=w300-h250" />
        </div>
      </div>

      @foreach($suggestions as $suggestion)
        <div class="mt-3">
          @include('modules.schematic_card_sm',['schematic'=>$suggestion])
        </div>
      @endforeach
    </div>
  </div>
@endsection
