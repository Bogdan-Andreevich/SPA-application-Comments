<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Комментарии</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Комментарии</h1>
    <hr>
    <table id="commentTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>User Name</th>
            <th>E-mail</th>
            <th>Date</th>
            <th>Comment</th>
        </tr>
        </thead>
        <tbody>
        <!-- Здесь будут добавляться комментарии -->
        </tbody>
    </table>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <!-- Здесь будут добавляться ссылки на страницы -->
        </ul>
    </nav>
    <hr>
    <h2>Оставить комментарий</h2>
    <form id="commentForm">
        <div class="form-group">
            <label for="username">Имя пользователя</label>
            <input type="text" class="form-control" id="username">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="comment">Комментарий</label>
            <textarea class="form-control" id="comment" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="script.js"></script>

</body>
</html>
