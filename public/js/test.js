document.addEventListener('DOMContentLoaded', function() {
    // Получаем все контейнеры с формами ответа на комментарий и закрываем их
    var replyForms = document.querySelectorAll('.reply-form-container');
    for (var j = 0; j < replyForms.length; j++) {
        replyForms[j].style.display = 'none';
    }

    // Получаем все ссылки Reply
    var replyLinks = document.querySelectorAll('.reply-link');

    // Обходим ссылки и добавляем обработчики событий
    for (var i = 0; i < replyLinks.length; i++) {
        replyLinks[i].addEventListener('click', function(e) {
            e.preventDefault();

            // Находим контейнер с формой ответа на комментарий
            var container = this.parentNode.querySelector('.reply-form-container');

            // Проверяем, отображается ли форма. Если да, скрываем ее, иначе показываем
            if (container.style.display === 'block') {
                container.style.display = 'none';
            } else {
                container.style.display = 'block';
            }
        });
    }
});









