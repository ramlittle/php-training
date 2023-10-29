<?php
include_once "./includes/header.php";
include_once "./config/database.php";
include_once "./classes/player.php";
include_once "./classes/team.php";
include_once "./classes/gameresult.php";
$db = new Database();
$dbase = $db->getConnection();

$player = new Player($dbase);
$statement = $player->read();

$team= new Team($dbase);
$player_statement=$team->read();

$gameresult = new GameResult($dbase);

if ($_POST) {
    if ($_POST['player_id'] == "Select") {
        echo "<script>alert('You forgot to select a player, game not added to leaderboard')</script>";
    } else {
        // Instantiate your $gameresult object here

        $gameresult->player_id = $_POST['player_id'];
        $gameresult->team_id = $_POST['team_id'];
        $gameresult->bullets_left = $_POST['bullets_left'];
        $gameresult->chickens_left = $_POST['chickens_left'];
        $gameresult->score = $_POST['score'];
        $gameresult->status = $_POST['status'];
        $gameresult->date_played = $_POST['date_played'];

        if ($gameresult->add()) {
            echo "<div class='alert alert-success' role='alert'>Added Successfully</div>";
            echo "<script type='text/javascript'>
                alert('Add Successful');
                window.location.href='./pages/leaderboard.php';
            </script>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Failed Adding</div>";
        }
    }


}
?>
<!-- CONTENT -->
<section>
    <!-- FIRST -->
    <div>
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./images/dogchickenhero.png" class="d-block w-100 " alt="..." loading="lazy">
                </div>
                <div class="carousel-item ">
                    <img src="./images/chickens.jpg" class="d-block w-100" alt="..." loading="lazy">
                </div>
                <div class="carousel-item ">
                    <img src="./images/dogs.jpg" class="d-block w-100" alt="..." loading="lazy">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- SECOND -->
    <!-- A -->
    <div id="play-button-container" class="row vh-100">
        <div class="d-flex justify-content-center align-items-center p-2 ">
            <button id="play-button" type="button" class="btn btn-outline-dark fs-1 fs-bold col-3">Play</button>
        </div>
    </div>
    <!-- B -->
    <div id="game-container" class="row">
        <!-- Status and Scoring -->
        <div id="scoreboard" class="row border border-warning fs-2 text-white bg-dark">
            <div class="col">
                <span>Bullets Left: </span>
                <span id="bullet-container"></span>
            </div>
            <div class="col">
                <span>Chickens Left: </span>
                <span id="chickens-container"></span>
            </div>
            <div class="col">
                <span>Score: </span>
                <span id="score-container">0</span>
            </div>
            <div class="col">
                <span>Status: </span>
                <span id="status-container">Select Coordinates</span>
            </div>
            <div class="col">
                <button id="reset-button" class="btn btn-outline-warning">Reset</button>
                <button id="save-button" class="btn btn-warning">Add To Leaderboard</button>
            </div>
        </div>
        <div id="save-result-container" class="p-2 bg-secondary text-white col-6">
            <form method="POST" action="index.php">
                <table class="table">
                    <tr>
                        <td>Select Player</td>
                        <td>
                            <select class="form-control" name="player_id">
                                <option value="Select">Select</option>
                                <?php
                                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                    extract($row);
                                    echo "<option value=\"$player_id\">" . $first_name . ' ' . $last_name . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Select Team</td>
                        <td>
                            <select class="form-control" name="team_id">
                                <option value="Select">Select</option>
                                <?php
                                while ($row = $player_statement->fetch(PDO::FETCH_ASSOC)) {
                                    extract($row);
                                    echo "<option value=\"$team_id\">" . $team_name ."</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Bullets Left</td>
                        <td><input id="bullets-left" type="text" class="form-control bg-secondary text-white"
                                name="bullets_left" readonly /></td>
                    </tr>
                    <tr>
                        <td>Chickens Left:</td>
                        <td><input id="chickens-left" type="text" class="form-control bg-secondary text-white"
                                name="chickens_left" readonly /></td>
                    </tr>
                    <tr>
                        <td>Score:</td>
                        <td><input id="final-score" type="text" class="form-control bg-secondary text-white"
                                name="score" readonly /></td>
                    </tr>
                    <tr>
                        <td>Status:</td>
                        <td><input id="final-status" type="text" class="form-control bg-secondary text-white"
                                name="status" readonly /></td>
                    </tr>
                    <tr>
                        <td>Date Played:</td>
                        <td><input id="date-played" type="text" class="form-control bg-secondary text-white"
                                name="date_played" readonly /></td>
                    </tr>
                </table>
                <div class="d-flex justify-content-end p-2">
                    <button type="submit" class="btn btn-warning">Save</button>
                </div>
            </form>
        </div>

        <div id="gameplay" class="row">
            <div class='col-6 d-flex justify-content-center align-items-center p-2 border'>
                <!-- doggies -->
                <div class="col-12">
                    <div class="row m-2">
                        <div class="row">
                            <div class="col">
                                <button id="button-1x1" class="btn btn-warning m-1 fs-4">1 X 1</button>
                                <button id="button-1x2" class="btn btn-warning m-1 fs-4">1 X 2</button>
                                <button id="button-1x3" class="btn btn-warning m-1 fs-4">1 X 3</button>
                                <button id="button-1x4" class="btn btn-warning m-1 fs-4">1 X 4</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <button id="button-2x1" class="btn btn-warning m-1 fs-4">2 X 1</button>
                                <button id="button-2x2" class="btn btn-warning m-1 fs-4">2 X 2</button>
                                <button id="button-2x3" class="btn btn-warning m-1 fs-4">2 X 3</button>
                                <button id="button-2x4" class="btn btn-warning m-1 fs-4">2 X 4</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <button id="button-3x1" class="btn btn-warning m-1 fs-4">3 X 1</button>
                                <button id="button-3x2" class="btn btn-warning m-1 fs-4">3 X 2</button>
                                <button id="button-3x3" class="btn btn-warning m-1 fs-4">3 X 3</button>
                                <button id="button-3x4" class="btn btn-warning m-1 fs-4">3 X 4</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <button id="button-4x1" class="btn btn-warning m-1 fs-4">4 X 1</button>
                                <button id="button-4x2" class="btn btn-warning m-1 fs-4">4 X 2</button>
                                <button id="button-4x3" class="btn btn-warning m-1 fs-4">4 X 3</button>
                                <button id="button-4x4" class="btn btn-warning m-1 fs-4">4 X 4</button>
                            </div>
                        </div>
                        <div class="row">
                            <div id="angry-dog-container" class="col">
                                <img src="./images/angrydog.png" />
                                <img src="./images/bullet.png" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- chicken eggs -->
            <div class='col-6 border'>
                <div class="row">
                    <div id="happy-chicken-container" class="col">
                        <img src='./images/chickendance.gif' />
                    </div>
                    <div id="sad-chicken-container" class="col">
                        <img src='./images/chickendismayed.gif' />
                    </div>
                    <div id="craters" class="col">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="win-container" class="row">
        <img class="vh-100" src="./images/win.png" />
    </div>
    <div id="lost-container" class="row">
        <img class="vh-100" src="./images/lost.png" />
    </div>
    <div class="row">
        <div class="col bg-warning p-2 rounded text-center text-white">
            <span>Don't forget to add your score to the leaderboard!</span>
        </div>
    </div>
    <!-- THIRD -->
    <div id="how-to-play" class="row vh-100 d-flex justify-content-center align-items-center">
        <div class="row text-center p-2 fs-1">
            <span class="custom-font text-warning fs-1 fs-bold ">How to Play</span>
        </div>
        <div class="row fs-3 col-6">
            <p>Preface:
                There are two sides in this game. You play as the dog.
                You as the dog must guest which coordinates the chickens are hiding in a 4x4 field</p>
            <ol>
                <li>Press the coordinates to launch missile</li>
                <li>If the missile launched hits a chicken, you get 3 points</li>
                <li>If your attack missed, you get 1 point deduction to your score</li>
                <li>The game ends when you hit all the chickens or ran out of bullets</li>
                <li>Win = all chickens hit</li>
                <li>Lose = all bullets gone and chicken(s) still remain</li>
                <li>For a great game experience, turn up the volume for sounds</li>
            </ol>
        </div>
    </div>
    <!-- FOURTH -->
    <div class="row vh-100 d-flex justify-content-center align-items-center p-2">
        <div class="row text-center p-2  bg-secondary  ">
            <div class="col ">
                <span class="custom-font text-warning fs-1 fs-bold ">Reference</span>
            </div>
        </div>
        <div class="row d-flex justify-content-center ">
            <div class="col-8 d-flex flex-column gap-3">
                <img src="./images/samplebattleship.gif" />
                <span class="p-2 bg-warning text-white text-center">Battle Ship Game in Python</span>
                <a class="p-2 bg-warning text-white text-center" href="https://www.w3schools.com/cpp/showcpp.asp?filename=demo_array_multi_battleship" target="_blank">Battle Ship  Game in C++</a>
            </div>
        </div>

    </div>
    <div class="d-flex justify-content-end">
        <a class="top" href="#">Top</a>
    </div>


</section>


<?php
include_once "./includes/footer.php";
?>