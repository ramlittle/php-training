<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Palm Hotel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <style>
        .carousel > .carousel-inner > .carousel-item > img{
            height:400px;
        }
    </style>
    
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php">Royal Palms Hotel</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="demo_pages/list.php">Customer</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Showrooms</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Accomodotions
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Presidential Suite</a></li>
                      <li><a class="dropdown-item" href="#">Executive Accomodation</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Services</a></li>
                    </ul>
                  </li>
                </ul>
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success mx-1" type="submit">Search</button>
                </form>
                <button type="button" class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#signUpModal">Sign Up</button>
                <button type="button" class="btn btn-primary mx-1">Login</button>
  
  <!-- Modal -->
  <div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Sign Up</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="pb-2 mb-4 border-bottom">
                Personal Information
          </div>
          <div class="row">
            <div class="col">
                <label for="" class="form-label">First Name</label>
                <input class="form-control" type="text">
            </div>
            <div class="col">
              <label for="" class="form-label">Last Name</label>
              <input type="text" class="form-control" >
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
                <label for="" class="form-label">Birth Date</label>
                <input type="text" class="form-control" >
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
              </div>
            </div>
        </nav>