<div class = "panel panel-default" id="reply-{!! $reply->id !!}">
    <div class = "panel-heading">
      <div class="level">
          <h5 class="flex">
              <a href = "{!! route('profile', $reply->owner) !!}">{{$reply->owner->name}}</a>
              said {{$reply->created_at->diffForHumans()}}...
          </h5>
          <div>
              <form action = "/replies/{!! $reply->id !!}/favourites" method="post">
                  {!! csrf_field() !!}
                  <button type="submit" class="btn btn-default"{!! $reply->isFavourited() ? 'disabled' : ''!!} >
                      {!! $reply->favourites_count !!} {!! str_plural('Favourite', $reply->favourites_count) !!}
                  </button>
              </form>
          </div>
      </div>
    </div>
    <div class = "panel-body">
        {{$reply->body}}
    </div>
</div>