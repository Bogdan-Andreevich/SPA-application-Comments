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
        $validator = Validator::make($request->all(), $request->rules());
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $dataFromMainForm = $request->validated();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('public/uploads', $filename);
            $dataFromMainForm['file_path'] = $path;
        }

        Comments::create($dataFromMainForm);
        return back();


    }
}
