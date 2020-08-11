
// Active
let nav = document.querySelector('.nav')
let link = document.querySelectorAll('.nav__link')

link.forEach(el => {
    el.addEventListener('click', () => {
        nav.querySelector('.active').classList.remove('active')

        el.classList.add('active')
    })
})

// Button up
document.getElementById('button-up').onclick = function scrollUp() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
window.onscroll = () => { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
        document.getElementById('button-up').style.display = 'block';
    } else {
        document.getElementById('button-up').style.display = 'none';
    }
}
AOS.init();