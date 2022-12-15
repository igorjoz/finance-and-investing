"use strict";
window.addEventListener('load', (event) => {
    document.body.classList.remove('page__preload');
});
$(() => {
    $(".page__tooltip").tooltip();
});
$(() => {
    $(".page__accordion").accordion();
});
