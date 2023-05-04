@if(count($comments))
    @foreach($comments as $comment)
        <div class="comment">
            <div class="comment-info">
                <strong class="comment-author">{{ e($comment->name) }}</strong>
                <span class="comment-date">{{ e($comment->created_at->format('d.m.Y H:i')) }}</span>
            </div>
            <div class="comment-text">{{ e($comment->text) }}</div>
            <div class="form-group">
                @if($comment->file_path)
                    <a href="{{ route('file.download', e($comment->file_name)) }}" download>{{ e($comment->file_name) }}</a>
                @endif
            </div>
            <a href="#" class="reply-link">Reply</a>
            <div class="reply-form-container reply-comment">
                <form method="POST" action="{{ route('reply') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" maxlength="100" placeholder="your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control" id="email" maxlength="100" placeholder="example@gmail.com" required>
                    </div>

{{--                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}" data-size="normal" data-theme="light" data-type="image"></div>--}}

                    <div class="form-group">
                        <label for="comment">Comments</label>
                        <textarea class="form-control" name="text" id="comment" rows="5" maxlength="300" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" name="file" class="form-control-file" id="file">
                    </div>

                    <input type="hidden" name="parent_id" value="{{ e($comment->id) }}">

                    <button type="submit" class="btn btn-primary">Add comment</button>
                </form>
            </div>
            @include('comments', ['comments' => $comment->replies])
        </div>
    @endforeach
@endif
