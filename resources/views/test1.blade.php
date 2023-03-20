<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script defer src="{{ asset("js/test1.js")}}"></script>
    <link rel="stylesheet" href="{{ asset("css/test1.css") }}">
</head>
<body>
{{--<script>--}}
{{--    const form = document.querySelector('form');--}}
{{--    const commentsList = document.querySelector('#comments-list');--}}

{{--    form.addEventListener('submit', (e) => {--}}
{{--        e.preventDefault();--}}

{{--        const name = form.elements.name.value;--}}
{{--        const email = form.elements.email.value;--}}
{{--        const message = form.elements.message.value;--}}

{{--        const comment = document.createElement('li');--}}
{{--        comment.className = 'comment';--}}

{{--        const heading = document.createElement('h4');--}}
{{--        heading.textContent = name;--}}

{{--        const emailPara = document.createElement('p');--}}
{{--        emailPara.textContent = email;--}}

{{--        const messagePara = document.createElement('p');--}}
{{--        messagePara.textContent = message;--}}

{{--        comment.appendChild(heading);--}}
{{--        comment.appendChild(emailPara);--}}
{{--        comment.appendChild(messagePara);--}}

{{--        commentsList.appendChild(comment);--}}

{{--        form.reset();--}}
{{--    });--}}

{{--</script>--}}
{{--<style>--}}
{{--    form {--}}
{{--        border: 1px solid #ccc;--}}
{{--        padding: 10px;--}}
{{--        margin-bottom: 20px;--}}
{{--    }--}}

{{--    label {--}}
{{--        display: block;--}}
{{--        margin-bottom: 10px;--}}
{{--    }--}}

{{--    input[type="text"],--}}
{{--    input[type="email"],--}}
{{--    textarea {--}}
{{--        width: 100%;--}}
{{--        padding: 5px;--}}
{{--        margin-bottom: 10px;--}}
{{--    }--}}

{{--    button[type="submit"] {--}}
{{--        background-color: #4CAF50;--}}
{{--        color: white;--}}
{{--        padding: 10px;--}}
{{--        border: none;--}}
{{--        cursor: pointer;--}}
{{--    }--}}

{{--    button[type="submit"]:hover {--}}
{{--        background-color: #45a049;--}}
{{--    }--}}

{{--    #comments {--}}
{{--        margin-top: 20px;--}}
{{--    }--}}

{{--    #comments h3 {--}}
{{--        margin-bottom: 10px;--}}
{{--    }--}}

{{--    #comments-list {--}}
{{--        list-style: none;--}}
{{--        padding: 0;--}}
{{--        margin: 0;--}}
{{--    }--}}

{{--    .comment {--}}
{{--        border: 1px solid #ccc;--}}
{{--        padding: 10px;--}}
{{--        margin-bottom: 10px;--}}
{{--    }--}}

{{--</style>--}}
<form>
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name"><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br><br>

    <label for="message">Сообщение:</label>
    <textarea id="message" name="message"></textarea><br><br>

    <button type="submit">Отправить</button>
</form>

<div id="comments">
    <h3>Комментарии:</h3>
    <ul id="comments-list"></ul>
</div>


</body>
</html>
