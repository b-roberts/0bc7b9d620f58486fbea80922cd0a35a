@extends('templates/bootstrap')
@section('content')
<div class="container">
<h1>{{$schematic->title}}</h1>
<div class="row">
<div id="pixi-app"></div>
</div>
{{$schematic->description}}
@foreach($schematic->comments as $comment)
  <div class="col-sm-8">
      <div class="panel panel-white post panel-shadow">
          <div class="post-heading">
              <div class="pull-left image">
                  <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
              </div>
              <div class="pull-left meta">
                  <div class="title h5">
                      <a href="#"><b>{{$comment->author->name}}</b></a>
                      made a post.
                  </div>
                  <h6 class="text-muted time">1 minute ago</h6>
              </div>
          </div>
          <div class="post-description">
              <p>{{$comment->message}}</p>
              <div class="stats">
                  <a href="#" class="btn btn-default stat-item">
                      <i class="fa fa-thumbs-up icon"></i>2
                  </a>
                  <a href="#" class="btn btn-default stat-item">
                      <i class="fa fa-thumbs-down icon"></i>12
                  </a>
              </div>
          </div>
      </div>
  </div>
@endforeach
</div>
@endsection
@push('scripts')
  <script>
var schematic = {!!$schematic->yaml!!};
  </script>
<script src="/js/schematic.js"></script>

@endpush
