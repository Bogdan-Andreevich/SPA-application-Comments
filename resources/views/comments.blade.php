@if(count($comments))
    @foreach($comments as $comment)
        <div class="comment">
            <div class="comment-info">
                <strong class="comment-author">{{ e($comment->name) }}</strong>
                <span class="comment-date">{{ e($comment->created_at->format('d.m.Y H:i')) }}</span>
            </div>
            <div class="comment-text">{{ e($comment->text) }}</div>
            <a href="#" class="reply-link">Reply</a>
            <div class="reply-form-container reply-comment">
                <form method="POST" action="{{ route('reply') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" name="name" class="form-control" id="name" maxlength="100" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Емаил</label>
                        <input type="email" name="email" class="form-control" id="email" maxlength="100" required>
                    </div>
                    <img src="{{ $captcha->src() }}" alt="captcha">

                    <input id="captcha" type="text" class="form-control" name="captcha">

                    <div class="form-group">
                        <label for="comment">Комментарий</label>
                        <textarea class="form-control" name="text" id="comment" rows="5" maxlength="300"
                                  required></textarea>
                    </div>
                    <input type="hidden" name="parent_id" value="{{ e($comment->id) }}">
                    <button type="submit" class="btn btn-primary">Добавить комментарий</button>
                </form>
            </div>
            @include('comments', ['comments' => $comment->replies])
        </div>
    @endforeach
@endif
