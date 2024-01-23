document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.getElementById('carousel');
    const slides = carousel.querySelector('.flex');
    let currentIndex = 0;
  
    function showSlide(index) {
      const transformValue = `translateX(-${index * 100}%)`;
      slides.style.transform = transformValue;
    }
  
    function nextSlide() {
      currentIndex = (currentIndex + 1) % slides.children.length;
      showSlide(currentIndex);
    }
  
    function prevSlide() {
      currentIndex = (currentIndex - 1 + slides.children.length) % slides.children.length;
      showSlide(currentIndex);
    }
  
    // Tombol Next
    const nextButton = document.createElement('button');
    nextButton.innerHTML = '<i class="fas fa-chevron-right fa-xl"></i>';
    nextButton.className = 'absolute right-4 top-1/2 transform -translate-y-1/2 hover:bg-red-400 opacity-75 text-white px-7 py-6 rounded-full';
    nextButton.addEventListener('click', nextSlide);
    carousel.appendChild(nextButton);

    // Tombol Previous
    const prevButton = document.createElement('button');
    prevButton.innerHTML = '<i class="fas fa-chevron-left fa-xl"></i>';
    prevButton.className = 'absolute left-4 top-1/2 transform -translate-y-1/2 hover:bg-red-400 opacity-75 text-white px-7 py-6 rounded-full';
    prevButton.addEventListener('click', prevSlide);
    carousel.appendChild(prevButton);

    // Cek ukuran layar saat ini
    function checkScreenSize() {
      if (window.innerWidth <= 600) { // Sesuaikan dengan lebar layar smartphone yang diinginkan
        nextButton.style.display = 'none';
        prevButton.style.display = 'none';
      } else {
        nextButton.style.display = 'block';
        prevButton.style.display = 'block';
      }
    }

    // Panggil fungsi saat halaman dimuat dan saat layar diubah ukuran
    window.addEventListener('load', checkScreenSize);
    window.addEventListener('resize', checkScreenSize);


    setInterval(nextSlide, 5000); 
  });
  