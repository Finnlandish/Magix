let musicPlaying = false
let BattleMusicPlaying = false

let PlayMusic = document.querySelectorAll("#music");

let b1 = document.getElementById("musiclob1");
let b2 = document.getElementById("musiclob2");
let b3 = document.getElementById("musiclob3");
let b4 = document.getElementById("musiclob4");
let b5 = document.getElementById("musiclob5");
let b6 = document.getElementById("musiclob6");

PlayMusic.onclick = () => {
    playMusic()
}
function playMusic() {
    const r = Math.floor(Math.random() * 6);
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
        b1.volume = 0.05;
        b2.volume = 0.05;
        b3.volume = 0.05;
        b4.volume = 0.05;
        b5.volume = 0.05;
        b6.volume = 0.05;
        musicPlaying = true
    }
    else{
        b1.pause();
        b2.pause();
        b3.pause();
        b4.pause();
        musicPlaying = false
    }
}

let BattleMusic = document.querySelectorAll("#battlemusic");
let ba1 = document.getElementById("musicbat1");
let ba2 = document.getElementById("musicbat2");
let ba3 = document.getElementById("musicbat3");


BattleMusic.onclick = () => {
    playBattleMusic()
}

function playBattleMusic() {
    const r2 = Math.floor(Math.random() * 2);
    if (!BattleMusicPlaying) {
        if (r2 == 0) {
            ba1.play();
        } else if (r2 == 1) {
            ba2.play();
        } else if (r2 == 2) {
            ba3.play();
        } 
        ba1.volume = 0.05;
        ba2.volume = 0.05;
        ba3.volume = 0.05;
        BattleMusicPlaying = true
    }
    else{
        ba1.pause();
        ba2.pause();
        ba3.pause();
        BattleMusicPlaying = false
    }



}

