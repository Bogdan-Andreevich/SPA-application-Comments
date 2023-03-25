import './bootstrap';

$(document).ready(function () {
    $('.reply-button').on('click', function () {
        var commentId = $(this).data('comment-id');
        $('input[name="parent_id"]').val(commentId);
        $('#comment').focus();
    });
});
