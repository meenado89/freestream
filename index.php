<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <!-- OFFLINE BOOTSTRAP -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- quicksand font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>StreamFree</title>
</head>

<body>
    <main>
        <div class="cursor-orb" id="cursorOrb"></div>

        <!-- NAVBAR -->
        <?php include 'includes/navbar.php'; ?>
        <!-- NAVBAR END -->

        <!-- SAMPLE CAROUSEL ADD MOVIES AND SHOWS THUMBNAIL AND INTRO -->
        <!-- HERO CAROUSEL -->

        <section class="mainhero-container">
            <div class="container-fluid">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel"
                    data-bs-interval="2500">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <h1 class="text-dark">movies tumbnails will go here</h1>
                </div>

            </div>

        </section>
        <!-- HERO SECTION END -->

        <!-- GOOGLE ADVERTISMENT -->
        <section>

            <div class="adbanner">
                <div class="adcontainer">
                    <div class="ad-label">Advertisement</div>
                    <div class="ad-banner-inner">📢 &nbsp; Your Google AdSense banner will appear here (728×90)</div>

                </div>
            </div>
        </section>
        <!-- ADVERT 1 END  -->

        <!-- GENER FILTER PILLS -->
        <!-- <section class=" container-fluid generpills">
            <div class="genre-scroll">
                <div class="genre-pill active" onclick="filterGenre(this,'all')">All</div>
                <div class="genre-pill" onclick="filterGenre(this,'animation')">Animation</div>
                <div class="genre-pill" onclick="filterGenre(this,'documentary')">Documentary</div>
                <div class="genre-pill" onclick="filterGenre(this,'drama')">Drama</div>
                <div class="genre-pill" onclick="filterGenre(this,'comedy')">Comedy</div>
                <div class="genre-pill" onclick="filterGenre(this,'action')">Action</div>
                <div class="genre-pill" onclick="filterGenre(this,'horror')">Horror</div>
                <div class="genre-pill" onclick="filterGenre(this,'scifi')">Sci-Fi</div>
                <div class="genre-pill" onclick="filterGenre(this,'classic')">Classics</div>
                <div class="genre-pill" onclick="filterGenre(this,'foreign')">Foreign Language</div>
                <div class="genre-pill" onclick="filterGenre(this,'short')">Short Films</div>
            </div>
        </section> -->


        <!-- MOVIE GRID -->

        <!-- MOVIES GRID SECTION -->
        <section class="movies-section">
            <div class="section-header">
                <h2 class="section-title">Free to Watch Now</h2>

            </div>

            <!-- Cards render here from JavaScript -->
            <div id="movieGrid" class="movie-grid"></div>
        </section>

        <!-- MID PAGE AD -->
        <section>
            <div class="adbanner">
                <div class="adcontainer">
                    <div class="ad-label">Advertisement</div>
                    <div class="ad-banner-inner">📢 &nbsp; Mid-page AdSense unit</div>
                </div>
            </div>
        </section>

        <!-- VIDEO MODAL -->
        <div id="videoModal" class="modal-overlay">
            <div class="modal-box">
                <button class="modal-close" onclick="closeModal()">✕ Close</button>
                <div class="modal-player">
                    <!-- AD OVERLAY before movie plays -->
                    <div class="ad-overlay" id="adOverlay">
                        <p>Ad playing... <span id="adTimer">5</span>s</p>
                        <button id="skipBtn" onclick="skipAd()" disabled>Wait 5s...</button>
                    </div>
                    <iframe id="movieFrame" src="" allowfullscreen></iframe>
                </div>
                <div class="modal-info">
                    <h2 id="modalTitle"></h2>
                    <div id="modalMeta" class="modal-meta"></div>
                    <p id="modalDesc"></p>
                </div>
            </div>
        </div>

        <!-- MOVIE GRID END -->

        <!-- FOOTER -->
        <footer style="background:black;" class="pt-5 pb-3 mt-5">

            <!-- MAIN FOOTER GRID -->
            <div class="container-fluid px-4 px-md-5">
                <div class="row g-4">

                    <!-- BRAND -->
                    <div class="col-12 col-md-4">
                        <div class="logo mb-2">STREAM<span>FREE</span></div>
                        <p class="text-secondary" style="font-size:14px; line-height:1.8;">
                            Free, legal movies from the public domain and Creative Commons.
                            No subscription. No sign-up. Just watch.
                        </p>
                    </div>

                    <!-- BROWSE -->
                    <div class="col-6 col-md-2">
                        <h6 class="text-white fw-bold mb-3">Browse</h6>
                        <div class="d-flex flex-column gap-2">
                            <a href="#" class="text-secondary text-decoration-none footer-link">All Movies</a>
                            <a href="#" class="text-secondary text-decoration-none footer-link">Documentaries</a>
                            <a href="#" class="text-secondary text-decoration-none footer-link">Animations</a>
                            <a href="#" class="text-secondary text-decoration-none footer-link">Classics</a>
                            <a href="#" class="text-secondary text-decoration-none footer-link">Short Films</a>
                        </div>
                    </div>

                    <!-- LANGUAGES -->
                    <div class="col-6 col-md-2">
                        <h6 class="text-white fw-bold mb-3">Languages</h6>
                        <div class="d-flex flex-column gap-2">
                            <a href="#" class="text-secondary text-decoration-none footer-link">English</a>
                            <a href="#" class="text-secondary text-decoration-none footer-link">Hindi / Tamil</a>
                            <a href="#" class="text-secondary text-decoration-none footer-link">French</a>
                            <a href="#" class="text-secondary text-decoration-none footer-link">Spanish</a>
                            <a href="#" class="text-secondary text-decoration-none footer-link">All Languages</a>
                        </div>
                    </div>

                    <!-- INFO -->
                    <div class="col-6 col-md-2">
                        <h6 class="text-white fw-bold mb-3">Info</h6>
                        <div class="d-flex flex-column gap-2">
                            <a href="#" class="text-secondary text-decoration-none footer-link">About</a>
                            <a href="#" class="text-secondary text-decoration-none footer-link">Advertise</a>
                            <a href="#" class="text-secondary text-decoration-none footer-link">DMCA</a>
                            <a href="#" class="text-secondary text-decoration-none footer-link">Privacy Policy</a>
                            <a href="#" class="text-secondary text-decoration-none footer-link">Terms of Service</a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- BOTTOM BAR -->
            <div class="border-top border-secondary mt-4 pt-3 px-4 px-md-5 
              d-flex flex-column flex-md-row 
              justify-content-between align-items-center gap-2">
                <span class="text-secondary" style="font-size:12px;">
                    © 2025 StreamFree — All content is public domain or CC licensed
                </span>
                <span class="text-secondary" style="font-size:12px;">
                    Built with HTML · CSS · JavaScript
                </span>
            </div>

        </footer>

    </main>
    <!-- MAIN BODY END -->

    <!-- SCRIPT -->
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>