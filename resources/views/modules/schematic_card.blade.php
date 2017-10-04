<div class="card" style="width: 20rem;">
<img class="card-img-top" src="http://placehold.it/250x150" alt="Card image cap">
  <div class="card-block">
    <h4 class="card-title">{{$schematic->title}}</h4>
    <p class="card-text">{{$schematic->description}}</p>

    <a href="{{route('schematic.show',$schematic->id)}}" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-text">
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
