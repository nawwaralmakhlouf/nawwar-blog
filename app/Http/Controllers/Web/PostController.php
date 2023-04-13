<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostReuest;
use App\Models\Post;
use App\Repositories\PostRepository;

class PostController extends Controller
{

    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->index();
        return view('posts.index', compact('posts'));
    }


    public function store(PostReuest $request)
    {
        $this->postRepository->store($request);
        return back()->with('success', 'Post created successfully.');
    }

    public function edit($id)
    {
        $posts = $this->postRepository->index();
        $edit_post = $this->postRepository->edit($id);
        return view('posts.index', compact('posts', 'edit_post'));
    }

    public function update(PostReuest $request, $id)
    {
        $this->postRepository->update($request, $id);
        return back()->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $this->postRepository->destroy($id);
        return back()->with('success', 'Post deleted successfully.');
    }

}
