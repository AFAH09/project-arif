const pilihSurat = document.querySelector('.pilih-surat');
const inputDataWarga = document.querySelector('.input-data-warga');
const inputDataKelurahan = document.querySelector('.input-data-kelurahan');
const buttonsIdw = document.querySelector('.input-data-warga .buttons');
const mainNav = document.querySelector('main nav ul');

pilihSurat.addEventListener('click', event => {
    if(event.target.id == 'surat-pengantar-button') {
        pilihSurat.style.display = 'none';
        inputDataWarga.style.display = 'inherit';
        mainNav.children[0].classList.remove('active');
        mainNav.children[2].classList.add('active');
    }
});

buttonsIdw.addEventListener('click', event => {
    if(event.target.className == 'back') {
        inputDataWarga.style.display = 'none';
        pilihSurat.style.display = 'flex';
        mainNav.children[2].classList.remove('active');
        mainNav.children[0].classList.add('active');
    }
});

mainNav.children[0].addEventListener('click', event => {
    inputDataWarga.style.display = 'none';
    pilihSurat.style.display = 'flex';
    mainNav.children[2].classList.remove('active');
    mainNav.children[0].classList.add('active');
});
