<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateCommentsFormRequest;
use App\Models\Comments;
use Illuminate\Support\Facades\Validator;

class RepliesController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('captcha')->only('reply');
//    }

    function reply(ValidateCommentsFormRequest $request): object
    {
        $dataFromRepliesForm = Validator::make($request->all(), $this->rules());
        if ($dataFromRepliesForm->fails()) {
            return redirect()
                ->back()
                ->withErrors($dataFromRepliesForm)
                ->withInput();
        }




//        if ($request->hasFile('file')) {
//            $file = $request->file('file');
//            $filename = $file->getClientOriginalName();
//            $path = $file->storeAs('public/uploads', $filename);
//            $comment['file_path'] = $path;
//        }

        $comment = Comments::findOrFail($dataFromRepliesForm['parent_id']);

        $reply = new Comments((array)$dataFromRepliesForm);
        $reply->parent_id = $comment->id;
        $reply->save();

        return redirect()->back();
    }
}
