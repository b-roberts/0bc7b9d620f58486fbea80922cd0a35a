@extends('templates/bootstrap')
@section('content')
<div class="container">
<h1>Publish Schematic</h1>
{!! Form::open(['route'=>'schematic.store', 'files' => true]) !!}

  <div class="form-group">
    <label for="ipt-title">Title</label>
      {!! Form::text('title', '',['class'=>'form-control','id'=>'ipt-title']) !!}
  </div>
  <div class="form-group">
    <label for="ipt-description">Description</label>
      {!! Form::textarea('description', '',['class'=>'form-control','id'=>'ipt-description']) !!}
     <small class="form-text text-muted">Markdown is supported. </small>
  </div>
  <div class="form-group">
    <label for="ipt-category">Category</label>
      {!!Form::select('category_id', ['1' => 'Large', '2' => 'Small'],'',['class'=>'form-control','id'=>'ipt-category'])!!}

  </div>
  <div class="row">
    <div class="col-12 col-md-6">
  <div class="form-group">
    <label for="ipt-image">Primary Image</label>
    {!! Form::file('image', ['class'=>'form-control-file','id'=>'ipt-image'])  !!}
    <small class="form-text text-muted">Select the primary image for this schematic. Additional images may be added later.</small>
  </div>
</div>
<div class="col-12 col-md-6">
  <div class="form-group">
    <label for="ipt-schematic">Schematic File</label>
    {!! Form::file('schematic', ['class'=>'form-control-file','id'=>'ipt-schematic'])  !!}
  </div>
</div>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
@endsection
