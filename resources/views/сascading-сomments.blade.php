<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script defer src="{{ asset("js/CommentsController.js")}}"></script>
    <script defer src="{{ asset("js/TimeConverter.js")}}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="{{ asset("css/CommentsController.css") }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<form method="POST" action="{{ route('сomments') }}">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Комментарии</h1>
                <form id="comment-form">
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Емаил</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>

                    <img src="{{ $captcha->src() }}" alt="captcha">

                    <input id="captcha" type="text" class="form-control" name="captcha">

                    @if ($errors->has('captcha'))
                        <span class="help-block">
                            <strong>{{ $errors->first('captcha') }}</strong>
                        </span>
                    @endif

                    <div class="form-group">
                        <label for="comment">Комментарий</label>
                        <textarea class="form-control" name="text" id="comment" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить комментарий</button>
                </form>
                <hr>
                <div id="comments-list"></div>
            </div>
        </div>
    </div>
</form>
</body>
</html>
