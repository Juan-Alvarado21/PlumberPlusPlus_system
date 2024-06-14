let currentSlide = 0;

function moveSlide(direction) {
  const carousel = document.querySelector('.carousel');
  const totalSlides = document.querySelectorAll('.carousel-item').length;
  
  currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
  const offset = -currentSlide * 100;
  carousel.style.transform = `translateX(${offset}%)`;
}


setInterval(() => {
  moveSlide(1); // Mover al siguiente ítem
}, 4000);
