let squirtle = document.createElement("div");
document.getElementById("container").append(squirtle);
squirtle.id = 'squirtle'
let baulbasaur = document.createElement("div");
document.getElementById("container").append(baulbasaur);
baulbasaur.id = 'baulbasaur'
let charmander = document.createElement("div");
document.getElementById("container").append(charmander);
charmander.id = 'charmander'


var id = null;
function move() {
    // var x1 = 1500;
    // var y1 = 385;
    var x1 = 750;
    var y1 = 385;
    var x2 = 150;
    var y2 = 450;
    var x3 = 300;
    var y3 = 450;

    squirtle.style.top = y1 + 'px';
    squirtle.style.left = x1 + 'px';
    baulbasaur.style.top = y2 + 'px';
    baulbasaur.style.left = x2 + 'px';
    charmander.style.top = y3 + 'px';
    charmander.style.left = x3 + 'px';
    clearInterval(id);
    id = setInterval(frame, 4);
    function frame() {
        x1;
        x2;
        x3;
        squirtle.style.top = y1 + 'px';
        squirtle.style.left = x1 + 'px';
        baulbasaur.style.top = y2 + 'px';
        baulbasaur.style.left = x2 + 'px';
        charmander.style.top = y3 + 'px';
        charmander.style.left = x3 + 'px';
        if(x1<750){
            
        }


    }
}
move()