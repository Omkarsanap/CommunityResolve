window.onscroll = function() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        document.querySelector('.header').classList.add('sticky');
    } else {
        document.querySelector('.header').classList.remove('sticky');
    }
};