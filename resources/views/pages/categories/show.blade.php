@extends('templates.bootstrap')
@section('content')
  <div class="container">
    <h1 class="mt-3">{{$category->title}}</h1>
    <div class="mb-3">{{$category->description}}</div>
    @foreach($schematics->chunk(4) as $chunk)
      <div class="row">
        @foreach($chunk as $schematic)
          <div class="col-md-3">
            @include('modules.schematic_card')
          </div>
        @endforeach
      </div>
    @endforeach
    <div class="d-flex mt-3" style="justify-content:center;">
      {{ $schematics->links('vendor.pagination.bootstrap-4')}}
    </div>
  </div>
@endsection
