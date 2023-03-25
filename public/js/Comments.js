// // Добавляем комментарий
function addComment(name, comment, parentComment) {
    var commentsList = document.getElementById("comments-list");

    // Получаем текущую дату и время
    var currentDate = new Date();
    var dateString = currentDate.toLocaleString();

    // Создаем новый комментарий
    var commentEl = document.createElement("div");
    commentEl.classList.add("comment");

    var nameEl = document.createElement("h4");
    nameEl.textContent = name + " - " + dateString; // Добавляем дату к имени
    commentEl.appendChild(nameEl);

    var commentBodyEl = document.createElement("p");
    commentBodyEl.textContent = comment;
    commentEl.appendChild(commentBodyEl);

    var replyBtnEl = document.createElement("button");
    replyBtnEl.classList.add("btn", "btn-link");
    replyBtnEl.textContent = "Ответить";
    replyBtnEl.addEventListener("click", function() {
        var replyFormEl = commentEl.querySelector(".reply-form");
        replyFormEl.classList.toggle("show");
    });
    commentEl.appendChild(replyBtnEl);

    // Добавляем форму для ответа на комментарий
    var replyFormEl = document.createElement("form");
    replyFormEl.classList.add("reply-form", "form-group");
    replyFormEl.innerHTML = `
    <div class="form-group">
      <label for="name">Имя</label>
      <input type="text" class="form-control" id="name" required>
    </div>
    <div class="form-group">
      <label for="comment">Комментарий</label>
      <textarea class="form-control" id="comment" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
  `;
    replyFormEl.addEventListener("submit", function(event) {
        event.preventDefault();

        var name = event.target.querySelector("#name").value;
        var comment = event.target.querySelector("#comment").value;

        addComment(name, comment, commentEl);

        // Скрываем форму ответа на комментарий
        replyFormEl.classList.remove("show");
    });
    commentEl.appendChild(replyFormEl);

    // Если указан родительский комментарий, то добавляем текущий комментарий как дочерний
    if (parentComment) {
        commentEl.classList.add("ml-4"); // Добавляем отступ для дочернего комментария
        parentComment.appendChild(commentEl);
    } else {
        commentsList.appendChild(commentEl);
    }
}

// Добавляем обработчик события отправки формы комментария
var commentFormEl = document.getElementById("comment-form");
commentFormEl.addEventListener("submit", function(event) {
    event.preventDefault();

    var name = event.target.querySelector("#name").value;
    var comment = event.target.querySelector("#comment").value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/comments');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200 && xhr.responseText) {
            var parentCommentEl = document.getElementById('comments-list');
            addComment(name, comment, parentCommentEl);
        }
    };
    xhr.send(encodeURI('name=' + name + '&comment=' + comment));
});
