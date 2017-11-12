<div class="media">
  <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar mr-3" alt="user profile image">
  <div class="media-body">
    <button type="button" class="btn btn-link pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
    </button>
    <div class="dropdown-menu" >
      <a class="dropdown-item" href="#" onclick="openAbuseReport('comment',{{$comment->id}})">Report Comment</a>
    </div>
    <div class="title h5">
      <a href="#"><b>{{$comment->author->name}}</b></a>
      <small>
        {{$comment->created_at->format('M d, Y  g:i A')}}
      </small>
    </div>

    @if ($comment->created_at != $comment->updated_at)
      <span class="text-muted">Modified {{$comment->updated_at->format('M d, Y  g:i A')}}</span>
    @endif
    <div class="post-description">
      <p>{{$comment->description}}</p>
    </div>
  </div>
</div>
