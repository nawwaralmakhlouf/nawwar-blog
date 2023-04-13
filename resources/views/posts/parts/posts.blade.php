<div class="card">
    <div class="card-header bg-info text-white">
        <h4>Posts</h4>
    </div>
    <div class="card-body card-body-posts">
        @if($posts->count())
            <form class="display-inline form-inline" method="get"
                  action="{{route('posts.index')}}">
                <input type="text" placeholder="Search posts by" data-role="tagsinput" name="tags"
                       class="form-control tags"
                       value="{{request()->get('tags')}}">
                <button class="btn btn-sm btn-success">Search</button>
            </form>
            @foreach($posts as $post)
                <div class="post-section">
                    <div class="post-title">
                        <div class="row">
                            <div class="col-3 col-sm-1">
                                <img src="{{asset('assets/imgs/post-icon.png')}}" class="post-icon" width="40">
                            </div>
                            <div class="col-9 col-sm-8">
                                <h5 class="post-user">{{ $post->user?->name }}</h5>
                                <h6 class="post-date">{{$post->created_at}}</h6>
                            </div>
                            <div class="col-12 col-sm-3 text-right">
                                @if(auth('web')->check() && auth('web')->user()->id==$post->added_by)
                                    <a class="btn btn-sm btn-primary" href="{{route('posts.edit',$post->id)}}">Edit</a>
                                    <form class="display-inline" method="post"
                                          action="{{route('posts.destroy',$post->id)}}"
                                          onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        {{csrf_field()}}
                                        {!! @method_field('DELETE') !!}
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="post-description">
                        <h5 class="post-title">{{ $post->title }}</h5>
                        <p class="post-content">{{ $post->description }}</p>
                    </div>
                    <div class="post-tags mb-4">
                        @foreach($post->tags as $tag)
                            <span class="badge badge-info ml-1">#{{$tag->name}}</span>
                        @endforeach
                    </div>
                    <div class="post-comments mb-4">
                        @foreach($post->comments as $comment)
                            <div class="row comment">
                                <div class="col-12 col-sm-2">
                                    <div class="comment-user">{{$comment->user?->name}}</div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="comment-content">{{$comment->text}}</div>
                                    <span class="comment-date">{{$comment->created_at}}</span>
                                </div>
                                <div class="col-12 col-sm-4 text-right">
                                    @if(auth('web')->check() && auth('web')->user()->id==$post->added_by && $comment->status=='pending')
                                        <form class="display-inline" method="POST"
                                              action="{{ route('comments.update',$comment->id) }}">
                                            {{csrf_field()}}
                                            {!! @method_field('PUT') !!}
                                            <button class="btn btn-sm btn-success">Approve</button>
                                        </form>
                                    @endif
                                    @if(auth('web')->check() && auth('web')->user()->id==$comment->added_by)
                                        <form class="display-inline" method="post"
                                              action="{{route('comments.destroy',$comment->id)}}"
                                              onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            {{csrf_field()}}
                                            {!! @method_field('DELETE') !!}
                                            <button class="btn btn-sm btn-danger">X</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        <div class="row comment-add">
                            <form class="display-inline" method="post"
                                  action="{{route('comments.store')}}">
                                @csrf
                                <input type="hidden" value="{{$post->id}}" name="post_id">
                                <input type="text" value="" placeholder="Enter comment here" class="form-control"
                                       name="text">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $posts->links() }}
        @else
            <div class="alert alert-info text-center">
                No Posts yet!
            </div>
        @endif
    </div>
</div>
