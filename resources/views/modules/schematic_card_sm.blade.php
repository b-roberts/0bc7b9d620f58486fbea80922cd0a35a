<div class="card">
  <a href="{{route('schematic.show',$schematic->id)}}" >
    <div class="row">
      <div class="col-5">
    @if ($schematic->images->count())
      <img class="card-img-top" src="{{asset('\images\\'.$schematic->images->first()->filename)}}" alt="{{$schematic->title}}">
    @endif
  </div>
    <div class="col-7">
      <strong>{{$schematic->title}}</strong>
      <dl class=" list-inline">
        <dt class="list-inline-item"><i class="fa fa-user" aria-hidden="true"></i><span class="sr-only">Views</span></dt>
        <dd class="list-inline-item">{{$schematic->author->name}}</dd><br />
        <dt class="list-inline-item"><i class="fa fa-eye" aria-hidden="true"></i><span class="sr-only">Views</span></dt>
        <dd class="list-inline-item">{{$schematic->views->count()}}</dd>
        <dt class="list-inline-item"><i class="fa fa-heart" aria-hidden="true"></i><span class="sr-only">Views</span></dt>
        <dd class="list-inline-item">{{$schematic->likes->count()}}</dd>
        <dt class="list-inline-item"><i class="fa fa-download" aria-hidden="true"></i><span class="sr-only">Views</span></dt>
        <dd class="list-inline-item">{{$schematic->downloads->count()}}</dd>
        <dt class="list-inline-item"><i class="fa fa-comments" aria-hidden="true"></i><span class="sr-only">Views</span></dt>
        <dd class="list-inline-item">{{$schematic->comments->count()}}</dd>
      </dl>
    </div>
  </div>
  </a>
</div>
