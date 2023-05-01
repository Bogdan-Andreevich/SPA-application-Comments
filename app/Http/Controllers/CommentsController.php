<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Http\Requests\ValidateCommentsFormRequest;
use Illuminate\Support\Facades\Validator;


class CommentsController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('captcha')->only('store');
//    }

    function create($parentId = null): object
    {
        $comments = Comments::where('parent_id', $parentId)->get();
        return view('сascading-сomments', compact('comments', 'parentId'));
    }


    function store(ValidateCommentsFormRequest $request): object
    {
        $comment = Validator::make($request->all(), $this->rules());
        if ($comment->fails()) {
            return redirect()
                ->back()
                ->withErrors($comment)
                ->withInput();
        }

        Comments::create($comment);
        return back();



//        if ($request->hasFile('file')) {
//            $file = $request->file('file');
//            $filename = $file->getClientOriginalName();
//            $path = $file->storeAs('public/uploads', $filename);
//            $comment['file_path'] = $path;
//        }


    }
}
