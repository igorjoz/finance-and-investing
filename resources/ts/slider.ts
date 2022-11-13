$(document).ready(() => {
    $('.slider__next-icon').on('click', () => {
        let currentImage = $('.slider__image--active');
        let nextImage = currentImage.next();

        if (nextImage.length) {
            currentImage.removeClass('slider__image--active').css('z-index', -1);
            nextImage.addClass('slider__image--active').css('z-index', 2);
        }
    });

    $('.slider__previous-icon').on('click', () => {
        let currentImage = $('.slider__image--active');
        let previousImage = currentImage.prev();

        if (previousImage.length) {
            currentImage.removeClass('slider__image--active').css('z-index', -1);
            previousImage.addClass('slider__image--active').css('z-index', 2);
        }
    });

    (<any>$('.slider__images-container')).magnificPopup({
        items: [
            {
                src: '../resources/images/slider/1.webp',
                title: 'Investing slide'
            },
            {
                src: '../resources/images/slider/2.png',
                title: 'FAQ (Frequently Asked Questions) slide'
            },
            {
                src: '../resources/images/slider/3.jpg',
                title: 'ETF (Exchange-traded funds) slide'
            },
            {
                src: '../resources/images/slider/4.avif',
                title: 'Inflation slide'
            },
            {
                src: '../resources/images/slider/5.jpg',
                title: 'Gold slide'
            },
        ],
        gallery: {
            enabled: true
        },
        type: 'image'
    });
});