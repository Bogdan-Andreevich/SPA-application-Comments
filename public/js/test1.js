const form = document.querySelector('form');
const commentsList = document.querySelector('#comments-list');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    const name = form.elements.name.value;
    const email = form.elements.email.value;
    const message = form.elements.message.value;

    const comment = document.createElement('li');
    comment.className = 'comment';

    const heading = document.createElement('h4');
    heading.textContent = name;

    const emailPara = document.createElement('p');
    emailPara.textContent = email;

    const messagePara = document.createElement('p');
    messagePara.textContent = message;

    comment.appendChild(heading);
    comment.appendChild(emailPara);
    comment.appendChild(messagePara);

    commentsList.appendChild(comment);

    form.reset();
});
