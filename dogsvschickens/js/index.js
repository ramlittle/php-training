// VARIABLES
const playButton = document.querySelector("#play-button")
const playButtonContainer = document.querySelector("#play-button-container");
const gameContainer = document.querySelector("#game-container")
const gameplay = document.querySelector("#gameplay")
const bulletContainer = document.querySelector("#bullet-container");
const chickensContainer = document.querySelector("#chickens-container");
const scoreContainer = document.querySelector("#score-container");
const statusContainer = document.querySelector("#status-container")
const winContainer = document.querySelector("#win-container")
const lostContainer = document.querySelector("#lost-container")
const resetButton = document.querySelector("#reset-button")
const saveButton = document.querySelector("#save-button")
const saveResultContainer = document.querySelector("#save-result-container")
const bulletsLeft = document.querySelector("#bullets-left");
const chickensLeft = document.querySelector("#chickens-left");
const finalScore = document.querySelector("#final-score");
const finalStatus = document.querySelector("#final-status");
const datePlayed=document.querySelector("#date-played")
const craters = document.querySelector("#craters")
const button1x1 = document.querySelector("#button-1x1")
const button1x2 = document.querySelector("#button-1x2")
const button1x3 = document.querySelector("#button-1x3")
const button1x4 = document.querySelector("#button-1x4")
const button2x1 = document.querySelector("#button-2x1")
const button2x2 = document.querySelector("#button-2x2")
const button2x3 = document.querySelector("#button-2x3")
const button2x4 = document.querySelector("#button-2x4")
const button3x1 = document.querySelector("#button-3x1")
const button3x2 = document.querySelector("#button-3x2")
const button3x3 = document.querySelector("#button-3x3")
const button3x4 = document.querySelector("#button-3x4")
const button4x1 = document.querySelector("#button-4x1")
const button4x2 = document.querySelector("#button-4x2")
const button4x3 = document.querySelector("#button-4x3")
const button4x4 = document.querySelector("#button-4x4")
const happyChickenContainer = document.querySelector("#happy-chicken-container")
const sadChickenContainer = document.querySelector("#sad-chicken-container")
const gamePlaySound = new Audio('./audio/gameplaysound.mp3');
const bazookaSound = new Audio('./audio/bazookasound.mp3')
const cucuSound = new Audio('./audio/cuco.mp3')

let coordinates = [
    [0, 0, 0, 0],
    [0, 0, 0, 0],
    [0, 0, 0, 0],
    [0, 0, 0, 0]
];
let bullets = 0;
let chickens = 0;
let score = 0;
let gamestatus = '';
let date= new Date();

// DEFAULTS on First Render
gameContainer.style.display = "none";
winContainer.style.display = "none";
lostContainer.style.display = "none";
saveResultContainer.style.display = "none";

// ACTIONS
playButton.addEventListener("click", () => {
    gameContainer.style.display = "flex";
    playButtonContainer.style.display = "none";
    sadChickenContainer.style.display = "none";
    gamePlaySound.play();
    randomizeChickens();
    console.log(coordinates)
    setBullets();
    bulletContainer.textContent = bullets;
})

resetButton.addEventListener("click", () => {
    gameContainer.style.display = "flex";
    gameplay.style.display = "flex";
    playButtonContainer.style.display = "none";
    lostContainer.style.display = "none";
    winContainer.style.display = "none";
    saveResultContainer.style.display = "none";
    gamePlaySound.play();
    randomizeChickens();
    setBullets();
    bulletContainer.textContent = bullets;
    score = 0;
    scoreContainer.textContent = score;
    statusContainer.textContent = "Try Again!"

    while (craters.firstChild) {
        craters.removeChild(craters.firstChild);
    }
})

saveButton.addEventListener("click", () => {
    saveResultContainer.style.display = "block";
    bulletsLeft.value = bullets;
    chickensLeft.value = chickens;
    finalScore.value = score;
    finalStatus.value = gamestatus;
    const formattedDate = formatDate(date);
    datePlayed.value = formattedDate;
    console.log('date played ',formattedDate)
})


