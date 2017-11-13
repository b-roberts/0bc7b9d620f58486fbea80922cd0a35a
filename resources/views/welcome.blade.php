@extends('templates/bootstrap')

@section('content')
{{-- http://i.imgur.com/NfQGhBq.jpg --}}
    <section class="jumbotron text-center" style="background-image:url('http://i.imgur.com/NfQGhBq.jpg'); background-position:0 50%;background-size:cover">

        <div class="row">
          <div class="col-4 ml-auto">
        <h1 class="jumbotron-heading text-white">ONI Schematics</h1>
        <p class="lead text-white">The easiest way to share your experiments and creations with your fellow duplicant wranglers.</p>
        <p>
          @if (Auth::check())
            <a href="{{route('schematic.create')}}" class="btn btn-primary">Publish a Schematic</a>
          @else
            <a href="{{route('register')}}" class="btn btn-primary">Get Registered</a>
          @endif
        </p>
      </div>

  </div>
    </section>
    <div class="container">
      <h2>Most Recent</h2>
        <div class="row">
          @foreach($mostRecent as $schematic)
            <div class="col">
              @include('modules.schematic_card')
            </div>
          @endforeach
        </div>
      <h2>Most Liked</h2>
      <div class="row">
        @foreach($mostLiked as $schematic)
          <div class="col">
            @include('modules.schematic_card')
          </div>
        @endforeach
      </div>
      <h2>Most Downloaded</h2>
      <div class="row">
        @foreach($mostDownloaded as $schematic)
          <div class="col">
            @include('modules.schematic_card')
          </div>
        @endforeach
      </div>
    </div>
@endsection
