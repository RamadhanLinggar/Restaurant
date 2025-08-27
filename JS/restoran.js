// ============================
// Slider
// ============================

// Ambil elemen
const slides = document.querySelectorAll(".slide");
const slidesContainer = document.querySelector(".slides");
const dotsContainer = document.querySelector(".dots");
let index = 0;

// Generate dots
slides.forEach((_, i) => {
  const dot = document.createElement("span");
  dot.classList.add("dot");
  if (i === 0) dot.classList.add("active");

  // Klik dot → pindah slide
  dot.addEventListener("click", () => {
    index = i;
    updateSlide();
  });

  dotsContainer.appendChild(dot);
});

const dots = document.querySelectorAll(".dot");

// Fungsi update slide
function updateSlide() {
  slidesContainer.style.transform = `translateX(-${index * 100}%)`;
  dots.forEach((dot) => dot.classList.remove("active"));
  dots[index].classList.add("active");
}

// Auto slide setiap 3 detik
setInterval(() => {
  index = (index + 1) % slides.length;
  updateSlide();
}, 3000);

// ============================
// Hamburger toggle
// ============================
const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");

hamburger.addEventListener("click", () => {
  navLinks.classList.toggle("show");
});
