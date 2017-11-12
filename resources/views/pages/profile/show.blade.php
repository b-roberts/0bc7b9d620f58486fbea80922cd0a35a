@extends('templates.bootstrap')
@section('content')
  <div style="background-image:url('{{url('images/profiles/test.gif')}}') ;    height: calc((100vw - 240px) / 6.2 - 1px);
    background-position: 50% 50%;
    background-size: cover;" ></div>

  <div class="container">
    <div class="media my-4">
      <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar mr-3" alt="user profile image">
      <div class="media-body">
        <div class="title h5">
          <h1>{{$user->name}}</h1>
          <small>

          </small>
        </div>
      </div>
    </div>


    <nav class="nav nav-pills my-3" id="myTab" role="tablist">
      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#tab-schematics" role="tab" aria-controls="nav-home" aria-selected="true">Schematics</a>
      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">About</a>
      <a class="nav-link " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Report User</a>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="tab-schematics" role="tabpanel" aria-labelledby="nav-schematic-tab">
        @foreach($user->schematics as $schematic)
        @include('modules.schematic_media')
        <hr />
        @endforeach

        </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="row">
          <div class="col-8">
            <h2>Description</h2>
            <div>{{$user->description}}</div>
            <h2>Links</h2>
            @foreach($user->socialMedias as $socialMedia)

<a href="{{$socialMedia->url}}{{$socialMedia->pivot->handle}}">{{$socialMedia->name}}</a>
            @endforeach

          </div>
          <div class="col-4">
            <p><strong>Stats</strong></p>
            <p>Joined {{$user->created_at->format('M d, Y')}}</p>
            <p>Schematics {{$user->schematics->count()}}</p>
            <p>Likes {{$user->likes->count()}}</p>
            <p>Views {{$user->views->count()}}</p>
            <p>Downloads {{$user->downloads->count()}}</p>
          </div>

      </div>

    </div>

  </div>
@endsection
