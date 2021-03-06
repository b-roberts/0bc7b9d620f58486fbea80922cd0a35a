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
              <a class="dropdown-item" href="#" onclick="openAbuseReport('schematic',{{$schematic->id}})">Report</a>
            </div>
          </div>
        </div>
      </div>
      <hr />
      <a href="{{route('schematic.download',['id'=>$schematic->id])}}" class="btn btn-primary pull-right mt-3 ml-1">
        <i class="fa fa-download" aria-hidden="true"></i> Download
      </a>
      <div class="media">
        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar mr-3" alt="user profile image">
        <div class="media-body">
          <div class="title h5">
            <a href="#"><b>{{$schematic->author->name}}</b></a>
            <small>
              {{$schematic->created_at->format('M d, Y  g:i A')}}
            </small>
          </div>

          @if ($schematic->created_at != $schematic->updated_at)
            <span class="text-muted">Modified {{$schematic->updated_at->format('M d, Y  g:i A')}}</span>
          @endif
          <div class="post-description">
            <p>{{$schematic->description}}</p>
          </div>
        </div>
      </div>
      <br class="clear clearfix mb-3" style="clear:both;" />
      <hr />
      <h3>Comments</h3>
      {!! Form::open(['route'=>'comment.store', 'files' => true]) !!}
        <input type="hidden" name="schematic_id" value="{{$schematic->id}}" />
        <div class="form-group">
          <label for="ipt-comment" class=" sr-only sr-only-focusable">Comment</label>
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
      {{dump($schematic->yaml)}}
      <div class="card">
        <div class="card-body">
  <h4 class="card-title">Schematic Stats</h4>

<dl  class="card-text">
  <dt>Size</dt>
  <dd>{{$schematic->yaml['info']['size']['X']}} by {{$schematic->yaml['info']['size']['Y']}}</dd>
  <dt>Average Temperature</dt>
  <dd>{{round($temperature,1)}}&deg;K / {{round($temperature-273.15,1)}}&deg;C / {{round($temperature*1.8-459.67,1)}}&deg;F</dd>
</dl>
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
