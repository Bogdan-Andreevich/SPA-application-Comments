// Получаем ссылку "Reply" и форму для ввода комментария
const replyButton = document.querySelector('.reply-button');
const replyForm = document.querySelector('.reply-form');

// Добавляем обработчик события клика на ссылку "Reply"
replyButton.addEventListener('click', function(event) {
    event.preventDefault(); // Предотвращаем переход по ссылке
    replyForm.style.display = 'block'; // Отображаем форму для ввода комментария
});
