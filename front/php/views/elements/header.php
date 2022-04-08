<?php

?>


<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-white p-0">
    <div class="container">
      <a class="navbar-brand py-0" href="index.html">
        <img src="images/logo2.png" alt="logo" class="img-fluid">
      </a>
      <ul class="navbar-nav middle-nav">
        <li class="nav-item dropdown py-3">
          <a class="nav-link" href="#">
            <i class="fas fa-search"></i>
          </a>
          <ul class="dropdown-menu p-1 rounded-0 d-none d-lg-block">
            <li class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </li>
          </ul>
        </li>
        <li class="nav-item py-3"><a class="nav-link" href="#"><i class="far fa-user"></i></a></li>
        <li class="nav-item py-3 d-none d-md-block"><a class="nav-link" href="#"><i class="fas fa-cog"></i></a></li>
        <li class="nav-item py-3">
          <a class="nav-link" href="">
            <i class="fas fa-shopping-cart"></i>
            <span class="total-cart-tag">0</span>
          </a>
        </li>
      </ul>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
            <img src="images/logo2.png" alt="logo">
          </h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav center-nav justify-content-center flex-grow-1 pe-3">
            <!-- <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li> -->
            <li class="nav-item dropdown py-3">
              <a class="nav-link active" aria-current="page" href="index.html">
                Home
                <i class="fas fa-chevron-down"></i>
              </a>
              <ul class="dropdown-menu rounded-0">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown py-3">
              <a class="nav-link" href="#">
                Living
                <i class="fas fa-chevron-down"></i>
              </a>
              <ul class="dropdown-menu rounded-0">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown py-3">
              <a class="nav-link" href="#">
                Feature
                <i class="fas fa-chevron-down"></i>
              </a>
              <ul class="dropdown-menu rounded-0">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown py-3">
              <a class="nav-link" href="#">
                Page
                <i class="fas fa-chevron-down"></i>
              </a>
              <ul class="dropdown-menu rounded-0">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item py-3">
              <a class="nav-link" href="product.html">Product</a>
            </li>
            <li class="nav-item py-3">
              <a class="nav-link" href="contactus.html">Contact Us</a>
            </li>
          </ul>

          <ul class="navbar-nav right-nav">
            <li class="nav-item dropdown py-3">
              <a class="nav-link" href="#">
                <i class="fas fa-search"></i>
              </a>
              <ul class="dropdown-menu p-1 rounded-0">
                <li class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </li>
              </ul>
            </li>
            <li class="nav-item py-3"><a class="nav-link" href="#"><i class="far fa-user"></i></a></li>
            <li class="nav-item py-3"><a class="nav-link" href="#"><i class="fas fa-cog"></i></a></li>
            <li class="nav-item py-3">
              <a class="nav-link" href="">
                <i class="fas fa-shopping-cart"></i>
                <span class="total-cart-tag">0</span>
              </a>
            </li>
          </ul>
        </div>
      </div>


    </div>
  </nav>
</header>