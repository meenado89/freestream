<?php
// START SESSION SO WE CAN CHECK IF USER IS LOGGED IN LATER
// session_start() MUST BE CALLED BEFORE ANY HTML OUTPUT
session_start();
?>

<!-- NAVBAR COMPONENT — INCLUDED ON EVERY PAGE -->
<nav class="site-nav">

    <!-- LOGO -->
    <a href="/freestream/index.php" class="nav-logo">
        STREAM<span>FREE</span>
    </a>

    <!-- NAV LINKS — DESKTOP -->
    <div class="nav-links">
        <a href="/freestream/index.php" class="nav-link">Home</a>
        <a href="/freestream/movies.php" class="nav-link">Movies</a>
        <a href="/freestream/tvshows.php" class="nav-link">TV Shows</a>
        <a href="/freestream/animation.php" class="nav-link">Animation</a>

        <!-- LANGUAGE DROPDOWN -->
        <div class="nav-dropdown">

            <!-- DROPDOWN TRIGGER -->
            <span class="nav-link dropdown-trigger">
                Languages ▾
            </span>

            <!-- DROPDOWN MENU — HIDDEN UNTIL HOVER -->
            <div class="dropdown-menu">
                <a href="/freestream/index.php?lang=en" class="dropdown-item">🇬🇧 English</a>
                <a href="/freestream/index.php?lang=fr" class="dropdown-item">🇫🇷 French</a>
                <a href="/freestream/index.php?lang=de" class="dropdown-item">🇩🇪 German</a>
                <a href="/freestream/index.php?lang=hi" class="dropdown-item">🇮🇳 Hindi</a>
            </div>
        </div>
    </div>

    <!-- RIGHT SIDE — SEARCH + LOGIN -->
    <div class="nav-right">
        <input 
            type="text" 
            id="searchInput" 
            placeholder="Search movies..." 
            class="nav-search"
        />
        <a href="/freestream/login.php" class="nav-btn">Login</a>
    </div>

    <!-- HAMBURGER — MOBILE ONLY -->
    <button class="nav-hamburger" id="hamburger">☰</button>

</nav>

<!-- MOBILE MENU -->
<div class="mobile-menu" id="mobileMenu">
    <a href="/freestream/index.php" class="mobile-link">Home</a>
    <a href="/freestream/movies.php" class="mobile-link">Movies</a>
    <a href="/freestream/tvshows.php" class="mobile-link">TV Shows</a>
    <a href="/freestream/animation.php" class="mobile-link">Animation</a>
    <a href="/freestream/login.php" class="mobile-link">Login</a>
</div>