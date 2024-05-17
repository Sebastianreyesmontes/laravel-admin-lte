window.onscroll = function () {
    let windowHeight = window.innerHeight;
    let scrollHeight = windowHeight / 1.5;

    if (document.documentElement.scrollTop > scrollHeight) {
        document.querySelector('.go-top-container').classList.add('show');
    } else {
        document.querySelector('.go-top-container').classList.remove('show');
    }

    document.querySelector('.go-top-container').addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
};
