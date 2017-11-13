@extends('templates.bootstrap')
@section('content')
  <div class="container">
    @foreach($categories as $category)
      <a href="{{route('category.show',$category->id)}}" class="btn btn-secondary float-right my-3">View All</a>
      <h2><a class="text-dark" href="{{route('category.show',$category->id)}}">{{$category->title}}</a></h2>
      <div class="mb-3">{{$category->description}}</div>
      <div class="row">
        @foreach($category->schematics->take(4) as $schematic)
          <div class="col col-md-3">
            @include('modules.schematic_card')
          </div>
        @endforeach
      </div>
<hr />
    @endforeach
  </div>
@endsection
