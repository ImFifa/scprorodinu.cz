import "@theme/front/init.scss";

import "lightbox2/dist/css/lightbox.css";
import lightbox from "lightbox2/dist/js/lightbox";

import '../../../vendor/nette/forms/src/assets/netteForms.min';
import '../../../vendor/contributte/recaptcha/assets/invisibleRecaptcha.min';

import "./lazysizes";

import 'bootstrap/js/dist/carousel';

$('.carousel').carousel({
    interval: 6000
})

const $navPri = document.querySelector(".navbar-primary");
const $navSec = document.querySelector(".navbar-secondary");
const $scrollTopBtn = document.querySelector("#scrollTopBtn");
const $navbarCollapse = document.querySelector("#navbarToggler");
const $navbarCollapseIcon = document.querySelector("#navbarToggler i");
const $navbarLinks = document.querySelectorAll("#navbarToggler .nav-link");

$navbarCollapse.addEventListener('click', function () {
    $navPri.classList.toggle("show");
    $navSec.classList.toggle("show");
    $navbarCollapseIcon.classList.toggle("fa-bars");
    $navbarCollapseIcon.classList.toggle("fa-times");
});

//close nav
$navbarLinks.forEach(item => {
    item.addEventListener('click', function() {
        $navPri.classList.remove("show");
        $navSec.classList.remove("show");
    });
});

window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;

    if (currentScrollPos > window.innerHeight) {
        $scrollTopBtn.style.display = "block";
    } else {
        $scrollTopBtn.style.display = "none";
    }

};


const $footer = document.querySelector('footer');
const $body = document.querySelector('body');

const $googleMap1 = $('#google-map1');
const $googleMap2 = $('#google-map2');
let mapInitialized = false;
window.addEventListener('load', function() {
        if ($body.offsetHeight < screen.height - 150 && window.location.href.split('/')[3] != 'kontakt' && window.location.href.split('/')[3] != 'podporuji-nas' && window.location.href.split('/')[3] != 'dokumenty') {
            $footer.style.position = "absolute";
            $footer.style.bottom = "0";
        }

        $googleMap1.attr('src', $googleMap1.data('src'));
        $googleMap2.attr('src', $googleMap2.data('src'));
        mapInitialized = true;
});

$(document).ready(function(){

    // smooth scroll
    // Add smooth scrolling to all links
    $(".scroll").on("click", function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $("html, body").animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });
});