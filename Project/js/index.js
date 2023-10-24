// VARIABLES
const playButton = document.querySelector("#play-button")
const playButtonContainer = document.querySelector("#play-button-container");
const gameContainer = document.querySelector("#game-container")
const gamePlaySound = new Audio('./audio/gameplaysound.mp3');
let coordinates = [
    [0, 0, 0, 0],
    [0, 0, 0, 0],
    [0, 0, 0, 0],
    [0, 0, 0, 0]
];

// DEFAULTS on First Render
gameContainer.style.display = "none";

// ACTIONS
playButton.addEventListener("click", () => {
    gameContainer.style.display = "flex";
    playButtonContainer.style.display="none";
    // gamePlaySound.play();
})

// function randomizeEggs(){
//     for(let row = 0;row<this.coordinates.length;row++){
//         for(let col =0 ;col<this.coordinates.length;col++){
//             //locate the eggs in the eggNest 2D array using Math random (0 or 1)
//             this.coordinates[row][col]=(Math.floor(Math.random()*2));
//         }
//     }
// }