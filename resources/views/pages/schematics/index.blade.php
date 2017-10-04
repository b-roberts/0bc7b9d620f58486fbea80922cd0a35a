@extends('templates.bootstrap')
@section('content')
<div class="container">
@foreach($schematics->chunk(4) as $chunk)
  <div class="card-deck">
@foreach($chunk as $schematic)
@include('modules.schematic_card')
@endforeach
</div>
@endforeach
</div>
@endsection
