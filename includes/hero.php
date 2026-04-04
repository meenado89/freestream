<?php
require_once __DIR__ . '/db.php';

// Get top 5 movies by view count for carousel
$result = $conn->query(
  "SELECT * FROM movies 
   WHERE poster_url IS NOT NULL 
   AND poster_url != '' 
   ORDER BY view_count DESC 
   LIMIT 5"
);

$heroMovies = [];
while ($row = $result->fetch_assoc()) {
  $heroMovies[] = $row;
}
?>

<?php if (!empty($heroMovies)): ?>
<section class="hero-carousel">

  <!-- SLIDES -->
  <div class="carousel-track" id="carouselTrack">
    <?php foreach ($heroMovies as $i => $hero): ?>
    <div class="carousel-slide <?= $i === 0 ? 'active' : '' ?>" 
         data-id="<?= $hero['id'] ?>">

      <!-- Blurred background -->
      <div class="hero-bg" 
           style="background-image: url('<?= $hero['poster_url'] ?>')">
      </div>
      <div class="hero-overlay"></div>

      <!-- Content -->
      <div class="hero-content">

        <div class="hero-badge">Most Watched</div>

        <h1 class="hero-title"><?= htmlspecialchars($hero['title']) ?></h1>

        <div class="hero-meta">
          <span><?= $hero['year'] ?></span>
          <span>★ <?= $hero['rating'] ?></span>
          <span><?= $hero['duration'] ?></span>
          <span><?= ucfirst($hero['genre']) ?></span>
          <span class="hero-views">
            <?= number_format($hero['view_count']) ?> views
          </span>
        </div>

        <p class="hero-desc"><?= htmlspecialchars($hero['description']) ?></p>

        <button class="hero-btn" 
                onclick="openModal(<?= $hero['id'] ?>)">
          ▶ Watch Now — Free
        </button>

      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <!-- ARROWS -->
  <button class="carousel-arrow left"  id="prevBtn">&#8592;</button>
  <button class="carousel-arrow right" id="nextBtn">&#8594;</button>

  <!-- DOTS -->
  <div class="carousel-dots" id="carouselDots">
    <?php foreach ($heroMovies as $i => $hero): ?>
    <button class="dot <?= $i === 0 ? 'active' : '' ?>" 
            onclick="goToSlide(<?= $i ?>)">
    </button>
    <?php endforeach; ?>
  </div>

</section>
<?php endif; ?>