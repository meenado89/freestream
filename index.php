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


        <!-- HERO CAROUSEL -->
        <?php require_once 'includes/hero.php'; ?>
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

        <!-- MOVIE GRID -->
        <?php require_once 'includes/cards.php'; ?>
        <!-- MOVIES GRID SECTION -->


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
        <?php include 'includes/modals.php'; ?>

        <!-- MOVIE GRID END -->

        <!-- FOOTER -->
        <?php include 'includes/footer.php'; ?>

    </main>
    <!-- MAIN BODY END -->

    <!-- SCRIPT -->
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>