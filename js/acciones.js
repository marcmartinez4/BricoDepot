let selectEstrellas = document.getElementById('selectEstrellas');
let click = true;
selectEstrellas.addEventListener( 'click', () => {
    if (click) {
        selectEstrellas.innerHTML = 'Puntuación';
        selectEstrellas.style.display = 'flex';
        selectEstrellas.style.flexDirection = 'column';
        todas = document.createElement('p');
        todas.innerHTML = 'Todas';
        let img5estrellas = document.createElement('img');
        img5estrellas.src = 'img/5estrellas.svg';
        let img4estrellas = document.createElement('img');
        img4estrellas.src = 'img/4estrellas.svg';
        let img3estrellas = document.createElement('img');
        img3estrellas.src = 'img/3estrellas.svg';
        let img2estrellas = document.createElement('img');
        img2estrellas.src = 'img/2estrellas.svg';
        let img1estrellas = document.createElement('img');
        img1estrellas.src = 'img/1estrella.svg';

        let lista = [todas, img5, img4, img3, img2, img1]
        for (let i = 0; i < lista.length; i++) {
            selectEstrellas.appendChild(lista[i]);
        }
        click = false;
    } else {
        selectEstrellas.innerHTML = 'Puntuación';
        click = true;
    }
})