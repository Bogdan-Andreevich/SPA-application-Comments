<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use ReCaptcha\ReCaptcha;
use Illuminate\Support\Facades\Validator;
use Mews\Captcha\Captcha;


class CommentsController extends Controller
{
    function create()
    {
        $captcha = app('captcha');
        return view('сascading-сomments', compact('captcha'));
    }

    function store(Request $request, Captcha $captcha)
    {

//        $dataFromCommentsForm = Validator::make($request->all(),[
//            'name' => 'required|string|between:2,100',
//            'email' => 'required|string|email|max:100|unique:comments',
//            'captcha' => 'required|captcha',
//            'text' => 'required|string|max:100',
//        ]);
        $dataFromCommentsForm = $request->all();

        $captchaData = $request->captcha;
        $isCaptchaCorrect = $captcha->check($captchaData);

        if (!$isCaptchaCorrect) {
            return back()->withErrors(['captcha' => 'The captcha code is invalid.']);
        }
//        if($dataFromCommentsForm->fails()) {
//            return redirect()->back()->withInput()->withErrors(['comments' => 'You entered the wrong data']);
//        }

//        $captcha->remove('captcha');
        try {
            $comment = Comments::create([
                'name' => $request->name,
                'email' => $request->email,
                'text' => $request->text,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['comments' => 'Error saving comment']);
        }

        return $comment;



    }
}
