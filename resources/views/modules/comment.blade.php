<div class="media">
  <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar mr-3" alt="user profile image">
  <div class="media-body">
    <button type="button" class="btn btn-link pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
    </button>
    <div class="dropdown-menu" >
      @if(Auth::id() == $comment->author->id)
        <a class="dropdown-item" data-toggle="collapse" data-target ="#comment-{{$comment->id}},#comment-form-{{$comment->id}}">Edit Comment</a>
      @else
        <a class="dropdown-item" href="#" onclick="openAbuseReport('comment',{{$comment->id}})">Report Comment</a>
      @endif
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
      <p id="comment-{{$comment->id}}" class="collapse show">{{$comment->description}}</p>
      @if(Auth::id() == $comment->author->id)
        {!! Form::model($comment,[
          'route'=>['comment.update',$comment->id],
          'method' => 'PUT',
          'id'=>"comment-form-{$comment->id}",
          'class'=>'collapse'
          ]) !!}
          <input type="hidden" name="comment_id" value="{{$comment->id}}" />
          <div class="form-group">
            <label for="ipt-comment" class=" sr-only sr-only-focusable">Comment</label>
            {!! Form::textarea('description', null,[
              'class'=>'form-control',
              'id'=>'ipt-comment',
              'placeholder'=>'Post a public comment...',
              'rows'=>'1']) !!}
            </div>
            <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target ="#comment-{{$comment->id}},#comment-form-{{$comment->id}}">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          {!! Form::close() !!}
      @endif
    </div>
  </div>
</div>
