const btn = document.getElementById('js-btn');
const info = document.getElementById('js-info');

if(btn) {
    btn.addEventListener('click', () => {
        info.style.display = 'none';
    });
}