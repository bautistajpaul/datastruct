<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIOSK</title>
    <link rel="stylesheet" href="assets/styles/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'>
</head>

<body>
    <section class="container">
        <div class="logo"></div>
    </section>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <img class="logo img-fluid" src="assets/pictures/Logo/hero_logo_small.png" alt="">
            </div>
            <div class="col-12 d-flex justify-content-center align-items-center">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="2000">
                            <img src="assets/carousel/carousel.png" class="d-block w-100 img-fluid" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="assets/carousel/carousel.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="assets/carousel/carousel.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-12">
                <h1 class="btnQuestion d-flex justify-content-center align-items-center">Ready to dig in?</h1>
            </div>
            <div class="heroBtn col-12 d-flex justify-content-center align-items-center">
                <a class="btn btn-primary rounded-pill d-flex justify-content-center align-items-center"
                    href="menu.html">
                    <div class="heroBtnText">Get Started</div>
                    <i class="fa-solid fa-circle-arrow-right arrowIcon"></i>
                </a>
            </div>
        </div>
    </div>

    <section class="container mt-5">
        <h2 class="mb-4">Luzon Island Specialties</h2>

        <div id="foodItems" class="row">
            <?php include 'fetch_food.php'; ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
