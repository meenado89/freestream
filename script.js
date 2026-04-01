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

    <!-- Thumbnail -->
    <div class="movie-thumb">
      <!-- Poster Image -->
      <img 
        src="https://archive.org/services/img/${m.embed_url.split('/embed/')[1]}"
        style="width:100%; height:100%; object-fit:cover;"
      >

      <!-- FREE badge -->
      <span class="free-badge">FREE</span>

      <!-- Play button overlay -->
      <div class="play-overlay">
        <div class="play-btn">▶</div>
      </div>
    </div>

    <!-- Info -->
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
document.getElementById('searchInput').addEventListener('input', function () {
    const q = this.value.toLowerCase();
    const filtered = testMovies.filter(m =>
        m.title.toLowerCase().includes(q) ||
        m.genre.toLowerCase().includes(q)
    );
    renderMovies(filtered);
});

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



// CURSOR ORB
const orb = document.getElementById('cursorOrb');

document.addEventListener('mousemove', (e) => {
    orb.style.left = e.clientX + 'px';
    orb.style.top = e.clientY + 'px';
});

// Grow on hover over links and cards
document.querySelectorAll('a, button, .movie-card, .genre-pill')
    .forEach(el => {
        el.addEventListener('mouseenter', () => orb.classList.add('hovered'));
        el.addEventListener('mouseleave', () => orb.classList.remove('hovered'));
    });

