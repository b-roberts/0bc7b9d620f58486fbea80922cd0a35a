<div style="min-width:250px;" class="container">
  <div><small>
    {{$notification->created_at->format('M d, Y  g:i A')}}
  </small></div>
  <a href="{{$notification->data['url']}}">{{$notification->data['description']}}</a>
</div>
