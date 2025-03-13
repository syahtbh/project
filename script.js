//carousel functionality
let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-item');
const totalSlides = slides.length;

function showSlide(index) {
    const carouselInner = document.querySelector('.carousel-inner');
    const offset = -index * 100; // Calculate the offset for the slide
    carouselInner.style.transform = `translateX(${offset}%)`; // Move the carousel
}

function nextSlide() {
    // Stop sliding after the third picture (index 2)
    if (currentSlide < 3) { // Only allow sliding up to the third picture
        currentSlide = (currentSlide + 1) % totalSlides; // Move to the next slide
        showSlide(currentSlide);
    }
}

function prevSlide() {
    // Stop sliding before the first picture
    if (currentSlide > 0) { // Only allow sliding back to the first picture
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides; // Move to the previous slide
        showSlide(currentSlide);
    }
}

// Auto-slide every 5 seconds (only between the first three pictures)
setInterval(() => {
    if (currentSlide < 2) { // Only auto-slide if not on the third picture
        nextSlide();
    }
}, 5000);