button1x1.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(0, 0)
    checkRemainingBulletsAndChickens()
    bazookaSound.play();
})
button1x2.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(0, 1)
    checkRemainingBulletsAndChickens()
    bazookaSound.play();
})
button1x3.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(0, 2)
    checkRemainingBulletsAndChickens()
    bazookaSound.play();
})
button1x4.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(0, 3)
    checkRemainingBulletsAndChickens()
    bazookaSound.play();
})
button2x1.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(1, 0)
    checkRemainingBulletsAndChickens()
    bazookaSound.play();
})
button2x2.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(1, 1)
    checkRemainingBulletsAndChickens()
    bazookaSound.play();
})
button2x3.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(1, 2)
    checkRemainingBulletsAndChickens()
    bazookaSound.play();
})
button2x4.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(1, 3)
    checkRemainingBulletsAndChickens()
    bazookaSound.play();
})
button3x1.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(2, 0)
    checkRemainingBulletsAndChickens()
    bazookaSound.play();
})
button3x2.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(2, 1)
    checkRemainingBulletsAndChickens()
    bazookaSound.play();
})
button3x3.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(2, 2)
    checkRemainingBulletsAndChickens()
    bazookaSound.play();
})
button3x4.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(2, 3)
    checkRemainingBulletsAndChickens()
    bazookaSound.play();
})
button4x1.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(3, 0)
    checkRemainingBulletsAndChickens()
    bazookaSound.play();
})
button4x2.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(3, 1)
    checkRemainingBulletsAndChickens()
    bazookaSound.play();
})
button4x3.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(3, 2)
    checkRemainingBulletsAndChickens()
    bazookaSound.play();
})
button4x4.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(3, 3)
    checkRemainingBulletsAndChickens()
    bazookaSound.play();
})


// FUNCTIONS

function formatDate(date) {
    const year = date.getFullYear();
    const month = (date.getMonth() + 1).toString().padStart(2, '0'); // Months are zero-based
    const day = date.getDate().toString().padStart(2, '0');
  
    return `${year}-${month}-${day}`;
  }
  
function randomizeChickens() {
    for (let row = 0; row < coordinates.length; row++) {
        for (let col = 0; col < coordinates.length; col++) {
            //locate the chickens in the eggNest 2D array using Math random (0 or 1)
            coordinates[row][col] = (Math.floor(Math.random() * 2));
        }
    }
}

function setBullets() {
    bullets=0;
    for (let row = 0; row < coordinates.length; row++) {
        for (let col = 0; col < coordinates.length; col++) {
            if (coordinates[row][col] == 1) {
                bullets++;
            }
        }
    }
    chickens = bullets;
    bullets += 5;
    chickensContainer.textContent = chickens;
}

function checkIfEggWasHit(row, col) {
    if (coordinates[row][col] === 1) {
        chickens--;
        score += 3;
        chickensContainer.textContent = chickens;
        scoreContainer.textContent = score;
        statusContainer.textContent = "Hit!"
        gamestatus="Hit";
        coordinates[row][col] = 0;
        sadChickenContainer.style.display = "block"
        happyChickenContainer.style.display = "none"
    } else {
        score--;
        scoreContainer.textContent = score;
        statusContainer.textContent = "Missed!"
        gamestatus="Missed!"
        sadChickenContainer.style.display = "none"
        happyChickenContainer.style.display = "block"
        createCrater();
    }
}

function checkRemainingBulletsAndChickens() {
    if (bullets === 0 && chickens > 0) {
        statusContainer.textContent = "Game Over!";
        alert("Game Over, You Loose");
        gamestatus = "Lost"
        lostContainer.style.display = "block";
        gameplay.style.display = "none";
        cucuSound.play();
    } else if (chickens === 0) {
        statusContainer.textContent = "You Win!";
        alert("Game Over, You Win!")
        gamestatus = "Won";
        winContainer.style.display = "block";
        gameplay.style.display = "none";
        cucuSound.play();
    }
}

function createCrater() {
    const crater = document.createElement('img')
    crater.src = "./images/crater.png"
    crater.width = 80
    crater.height = 80
    craters.appendChild(crater)
}