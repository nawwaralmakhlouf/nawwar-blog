<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    private $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function store(CommentRequest $request)
    {
        $this->commentRepository->store($request);
        return back()->with('success', 'Comment created successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->commentRepository->update($request, $id);
        return back()->with('success', 'Comment updated successfully.');
    }

    public function destroy($id)
    {
        $this->commentRepository->destroy($id);
        return back()->with('success', 'Comment deleted successfully.');
    }

}
