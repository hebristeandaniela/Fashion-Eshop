@foreach($comments as $comment)
    @php    $dep = $depth - 1; @endphp
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <div class="comment-list">
            <div class="single-comment">
                @if(isset($comment->user_info['photo']))
                    <img src="{{$comment->user_info['photo']}}" alt="#">
                @else 
                    <img src="{{asset('backend/img/avatar.png')}}" alt="">
                @endif
                <div class="content">
                    @if(isset($comment->user_info['name']))
                        <h4>{{$comment->user_info['name']}}
                            <span>At {{$comment->created_at->format('g: i a')}} On
                                {{$comment->created_at->format('M d Y')}}</span>
                        </h4>
                    @else
                        <h4>Unknown User
                            <span>At {{$comment->created_at->format('g: i a')}} On
                                {{$comment->created_at->format('M d Y')}}</span>
                        </h4>
                    @endif
                    <p>{{$comment->comment}}</p>
                    @if($dep)
                        <div class="button">
                            <a href="#" class="btn btn-reply reply" data-id="{{$comment->id}}">
                                <i class="fa fa-reply" aria-hidden="true"></i>Răspunde
                            </a>
                            <a href="" class="btn btn-reply cancel" style="display: none;">
                                <i class="fa fa-trash" aria-hidden="true"></i>Închide
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @include('frontend.pages.comment', ['comments' => $comment->replies, 'depth' => $dep])
    </div>
@endforeach
