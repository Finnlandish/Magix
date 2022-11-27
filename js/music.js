let musicPlaying = false
let PlayMusic = document.querySelectorAll("#music");

var b1 = document.getElementById("musiclob1");
var b2 = document.getElementById("musiclob2");
var b3 = document.getElementById("musiclob3");
var b4 = document.getElementById("musiclob4");
var b5 = document.getElementById("musiclob5");
var b6 = document.getElementById("musiclob6");

PlayMusic.onclick = () => {
    playMusic()
}

function playMusic() {
    const r = Math.floor(Math.random() * 4);
    if (!musicPlaying) {
        if (r == 0) {
            b1.play();
        } else if (r == 1) {
            b2.play();
        } else if (r == 2) {
            b3.play();
        } 
        else if (r == 3) {
            b4.play();
        }
        else if (r == 4) {
            b5.play();
        }
        else if (r == 5) {
            b6.play();
        }
        b1.volume = 0.01;
        b2.volume = 0.01;
        b3.volume = 0.01;
        b4.volume = 0.01;
        b5.volume = 0.01;
        b6.volume = 0.01;
        musicPlaying = true
    }
    else if(musicPlaying){

        b1.pause();
        b2.pause();
        b3.pause();
        b4.pause();
        musicPlaying = false
    }



}

