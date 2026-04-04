// ── MOVIE DATA ──
// EMPTY ARRAY TO START — WILL BE FILLED BY THE API CALL BELOW
let testMovies = [];

// FETCH MOVIES FROM OUR PHP API INSTEAD OF USING HARDCODED DATA
function loadMovies(genre = 'all') {
    fetch(`api/movies.php?genre=${genre}`)
        .then(res => res.json())
        .then(data => {
            testMovies = data;
            renderMovies(testMovies);
        })
        .catch(err => console.error(err));
}

// Load all movies first
loadMovies();
let adInterval;

// ── RENDER CARDS ──
function renderMovies(movies) {
    const grid = document.getElementById('movieGrid');

    if (!movies.length) {
        grid.innerHTML = '<p style="color:gray;padding:20px">No movies found.</p>';
        return;
    }

   grid.innerHTML = movies.map(m => `
  <div class="movie-card" data-genre="${m.genre}" onclick="openModal(${m.id})">

    <div class="movie-thumb">

      ${m.poster_url
        ? `<img src="${m.poster_url}" alt="${m.title}" style="width:100%;height:100%;object-fit:cover;">`
        : `<span style="font-size:48px">🎬</span>`
      }

      
    </div>

    <div class="movie-info">
      <div class="movie-title">${m.title}</div>
      <div class="movie-meta-row">
        <span>${m.year}</span>
        <span>★ ${m.rating}</span>
      </div>
      <div class="movie-genre-tag">${m.genre}</div>
    </div>

  </div>
`).join('');
}

// ── FILTER BY GENRE ──
function filterGenre(el, genre) {
    document.querySelectorAll('.genre-pill')
        .forEach(p => p.classList.remove('active'));

    el.classList.add('active');

    loadMovies(genre); // now uses backend
}

// ── SEARCH ──
// WAIT UNTIL THE ENTIRE PAGE INCLUDING NAVBAR IS LOADED BEFORE ATTACHING LISTENERS
// WITHOUT THIS, getElementById RETURNS NULL BECAUSE THE ELEMENT DOESN'T EXIST YET
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('searchInput').addEventListener('input', function () {
        const q = this.value.toLowerCase();
        const filtered = testMovies.filter(m =>
            m.title.toLowerCase().includes(q) ||
            m.genre.toLowerCase().includes(q)
        );
        renderMovies(filtered);
    });
});

// HERO SLIDER
// ── CAROUSEL ──
let currentSlide = 0;
let autoTimer;
const slides = document.querySelectorAll('.carousel-slide');
const dots   = document.querySelectorAll('.dot');

function goToSlide(index) {
  // Remove active from current
  slides[currentSlide].classList.remove('active');
  dots[currentSlide].classList.remove('active');

  // Set new index — wrap around at ends
  currentSlide = (index + slides.length) % slides.length;

  // Add active to new slide
  slides[currentSlide].classList.add('active');
  dots[currentSlide].classList.add('active');

  // Reset auto timer so it doesn't skip too fast after manual click
  resetAutoPlay();
}

function nextSlide() { goToSlide(currentSlide + 1); }
function prevSlide() { goToSlide(currentSlide - 1); }

function startAutoPlay() {
  autoTimer = setInterval(nextSlide, 3000); 
}

function resetAutoPlay() {
  clearInterval(autoTimer);
  startAutoPlay();
}

// Hook up arrow buttons
document.getElementById('nextBtn').addEventListener('click', nextSlide);
document.getElementById('prevBtn').addEventListener('click', prevSlide);

// Pause on hover — resume on leave
const carousel = document.querySelector('.hero-carousel');
carousel.addEventListener('mouseenter', () => clearInterval(autoTimer));
carousel.addEventListener('mouseleave', startAutoPlay);

// Start it
startAutoPlay();


// ── OPEN MODAL ──
function openModal(id) {
    const movie = testMovies.find(m => m.id == id);
    if (!movie) return;

    document.getElementById('modalTitle').textContent = movie.title;
    document.getElementById('modalDesc').textContent = movie.description;
    document.getElementById('modalMeta').innerHTML =
        `<span>★ ${movie.rating}</span>
     <span>${movie.year}</span>
     <span>${movie.duration}</span>
     <span style="color:#22c55e">FREE</span>`;
    document.getElementById('movieFrame').src = movie.embed_url;
    document.getElementById('videoModal').classList.add('open');

    // Start ad countdown
    startAdCountdown();
}

// ── AD COUNTDOWN ──
function startAdCountdown() {
    const overlay = document.getElementById('adOverlay');
    const skipBtn = document.getElementById('skipBtn');
    const timerEl = document.getElementById('adTimer');

    overlay.style.display = 'flex';
    skipBtn.disabled = true;
    let t = 5;
    timerEl.textContent = t;
    skipBtn.textContent = 'Wait 5s...';

    clearInterval(adInterval);
    adInterval = setInterval(() => {
        t--;
        timerEl.textContent = t;
        if (t <= 0) {
            clearInterval(adInterval);
            skipBtn.disabled = false;
            skipBtn.textContent = 'Skip Ad ✕';
        } else {
            skipBtn.textContent = `Wait ${t}s...`;
        }
    }, 1000);
}

// ── SKIP AD ──
function skipAd() {
    clearInterval(adInterval);
    document.getElementById('adOverlay').style.display = 'none';
}

// ── CLOSE MODAL ──
function closeModal() {
    document.getElementById('videoModal').classList.remove('open');
    document.getElementById('movieFrame').src = '';
    clearInterval(adInterval);
}

// Close if clicking outside modal box
document.getElementById('videoModal').addEventListener('click', function (e) {
    if (e.target === this) closeModal();
});



// CURSOR ORB old code before event delegation optimization
// const orb = document.getElementById('cursorOrb');

// document.addEventListener('mousemove', (e) => {
//     orb.style.left = e.clientX + 'px';
//     orb.style.top = e.clientY + 'px';
// });

// Grow on hover over links and cards
// document.querySelectorAll('a, button, .movie-card, .genre-pill')
//     .forEach(el => {
//         el.addEventListener('mouseenter', () => orb.classList.add('hovered'));
//         el.addEventListener('mouseleave', () => orb.classList.remove('hovered'));
//     });

// CURSOR ORB — GET THE ORB ELEMENT
const orb = document.getElementById('cursorOrb');

// MOVE ORB TO FOLLOW MOUSE POSITION
document.addEventListener('mousemove', (e) => {
    orb.style.left = e.clientX + 'px';
    orb.style.top = e.clientY + 'px';
});

// EVENT DELEGATION — ONE LISTENER ON THE WHOLE DOCUMENT
// CHECKS IF WHAT YOU'RE HOVERING IS AN INTERACTIVE ELEMENT
// THIS WORKS EVEN FOR ELEMENTS ADDED LATER BY FETCH() OR PHP
document.addEventListener('mouseover', (e) => {
    // CLOSEST() CHECKS IF THE HOVERED ELEMENT OR ANY PARENT MATCHES THE SELECTOR
    if (e.target.closest('a, button, .movie-card, .genre-pill, .nav-btn, .dropdown-item')) {
        orb.classList.add('hovered');
    }
});

// SHRINK ORB BACK WHEN LEAVING INTERACTIVE ELEMENTS
document.addEventListener('mouseout', (e) => {
    if (e.target.closest('a, button, .movie-card, .genre-pill, .nav-btn, .dropdown-item')) {
        orb.classList.remove('hovered');
    }
});
