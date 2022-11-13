const state = () => {

    fetch("ajax-state.php", { // Il faut créer cette page et son contrôleur appelle

        method: "POST" // l’API (games/state)

    })

    .then(response => response.json())

    .then(data => {

        console.log(data); // contient les cartes/état du jeu.
        if (typeof data == "object") {
            tickJeu()
            créer_jeu(data)
            creer_enemy(data)
        }
        setTimeout(state, 1000); // Attendre 1 seconde avant de relancer l’appel

    })

}

const créer_area = (data, area) => {
    data.forEach(e => {
        let card = document.createElement("div");
        card.id = e.uid;
        card.appendChild(document.createTextNode(" id : " + e.id))
        card.appendChild(document.createElement("br"));
        card.appendChild(document.createTextNode(" uid : " + e.uid))
        card.appendChild(document.createElement("br"));
        card.appendChild(document.createTextNode(" Hp : " + e.hp))
        card.appendChild(document.createElement("br"));
        card.appendChild(document.createTextNode(" Cost : " + e.cost))
        card.appendChild(document.createElement("br"));
        card.appendChild(document.createTextNode(" Dmg : " + e.atk))
        card.appendChild(document.createElement("br"));
        card.appendChild(document.createTextNode(" mechanic : " + e.mechanics))
        document.getElementById(area).appendChild(card);
        card.className="cards"
        // card.onclick(playcard());
    });
}
const playcard =(data)=> {
    board.append(data)
}
const créer_stats = (data, area) => {
    data.forEach(e => {
        let stat = document.createElement("div");
        document.getElementById(area).appendChild(card);
    });
}
const créer_jeu = (data) => {
    let deck = data.hand;
    let mycards = data.board;
    créer_area(deck, "mydeck");
    créer_area(mycards, "mycardBox");
}
const creer_enemy = (data) => {
    let enemycards = data.opponent.board;
    
    créer_area(enemycards, "enemycardBox");

}
const creer_enemydeck=(data)=> {
    let deck = data.opponent.handSize;
    for (let i = 0; i < data.opponent.handSize; i++) {
        let card = document.createElement("div")
        card.className="flipedCard"
        document.getElementById("enemydeck").appendChild(card);
        card.className="flipedCard"

    }
}

const tickJeu = () => {
    document.getElementById("mydeck").innerHTML = "";
    document.getElementById("mycardBox").innerHTML = "";
    document.getElementById("enemycardBox").innerHTML = "";


}




const heroPower=()=>{
    let data = new FormData();
    data.append('POWER','skip')
}
const back=() => {
    window.location = 'lobby.php';
}

// document.getElementById("surrender").onclick = surrender(;

// function surrender() {
//     header("location:lobby.php");

// }
window.addEventListener("load", () => {

    setTimeout(state, 1000); // Appel initial (attendre 1 seconde)

});