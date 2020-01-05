let readme = document.querySelector('.story-link');
let hiddenSection = document.querySelector('.about');

readme.addEventListener('click', (e) => {
    e.preventDefault();

    if(readme.innerHTML === 'CLOSE') {
        readme.innerHTML = 'READ MORE';
        hiddenSection.style.height = '300px';
    }
    else {
        readme.innerHTML = "CLOSE";
        hiddenSection.style.height="1300px";
    }
    
});