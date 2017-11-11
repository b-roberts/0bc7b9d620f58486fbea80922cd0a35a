@extends('templates.bootstrap')
@section('content')
  <div class="container">
    @foreach($schematics->chunk(4) as $chunk)
      <div class="row">
        @foreach($chunk as $schematic)
          <div class="col">
            @include('modules.schematic_card')
          </div>
        @endforeach
      </div>
    @endforeach
  </div>
@endsection
