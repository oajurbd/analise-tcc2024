
  let currentSlide = 0;

  function showSlide(index) {
    const slides = document.querySelector('.slides');
    if (index < 0) {
      currentSlide = slides.children.length - 1;
    } else if (index >= slides.children.length) {
      currentSlide = 0;
    } else {
      currentSlide = index;
    }
    slides.style.transform = `translateX(${-currentSlide * 100}%)`;
  }

  function nextSlide() {
    showSlide(currentSlide + 1);
  }

  function prevSlide() {
    showSlide(currentSlide - 1);
  }

  setInterval(nextSlide, 5000);
  