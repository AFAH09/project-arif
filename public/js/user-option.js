document.querySelector('nav .user').addEventListener('click', (event) => {
    event.preventDefault();
    document.querySelector('.drop-down-content').classList.toggle('active');
});