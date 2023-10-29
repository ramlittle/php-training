<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/dogsvschickens/styles/index.css">
    <title>Dogs Vs Chickens</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand fst-italic text-warning" href="/dogsvschickens/">
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
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#howToModal">How To Play</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                The Looks
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/dogsvschickens/pages/playerslist.php">Players</a>
                                <li><a class="dropdown-item" href="/dogsvschickens/pages/teamslist.php">Teams</a>
                                <li><span><hr /></span></li>
                                <li><a class="dropdown-item" href="/dogsvschickens/pages/leaderboard.php">Leaderboard</a></li>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#signUpModal">About</button>
                    <!-- About Modal -->
                    <div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">About</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="row p-2 m-2 text-center">
                                        <h2><span class="fst-italic text-warning">Dogs vs Chickens</span></h2>
                                        <p class="fst-italic fs-6 fw-light">
                                            Based on
                                            the game battleships.
                                            This revision of the game is between Dogs and Chickens. Dogs would attack
                                            random coordinates to luckily
                                            hit the chicken targets.
                                        </p>
                                        <p>Technologies Used</p>
                                        <ul class="list-unstyled">
                                            <li>HTML</li>
                                            <li>CSS</li>
                                            <li>Javascript</li>
                                            <li>Bootstrap</li>
                                            <li>JQuery</li>
                                            <li>PHP</li>
                                            <li>MySQL</li>
                                        </ul>
                                        <p>
                                            Constructed by <span class="fst-italic fs-6 fw-light">Ram Little</span>
                                            <a href="https://i.ibb.co/bQkdH3X/IMG-20230513-123417.jpg" target="_blank">
                                                <img id="ram-image"
                                                    src="https://i.ibb.co/bQkdH3X/IMG-20230513-123417.jpg" /></a>
                                        </p>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- How to play modal -->
                    <div class="modal fade" id="howToModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">How to Play</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body fs-6">
                                    <div id="how-to-play"
                                        class="row d-flex justify-content-center align-items-center">
                                        <div class="row text-center p-2 fs-5">
                                            <span class="custom-font text-warning fs-5 fs-bold ">How to Play</span>
                                        </div>
                                        <div class="row fs-6 col-6">
                                            <p>Preface:
                                                There are two sides in this game. You play as the dog.
                                                You as the dog must guest which coordinates the chickens are hiding
                                                in a 4x4 field</p>
                                            <ol>
                                                <li>Press the coordinates to launch missile</li>
                                                <li>If the missile launched hits a chicken, you get 3 points</li>
                                                <li>If your attack missed, you get 1 point deduction to your score
                                                </li>
                                                <li>The game ends when you hit all the chickens or ran out of
                                                    bullets</li>
                                                <li>Win = all chickens hit</li>
                                                <li>Lose = all bullets gone and chicken(s) still remain</li>
                                                <li>For a great game experience, turn up the volume for sounds</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>