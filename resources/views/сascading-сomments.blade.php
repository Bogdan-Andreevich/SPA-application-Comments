<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script defer src="{{ asset("js/Comments.js")}}"></script>
    <script defer src="{{ asset("js/test.js")}}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="{{ asset("css/Comments.css") }}">
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

                    {{--                    <img src="{{ $captcha->src() }}" alt="captcha">--}}

                    {{--                    <input id="captcha" type="text" class="form-control" name="captcha">--}}

                    @if ($errors->has('captcha'))
                        <span class="help-block">
                            <strong>{{ $errors->first('captcha') }}</strong>
                        </span>
                    @endif

                    <div class="form-group">
                        <label for="comment">Комментарий</label>
                        <textarea class="form-control" name="text" id="comment" rows="5" required></textarea>
                    </div>

                    @if ($errors->has('comment'))
                        <span class="help-block">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                    @endif
                    <button type="submit" class="btn btn-primary">Добавить комментарий</button>
                </form>
                <hr>
                <div id="comments-list">
                    @foreach($comments as $comment)
                        <div class="comment">
                            <div class="comment-info">
                                <strong class="comment-author">{{ $comment->name }}</strong>
                                <span class="comment-date">{{ $comment->created_at->format('d.m.Y H:i') }}</span>
                            </div>
                            <div class="comment-text">{{ $comment->text }}</div>
                            <a href="#" class="reply-link">Reply</a>
                            <div class="reply-form-container reply-comment"> <!-- add class reply-comment here -->
                                <form method="POST" action="{{ route('reply') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Имя</label>
                                        <input type="text" name="name" class="form-control" id="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Емаил</label>
                                        <input type="email" name="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Комментарий</label>
                                        <textarea class="form-control" name="text" id="comment" rows="5" required></textarea>
                                    </div>
                                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                    <button type="submit" class="btn btn-primary">Добавить комментарий</button>
                                </form>
                            </div>
                            <div class="nested-comments"> <!-- move nested-comments inside comment-text -->
                                @if(count($comment->replies))
                                    @foreach($comment->replies as $reply)
                                        <div class="comment nested-comment">
                                            <div class="comment-info">
                                                <strong class="comment-author">{{ $reply->name }}</strong>
                                                <span class="comment-date">{{ $reply->created_at->format('d.m.Y H:i') }}</span>
                                            </div>
                                            <div class="comment-text">{{ $reply->text }}</div>
                                            <a href="#" class="reply-link">Reply</a>
                                            <div class="reply-form-container reply-comment"> <!-- add class reply-comment here -->
                                                <form method="POST" action="{{ route('reply') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="name">Имя</label>
                                                        <input type="text" name="name" class="form-control" id="name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Емаил</label>
                                                        <input type="email" name="email" class="form-control" id="email" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="comment">Комментарий</label>
                                                        <textarea class="form-control" name="text" id="comment" rows="5" required></textarea>
                                                    </div>
                                                    <input type="hidden" name="parent_id" value="{{ $reply->id }}">
                                                    <button type="submit" class="btn btn-primary">Добавить комментарий</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</form>
</body>
</html>
