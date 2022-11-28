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
    var x1 = 1500;
    var y1 = 385;
    // var x1 = 750;
    // var y1 = 385;
    var x2 = 1650;
    var y2 = 385;
    var x3 = 1800;
    var y3 = 385;

    squirtle.style.top = y1 + 'px';
    squirtle.style.left = x1 + 'px';
    baulbasaur.style.top = y2 + 'px';
    baulbasaur.style.left = x2 + 'px';
    charmander.style.top = y3 + 'px';
    charmander.style.left = x3 + 'px';
    clearInterval(id);
    id = setInterval(frame, 10);
    function frame() {
        x1--;
        x2--;
        x3--;
        squirtle.style.left = x1 + 'px';
        baulbasaur.style.left = x2 + 'px';
        charmander.style.left = x3 + 'px';

        if(x1<750){
            y1+=0.2
            x1+=0.8
            y2+=0.2
            x2+=0.9
            y3+=0.2
            x3+=1
            squirtle.style.top = y1 + 'px';
            baulbasaur.style.top = y2 + 'px';
            charmander.style.top = y3 + 'px';

            if(y1>672){
                y1+=1
                y2+=1
                y3+=1
                squirtle.style.top = y1 + 'px';
                baulbasaur.style.top = y2 + 'px';
                charmander.style.top = y3 + 'px';

                if(y1>872){
                    move()
                    
                }
            }
        }


    }
}
move()