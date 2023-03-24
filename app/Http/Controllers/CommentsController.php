<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use ReCaptcha\ReCaptcha;
use Illuminate\Support\Facades\Validator;
use Mews\Captcha\Captcha;


class CommentsController extends Controller
{
    function create()
    {
        $captcha = app('captcha');
        $comments = Comments::all();
        return view('сascading-сomments', compact('captcha', 'comments'));
    }

    function store(Request $request, Captcha $captcha)
    {

        $dataFromCommentsForm = Validator::make($request->all(),[
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:comments',
            'text' => 'required|string|max:100',
        ]);

        if($dataFromCommentsForm->fails()) {
            return redirect()->back()->withInput()->withErrors(['comments' => 'Вы ввели неправильные данные']);
        }

        $captchaData = $request->captcha;

        if (!$captchaData) {
            return back()->withErrors(['captcha' => 'Пройдите капчу']);
        }

        $isCaptchaCorrect = $captcha->check($captchaData);

        if (!$isCaptchaCorrect) {
            return back()->withErrors(['captcha' => 'Код капчи недействителен']);
        }

        try {
            $comment = Comments::create([
                'name' => $request->name,
                'email' => $request->email,
                'text' => $request->text,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['comments' => 'Ошибка при сохранении комментария']);
        }

        $comments = Comments::all();

        return back()->with(['success' => true, 'comments' => $comments]);

    }
}
