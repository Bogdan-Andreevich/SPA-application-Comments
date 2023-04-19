<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use ReCaptcha\ReCaptcha;

class CommentsController extends Controller
{
    function create($parentId = null)
    {
        $comments = Comments::where('parent_id', $parentId)->get();
        return view('сascading-сomments', compact('comments', 'parentId'));
    }


    function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100',
            'text' => 'required|string|max:300',
            'parent_id' => 'nullable|integer|exists:comments,id',
            'file' => 'nullable|file|mimes:txt,jpg,png,gif|max:100'

        ]);

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors(['text' => 'Вы ввели неправильные данные']);
        }

        $comment = $request->validate([
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100',
            'text' => 'required|string|max:300',
            'parent_id' => 'nullable|integer|exists:comments,id',
            'file' => 'nullable|file|mimes:txt,jpg,png,gif|max:100'
        ]);

        $recaptcha = new ReCaptcha(env('RECAPTCHA_SECRET_KEY'));
        $response = $recaptcha->verify($request->input('g-recaptcha-response'), $request->ip());

        if (!$response->isSuccess()) {
            return back()->withErrors(['captcha' => 'Пройдите капчу']);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('public/uploads', $filename);
            $comment['file_path'] = $path;
        }

        Comments::create($comment);
        return back();
    }
}
