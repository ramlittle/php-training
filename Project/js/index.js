// VARIABLES
const playButton = document.querySelector("#play-button")
const playButtonContainer = document.querySelector("#play-button-container");
const gameContainer = document.querySelector("#game-container")
const gameplay = document.querySelector("#gameplay")
const bulletContainer = document.querySelector("#bullet-container");
const eggsContainer = document.querySelector("#eggs-container");
const scoreContainer = document.querySelector("#score-container");
const statusContainer = document.querySelector("#status-container")
const winContainer = document.querySelector("#win-container")
const lostContainer = document.querySelector("#lost-container")
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
let eggs = 0;
let score = 0;

// DEFAULTS on First Render
gameContainer.style.display = "none";
winContainer.style.display = "none";
lostContainer.style.display = "none";

// ACTIONS
playButton.addEventListener("click", () => {
    gameContainer.style.display = "flex";
    playButtonContainer.style.display = "none";
    sadChickenContainer.style.display = "none";
    gamePlaySound.play();
    randomizeEggs();
    console.log('value of coordinates now', coordinates)
    setBullets();
    bulletContainer.textContent = bullets;
})

button1x1.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(0, 1)
    checkRemainingBulletsAndEggs()
    bazookaSound.play();
})
button1x2.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(0, 2)
    checkRemainingBulletsAndEggs()
    bazookaSound.play();
})
button1x3.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(0, 3)
    checkRemainingBulletsAndEggs()
    bazookaSound.play();
})
button1x4.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(0, 4)
    checkRemainingBulletsAndEggs()
    bazookaSound.play();
})
button2x1.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(1, 1)
    checkRemainingBulletsAndEggs()
    bazookaSound.play();
})
button2x2.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(1, 2)
    checkRemainingBulletsAndEggs()
    bazookaSound.play();
})
button2x3.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(1, 3)
    checkRemainingBulletsAndEggs()
    bazookaSound.play();
})
button2x4.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(1, 4)
    checkRemainingBulletsAndEggs()
    bazookaSound.play();
})
button3x1.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(2, 1)
    checkRemainingBulletsAndEggs()
    bazookaSound.play();
})
button3x2.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(2, 2)
    checkRemainingBulletsAndEggs()
    bazookaSound.play();
})
button3x3.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(2, 3)
    checkRemainingBulletsAndEggs()
    bazookaSound.play();
})
button3x4.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(2, 4)
    checkRemainingBulletsAndEggs()
    bazookaSound.play();
})
button4x1.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(3, 1)
    checkRemainingBulletsAndEggs()
    bazookaSound.play();
})
button4x2.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(3, 2)
    checkRemainingBulletsAndEggs()
    bazookaSound.play();
})
button4x3.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(3, 3)
    checkRemainingBulletsAndEggs()
    bazookaSound.play();
})
button4x4.addEventListener("click", () => {
    bullets--;
    bulletContainer.textContent = bullets;
    checkIfEggWasHit(3, 4)
    checkRemainingBulletsAndEggs()
    bazookaSound.play();
})


// FUNCTIONS
function randomizeEggs() {
    for (let row = 0; row < coordinates.length; row++) {
        for (let col = 0; col < coordinates.length; col++) {
            //locate the eggs in the eggNest 2D array using Math random (0 or 1)
            coordinates[row][col] = (Math.floor(Math.random() * 2));
        }
    }
}

function setBullets() {
    for (let row = 0; row < coordinates.length; row++) {
        for (let col = 0; col < coordinates.length; col++) {
            if (coordinates[row][col] == 1) {
                bullets++;
            }
        }
    }
    eggs = bullets;
    bullets+=7;
    eggsContainer.textContent = eggs;
}

function checkIfEggWasHit(row, col) {
    if (coordinates[row][col] === 1) {
        eggs--;
        score += 3;
        eggsContainer.textContent = eggs;
        scoreContainer.textContent = score;
        statusContainer.textContent = "Hit!"
        coordinates[row][col] = 0;
        sadChickenContainer.style.display = "block"
        happyChickenContainer.style.display = "none"
    } else {
        score--;
        scoreContainer.textContent = score;
        statusContainer.textContent = "Missed!"
        sadChickenContainer.style.display = "none"
        happyChickenContainer.style.display = "block"
        createCrater();
    }
}

function checkRemainingBulletsAndEggs() {
    if (bullets === 0 && eggs > 0) {
        statusContainer.textContent = "Game Over!";
        alert("Game Over, You Loose");
        lostContainer.style.display = "block";
        gameplay.style.display = "none";
        cucuSound.play();
    } else if (eggs === 0) {
        statusContainer.textContent = "You Win!";
        alert("Game Over, You Win!")
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