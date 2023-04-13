<?php

namespace App\Repositories;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentRepository
{
    public function store(CommentRequest $request)
    {
        $input = $request->only('post_id', 'text');
        $input['added_by'] = auth('web')->user()->id;
        Comment::create($input);
    }

    public function update(Request $request, $id)
    {
        Comment::where('id', $id)->update([
            'status' => 'approved'
        ]);
    }

    public function destroy($id)
    {
        $post = Comment::find($id);
        $post->delete();
    }
}
