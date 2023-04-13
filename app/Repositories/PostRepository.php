<?php

namespace App\Repositories;

use App\Http\Requests\PostReuest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostRepository
{
    public function index()
    {
        $posts = Post::query();
        if (request()->has('tags') && strlen(request()->get('tags')) > 0) {
            $tags = explode(",", request()->get('tags'));
            if (sizeof($tags) > 0) {
                $posts = $posts->withAnyTag($tags);
            }
        }
        $posts = $posts->orderBy('created_at', 'desc')->paginate(4);
        return $posts;
    }


    public function store(PostReuest $request)
    {
        $input = $request->all();
        $input['added_by'] = auth('web')->user()->id;
        $tags = explode(", ", $input['tags']);
        $post = Post::create($input);
        $post->tag($tags);
    }

    public function edit($id)
    {
        return Post::where('id', $id)->first();
    }

    public function update(PostReuest $request, $id)
    {
        $input = $request->only(['title', 'description', 'tags']);
        $tags = explode(", ", $input['tags']);
        $post = Post::where('id', $id)->update($input);
        Post::where('id', $id)->first()->retag($tags);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->untag(); // remove all tags
        $post->delete();
    }
}
