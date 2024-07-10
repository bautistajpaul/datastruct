<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RIOSK</title>
  <link rel="stylesheet" href="assets/styles/menu.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="header col-12 d-flex justify-content-evenly align-items-center">
        <img class="logo img-fluid" src="assets\pictures\Logo\hero_logo_small.png" alt="">
      </div>

      <section class="popular">
        <div class="promo d-flex flex-column justify-content-evenly align-items-center">
          <h1 class="popularTxt">Popular</h1>
          <!-- carousel -->
          <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="2000">
                <img src="assets\carousel\carousel.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="assets\carousel\carousel.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="assets\carousel\carousel.png" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </section>

      <div class="col-12">
        <div class="island row">
          <h1 class="islandTxt col-12 d-flex justify-content-center">Select Island a region</h1>
          <div class="col-12 d-flex justify-content-center">

            <!-- LUZON -->
            <button class="islandBtn btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#luzonOffcanvas" aria-controls="luzonOffcanvas">
              <div class="islandBtnTxt">
                Luzon
              </div>
            </button>
            <!-- LUZON CONTENT -->
            <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="luzonOffcanvas" aria-labelledby="luzonOffcanvasLabel">
              <div class="offcanvas-header d-flex align-items-center justify-content-between">
                <h1 class="offcanvas-title" id="luzonOffcanvasLabel">LUZON</h1>
                <a type="button" class="back-btn btn d-flex align-items-center justify-content-between" data-bs-dismiss="offcanvas" aria-label="Close">
                  <span>Select Island</span>
                  <i class="fa-solid fa-arrow-left"></i>
                </a>
              </div>
              <div class="offcanvas-body">
                <div class="row">
                  <div class="col-8">
                    <div class="row">
                      <!-- Fetch PHP -->
                      <?php include 'luzon_menu_fetch_food.php'; ?>
                    </div>
                  </div>
                  <div class="cart col-4">
                    <div class="cart-content">
                      <div class="cart-title d-flex">
                        <h1>Cart<span><i class="fa-solid fa-cart-shopping"></i></span></h1>
                      </div>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Item Name</th>
                              <th scope="col">Price</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody class="cart-item-list">
                            <!-- Cart items will be dynamically added here -->
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="3"></td>
                              <td><strong>Total:</strong></td>
                              <td class="cart-total">PHP 0.00</td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                      <button class="btn btn-primary" onclick="placeOrder()">Order</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- VISAYAS -->
            <button class="islandBtn btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#visayasOffcanvas" aria-controls="visayasOffcanvas">
              <div class="islandBtnTxt">
                Visayas
              </div>
            </button>
            <!-- VISAYAS CONTENT -->
            <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="visayasOffcanvas" aria-labelledby="visayasOffcanvasLabel">
              <div class="offcanvas-header d-flex align-items-center justify-content-between">
                <h1 class="offcanvas-title" id="visayasOffcanvasLabel">Visayas</h1>
                <a type="button" class="back-btn btn d-flex align-items-center justify-content-between" data-bs-dismiss="offcanvas" aria-label="Close">
                  <span>Select Island</span>
                  <i class="fa-solid fa-arrow-left"></i>
                </a>
              </div>
              <div class="offcanvas-body">
                <div class="row">
                  <div class="col-8">
                    <div class="row">
                      <!-- Fetch PHP -->
                      <?php include 'visayas_menu_fetch_food.php'; ?>
                    </div>
                  </div>
                  <div class="cart col-4">
                    <div class="cart-content">
                      <div class="cart-title d-flex">
                        <h1>Cart<span><i class="fa-solid fa-cart-shopping"></i></span></h1>
                      </div>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Item Name</th>
                              <th scope="col">Price</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody class="cart-item-list">
                            <!-- Cart items will be dynamically added here -->
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="3"></td>
                              <td><strong>Total:</strong></td>
                              <td class="cart-total">PHP 0.00</td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                      <button class="btn btn-primary" onclick="placeOrder()">Order</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- MINDANAO -->
            <button class="islandBtn btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#mindanaoOffcanvas" aria-controls="mindanaoOffcanvas">
              <div class="islandBtnTxt">
                Mindanao
              </div>
            </button>
            <!-- Mindanao CONTENT -->
            <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="mindanaoOffcanvas" aria-labelledby="mindanaoOffcanvasLabel">
              <div class="offcanvas-header d-flex align-items-center justify-content-between">
                <h1 class="offcanvas-title" id="mindanaoOffcanvasLabel">Mindanao</h1>
                <a type="button" class="back-btn btn d-flex align-items-center justify-content-between" data-bs-dismiss="offcanvas" aria-label="Close">
                  <span>Select Island</span>
                  <i class="fa-solid fa-arrow-left"></i>
                </a>
              </div>
              <div class="offcanvas-body">
                <div class="row">
                  <div class="col-8">
                    <div class="row">
                      <!-- Fetch PHP -->
                      <?php include 'mindanao_menu_fetch_food.php'; ?>
                    </div>
                  </div>
                  <div class="cart col-4">
                    <div class="cart-content">
                      <div class="cart-title d-flex">
                        <h1>Cart<span><i class="fa-solid fa-cart-shopping"></i></span></h1>
                      </div>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Item Name</th>
                              <th scope="col">Price</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody class="cart-item-list">
                            <!-- Cart items will be dynamically added here -->
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="3"></td>
                              <td><strong>Total:</strong></td>
                              <td class="cart-total">PHP 0.00</td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                      <button class="btn btn-primary" onclick="placeOrder()">Order</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>


  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets\script\menu.js"></script>
</body>

</html>