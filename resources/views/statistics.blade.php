@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-header"><h5>{{ __('a.	Get the number of posts published by each user.') }}</h5>
                    </div>
                    <div class="card-body">
                        @foreach($query_a as $key=>$user)
                            <div>
                                {{$key+1}} - {{$user->name}} <b>({{$user->count}})</b>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-header"><h5>{{ __('b.	Get the number of comments made by each user.') }}</h5>
                    </div>
                    <div class="card-body">
                        @foreach($query_b as $key=>$user)
                            <div>
                                {{$key+1}} - {{$user->name}} <b>({{$user->count}})</b>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('c.	Get the top 5 users who have made the most comments.') }}</h5></div>
                    <div class="card-body">
                        @foreach($query_c as $key=>$user)
                            <div>
                                {{$key+1}} - {{$user->name}} <b>({{$user->count}})</b>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-header"><h5>{{ __('d.	Get the top 5 most commented posts.') }}</h5></div>
                    <div class="card-body">
                        @foreach($query_d as $key=>$post)
                            <div>
                                {{$key+1}} - {{$post->title}} <b>({{$post->count}})</b>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-header"><h5>{{ __('e.	Get the most common tags used in the blog.') }}</h5></div>
                    <div class="card-body">
                        @foreach($query_e as $key=>$tag)
                            <div>
                                {{$key+1}} - {{$tag->name}} <b>({{$tag->count}})</b>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('f.	Get the posts that have the most tags assigned to them.') }}</h5></div>
                    <div class="card-body">
                        @foreach($query_f as $key=>$post)
                            <div>
                                {{$key+1}} - {{$post->title}} <b>({{$post->count}})</b>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-header"><h5>{{ __('g.	Get the users who have never made a comment.') }}</h5>
                    </div>
                    <div class="card-body">
                        @foreach($query_g as $key=>$user)
                            <div>
                                {{$key+1}} - {{$user->name}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
