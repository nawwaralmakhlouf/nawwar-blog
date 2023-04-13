@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
        @endif
        <div class="row mr-0 justify-content-center">
            @if(auth('web')->check())
                <div class="col-md-4">
                    @if(!isset($edit_post))
                        @include('posts.parts.create')
                    @else
                        @include('posts.parts.edit')
                    @endif
                </div>
            @endif
            <div class="col-md-8">
                @include('posts.parts.posts')
            </div>
        </div>
    </div>
@endsection
