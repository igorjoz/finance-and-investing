$(document).ready(() => {
    $('.slider__next-icon').on('click', () => {
        console.log("clicked next");

        let currentImage = $('.slider__image--active');
        let nextImage = currentImage.next();

        if (nextImage.length) {
            currentImage.removeClass('slider__image--active').css('z-index', -1);
            nextImage.addClass('slider__image--active').css('z-index', 2);
        }
    });

    $('.slider__previous-icon').on('click', () => {
        console.log("clicked previous");

        let currentImage = $('.slider__image--active');
        let prevImage = currentImage.prev();

        if (prevImage.length) {
            currentImage.removeClass('slider__image--active').css('z-index', -1);
            prevImage.addClass('slider__image--active').css('z-index', 2);
        }
    });
});