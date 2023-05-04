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
        $validator = Validator::make($request->all(), $request->rules());
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        $dataFromRepliesForm = $request->validated();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('files', $filename);
            $dataFromRepliesForm['file_name'] = $filename;
            $dataFromRepliesForm['file_path'] = $path;
        }

        $comment = Comments::findOrFail($dataFromRepliesForm['parent_id']);

        $reply = new Comments((array)$dataFromRepliesForm);
        $reply->parent_id = $comment->id;
        $reply->save();

        return redirect()->back();
    }
}
