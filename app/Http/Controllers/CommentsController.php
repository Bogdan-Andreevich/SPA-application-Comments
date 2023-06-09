<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mews\Captcha\Captcha;


class CommentsController extends Controller
{
    function create($parentId = null)
    {
        $captcha = app('captcha');
        $comments = Comments::where('parent_id', $parentId)->get();
        return view('сascading-сomments', compact('captcha', 'comments', 'parentId'));
    }


    function store(Request $request, Captcha $captcha)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100',
            'text' => 'required|string|max:300',
            'parent_id' => 'nullable|integer|exists:comments,id'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors(['text' => 'Вы ввели неправильные данные']);
        }

        $comment = $request->validate([
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100',
            'text' => 'required|string|max:300',
            'parent_id' => 'nullable|integer|exists:comments,id'
        ]);

        $captchaData = $request->captcha;

        if (!$captchaData) {
            return back()->withErrors(['captcha' => 'Пройдите капчу']);
        }

        $isCaptchaCorrect = $captcha->check($captchaData);

        if (!$isCaptchaCorrect) {
            return back()->withErrors(['captcha' => 'Код капчи недействителен']);
        }


        Comments::create($comment);
        return back();

    }

    function reply(Request $request, Captcha $captcha)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100',
            'text' => 'required|string|max:300',
            'parent_id' => 'nullable|integer|exists:comments,id'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors(['text' => 'Вы ввели неправильные данные']);
        }

        $dataFromRepliesForm = $request->validate([
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100',
            'text' => 'required|string|max:300',
            'parent_id' => 'nullable|integer|exists:comments,id'
        ]);

        $captchaData = $request->captcha;

        if (!$captchaData) {
            return back()->withErrors(['captcha' => 'Пройдите капчу']);
        }

        $isCaptchaCorrect = $captcha->check($captchaData);

        if (!$isCaptchaCorrect) {
            return back()->withErrors(['captcha' => 'Код капчи недействителен']);
        }

        $comment = Comments::findOrFail($dataFromRepliesForm['parent_id']);

        $reply = new Comments($dataFromRepliesForm);
        $reply->parent_id = $comment->id;
        $reply->save();

        return redirect()->back();
    }
}
