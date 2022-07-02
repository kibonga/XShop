$(document).ready(function () {

    const sliderBtns = $('.show-slider-action');
    $('.show-slider-action').on('click', function () {
        const activeImage = document.querySelector('.active img');
        console.log(activeImage);
        console.log(activeImage.src);
        console.log($('#main-image'));
        const mainImage = document.querySelector('#main-image');
        console.log(mainImage);
        mainImage.src = activeImage.src;
        // $('#main-image').src = activeImage.src;
    });

});
