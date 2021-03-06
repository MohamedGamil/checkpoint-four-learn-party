<?php

namespace LearnParty\Http\Controllers;

use Illuminate\Http\Request;
use LearnParty\Http\Requests;
use Auth;

class CommentController extends Controller
{
    /**
     * Add a new comment to a video
     *
     * @param  Request $request
     * @return array success or failure message
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|max:500',
        ]);
        $newComment = Auth::user()->comments()->create($request->all());
        return [
            'status' => 200,
            'message' => 'New comment succesfully added.'
        ];
    }
}
