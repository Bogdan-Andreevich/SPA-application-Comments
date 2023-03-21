<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use ReCaptcha\ReCaptcha;

class CommentsController extends Controller
{
    function create()
    {
        return view('сascading-сomments');
    }

    function store(Request $request)
    {
        $recaptcha = new ReCaptcha(env('RECAPTCHA_SECRET_KEY'));
        $response = $recaptcha->verify($request->input('g-recaptcha-response'), $request->ip());

        if (!$response->isSuccess()) {
            return redirect()->back()->withInput()->withErrors(['captcha' => 'reCAPTCHA verification failed.']);
        }
        $dataFromCommentsForm = $request->validate([
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:comments',
            'text' => 'required|string|max:100',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        if($dataFromCommentsForm->fails()) {
            return redirect()->back()->withInput()->withErrors(['comments' => 'You entered the wrong data']);
        }

    }
}
