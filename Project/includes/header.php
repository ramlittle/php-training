<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./styles/index.css">
    <title>Dogs Vs Chickens</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand fst-italic text-warning" href="#">
                    Dogs vs. Chickens
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">How To Play</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                The Looks
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Leaderboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">About</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <button type="button" class="btn btn-secondary mx-1">Login</button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#signUpModal">Create Account</button>

                    <!-- Modal -->
                    <div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Personal Info section -->
                                    <div class="row border-bottom border-secondary-subtle">
                                        <p>Personal Information</p>
                                    </div>

                                    <div class="row mb-3 m-2">
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">First Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">Last Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row m-2">
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">Birth Date</label>
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>

                                    <!-- Account Information -->
                                    <div class="row border-bottom border-secondary-subtle">
                                        <p>Account Information Information</p>
                                    </div>

                                    <div class="row mb-3 m-2">
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">Username</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row m-2">
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                    </div>
                                    <!-- Data Privacy Section -->
                                    <div class="row border-bottom border-secondary-subtle ">
                                        <p>Data Privacy</p>
                                    </div>
                                    <div class="row p-2 m-2">
                                        <p class="fst-italic fs-6 fw-light">
                                            Dogs vs Chickens, we take your data privacy seriously. When you sign up
                                            for our services, you can trust that we will handle your personal
                                            information with the utmost care and in accordance with the highest
                                            industry standards. We will only collect the data necessary to provide
                                            you with our services and will never share, sell, or misuse your
                                            information in any way. Our privacy policy outlines in detail how we
                                            collect, use, and protect your data, and by signing up, you agree to
                                            abide by its terms. Your trust is paramount to us, and we are committed
                                            to maintaining the confidentiality and security of your information at
                                            all times. If you have any questions or concerns regarding your data
                                            privacy, please do not hesitate to contact our dedicated support team,
                                            and we will be happy to assist you. Thank you for choosing Dogs vs Chickens,
                                            and we look forward to serving you while keeping your data privacy at
                                            the forefront of our commitment.
                                        </p>
                                    </div>
                                    <div class="row m-2">
                                        <div class="col-md-1 text-center">
                                            <input type="checkbox" class="form-check-input" />
                                        </div>
                                        <div class="col col-md-10">
                                            <p class="fst-italic fs-6 fw-light">I accept the terms and conditions
                                                stated above</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-warning">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
    </header>