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

        $dataFromCommentsForm = Validator::make($request->all(),[
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100',
            'text' => 'required|string|max:100',
            'parent_id' => 'nullable|integer|exists:comments,id'
        ]);

        if($dataFromCommentsForm->fails()) {
            return redirect()->back()->withInput()->withErrors(['comments' => 'Вы ввели неправильные данные']);
        }

//        $captchaData = $request->captcha;
//
//        if (!$captchaData) {
//            return back()->withErrors(['captcha' => 'Пройдите капчу']);
//        }
//
//        $isCaptchaCorrect = $captcha->check($captchaData);
//
//        if (!$isCaptchaCorrect) {
//            return back()->withErrors(['captcha' => 'Код капчи недействителен']);
//        }
        $comment = $request->only('name', 'email', 'text', 'parent_id');
        try {
            Comments::create($comment);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['comments' => 'Ошибка при сохранении комментария']);
        }
        return back();

    }

    function reply(Request $request)
    {
        $dataFromRepliesForm = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'text' => 'required|string|max:1000',
            'parent_id' => 'required|integer',
        ]);

        $comment = Comments::findOrFail($dataFromRepliesForm['parent_id']);

        $reply = new Comments($dataFromRepliesForm);
        $reply->parent_id = $comment->id;
        $reply->save();

        return redirect()->back();
    }
}
