lines = document.querySelector('.lines')
bar = document.querySelector('.bar-navigation')
list = document.querySelector('.list-navigation')
// right = document.querySelector('.right-navigation')
lines.addEventListener('click', () => {
    list.classList.toggle('invisible');
    // right.classList.toggle('invisible');
    bar.classList.toggle('navigation-height');
})