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
        hiddenSection.style.height="1000px";
    }
    
});

window.addEventListener('scroll', function() {
    var element_1 = document.querySelector('.feature-1');
    var element_2 = document.querySelector('.feature-2');
    var element_3 = document.querySelector('.feature-3');

    var position_1 = element_1.getBoundingClientRect();
    var position_2 = element_2.getBoundingClientRect();
    var position_3 = element_3.getBoundingClientRect();

	// checking for partial visibility
	if(position_1.top < (window.innerHeight - 200) && position_1.bottom >= 0) {
		element_1.style.opacity = 1;
    }
    
    if(position_2.top < (window.innerHeight - 200) && position_2.bottom >= 0) {
		element_2.style.opacity = 1;
    }
    
    if(position_3.top < (window.innerHeight - 200) && position_3.bottom >= 0) {
		element_3.style.opacity = 1;
	}
});