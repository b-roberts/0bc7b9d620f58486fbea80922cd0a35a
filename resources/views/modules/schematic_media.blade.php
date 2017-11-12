  <a href="{{route('schematic.show',$schematic->id)}}" class="text-dark row my-3" >

    <div class="col-4" style="height:150px;">
    @if ($schematic->images->count())
      <img class="d-block m-auto" style="height:150px;" src="{{asset('\images\\'.$schematic->images->first()->filename)}}" alt="{{$schematic->title}}">
    @endif
  </div>
  <div class="col-8">
      <strong>{{$schematic->title}}</strong>
      <dl class=" list-inline">
        <dt class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i><span class="sr-only">Published</span></dt>
        <dd class="list-inline-item">{{$schematic->updated_at->format('M d, Y  g:i A')}}</dd><br />
        <dt class="list-inline-item"><i class="fa fa-eye" aria-hidden="true"></i><span class="sr-only">Views</span></dt>
        <dd class="list-inline-item">{{$schematic->views->count()}}</dd>
        <dt class="list-inline-item"><i class="fa fa-heart" aria-hidden="true"></i><span class="sr-only">Views</span></dt>
        <dd class="list-inline-item">{{$schematic->likes->count()}}</dd>
        <dt class="list-inline-item"><i class="fa fa-download" aria-hidden="true"></i><span class="sr-only">Views</span></dt>
        <dd class="list-inline-item">{{$schematic->downloads->count()}}</dd>
        <dt class="list-inline-item"><i class="fa fa-comments" aria-hidden="true"></i><span class="sr-only">Views</span></dt>
        <dd class="list-inline-item">{{$schematic->comments->count()}}</dd>
      </dl>
      <div>{{$schematic->description}}</div>
</div>
  </a>
