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

// ============================
// Search Functionality
// ============================
const searchIcon = document.querySelector(".search-icon img");
const searchBox = document.getElementById("searchBox");
const searchInput = document.getElementById("searchInput");

// Klik ikon search → toggle input
searchIcon.addEventListener("click", () => {
  searchBox.style.display =
    searchBox.style.display === "block" ? "none" : "block";
  searchInput.focus();
});

// Fungsi pencarian
function searchSite() {
  const query = searchInput.value.toLowerCase();

  if (!query) return;

  // Daftar kata kunci + halaman tujuan
  const pages = [
    { keyword: ["home", "beranda"], url: "index.html" },
    { keyword: ["menu"], url: "index.html#menu" },
    { keyword: ["makanan", "food"], url: "makanan.html" },
    { keyword: ["minuman", "drink"], url: "minuman.html" },
    { keyword: ["dessert", "pencuci mulut"], url: "dessert.html" },
    { keyword: ["location", "lokasi", "alamat"], url: "index.html#location" },
    { keyword: ["about", "tentang"], url: "index.html#about" },
    { keyword: ["nasi goreng"], url: "nasi-goreng.html" },
    { keyword: ["sate ayam"], url: "sate-ayam.html" },
    { keyword: ["soto lamongan"], url: "soto-lamongan.html" },
    { keyword: ["air mineral"], url: "air-mineral.html" },
    { keyword: ["es lemon tea"], url: "es-lemon-tea.html" },
    { keyword: ["jus alpukat"], url: "jus-alpukat.html" },
    { keyword: ["cheesecake"], url: "cheesecake.html" },
    { keyword: ["candy ice cream"], url: "candy-ice-cream.html" },
    { keyword: ["macaron", "macaroon"], url: "macaron.html" },
  ];

  // Cari halaman yang cocok
  for (let p of pages) {
    if (p.keyword.some((k) => query.includes(k))) {
      window.location.href = p.url;
      return;
    }
  }

  // Jika tidak ada hasil
  alert("Hasil tidak ditemukan.");
}
