<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateCommentsFormRequest;
use App\Models\Comments;

class RepliesController extends Controller
{

    public function __construct()
    {
        $this->middleware('captcha')->only('reply');
    }

    function reply(ValidateCommentsFormRequest $request): object
    {
        $dataFromRepliesForm = $request->validated();
        if(!$dataFromRepliesForm) {
            return redirect()->back()->withErrors($request->errors());
        }




//        if ($request->hasFile('file')) {
//            $file = $request->file('file');
//            $filename = $file->getClientOriginalName();
//            $path = $file->storeAs('public/uploads', $filename);
//            $comment['file_path'] = $path;
//        }

        $comment = Comments::findOrFail($dataFromRepliesForm['parent_id']);

        $reply = new Comments($dataFromRepliesForm);
        $reply->parent_id = $comment->id;
        $reply->save();

        return redirect()->back();
    }
}
