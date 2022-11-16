const state = () => {

    fetch("ajax-state.php", { // Il faut créer cette page et son contrôleur appelle

        method: "POST" // l’API (games/state)

    })

    .then(response => response.json())

    .then(data => {

        console.log(data); // contient les cartes/état du jeu.
        if (typeof data == "object") {


            tickJeu()

            timer(data)
            add_hand(data)
            add_enemy_board(data)
            creer_enemy_hand(data)
            add_stat(data)
        }
        setTimeout(state, 1000); // Attendre 1 seconde avant de relancer l’appel

    })

}
let cards = []
let enemycards = []
let playedCards = []

const créer_hand = (data, area) => {
    data.forEach(e => {
        let card = document.createElement("div")
        card.id = e.uid
        card.appendChild(document.createTextNode(" Hp : " + e.hp))
        card.appendChild(document.createElement("br"))
        card.appendChild(document.createTextNode(" Cost : " + e.cost))
        card.appendChild(document.createElement("br"))
        card.appendChild(document.createTextNode(" Dmg : " + e.atk))
        card.appendChild(document.createElement("br"))
        card.appendChild(document.createElement("br"))
        card.appendChild(document.createElement("br"))
        card.appendChild(document.createTextNode(" mechanic : " + e.mechanics))
        document.getElementById(area).appendChild(card)
        card.className = "cards"
        cards.push(card.id)

        card.onclick = playcard(data)
    });
}
const créer_enemy_board = (data, area) => {
    data.forEach(e => {
        let card = document.createElement("div");
        card.id = e.uid

        card.appendChild(document.createTextNode(" Hp : " + e.hp))
        card.appendChild(document.createElement("br"))
        card.appendChild(document.createTextNode(" Cost : " + e.cost))
        card.appendChild(document.createElement("br"))
        card.appendChild(document.createTextNode(" Dmg : " + e.atk))
        card.appendChild(document.createElement("br"))
        card.appendChild(document.createElement("br"))
        card.appendChild(document.createElement("br"))
        card.appendChild(document.createTextNode(" mechanic : " + e.mechanics))
        document.getElementById(area).appendChild(card)
        card.className = "enemyboard"
        enemycards.push(card)
    });
}
const playcard = (data) => {
    form = new FormData()
    form.append("type")
        // mycards.push(card)
}
const créer_stats = (data, area) => {

    let stat = document.createElement("div")
    stat.appendChild(document.createTextNode(" class : " + data.heroClass))
    stat.appendChild(document.createElement("br"))
    stat.appendChild(document.createTextNode(" Hp : " + data.hp))
    stat.appendChild(document.createElement("br"))
    stat.appendChild(document.createTextNode(" Mp : " + data.mp))
    stat.appendChild(document.createElement("br"))
    document.getElementById(area).appendChild(stat)
}
const add_stat = (data) => {

    créer_stats(data, "mystats")
    créer_stats(data.opponent, "enemystats")
}
const add_ememy_stat = (data) => {
    let stat = document.createElement("div")
    stat.appendChild(document.createTextNode(" class : " + data.opponent.username))
    stat.appendChild(document.createElement("br"))
    stat.appendChild(document.createTextNode(" class : " + data.opponent.heroClass))
    stat.appendChild(document.createElement("br"))
    stat.appendChild(document.createTextNode(" Hp : " + data.opponent.hp))
    stat.appendChild(document.createElement("br"))
    stat.appendChild(document.createTextNode(" Mp : " + data.opponent.mp))
    stat.appendChild(document.createElement("br"))
    document.getElementById(area).appendChild(stat)
}

const add_hand = (data) => {
    let deck = data.hand;
    créer_hand(deck, "mydeck")
}
const add_enemy_board = (data) => {
    let enemycards = data.opponent.board

    créer_enemy_board(enemycards, "enemycardBox")

}
const creer_enemy_hand = (data) => {
    for (let i = 0; i < data.opponent.handSize; i++) {
        let card = document.createElement("div")
        card.className = "flipedCard"
        document.getElementById("enemydeck").appendChild(card)
        card.className = "flipedCard"

    }
}

const creer_enemy_stats = (data) => {

}

const timer = (data) => {
    let time = data.remainingTurnTime
    document.getElementById("timer").innerHTML = time
}

const tickJeu = () => {
    document.getElementById("mydeck").innerHTML = ""
    document.getElementById("mycardBox").innerHTML = ""
    document.getElementById("enemycardBox").innerHTML = ""
    document.getElementById("enemydeck").innerHTML = ""
    document.getElementById("timer").innerHTML = ""
    document.getElementById("mystats").innerHTML = ""
    document.getElementById("enemystats").innerHTML = ""


    cards = []
    enemycards = []
    playedCards = []
}




const heroPower = () => {
    let data = new FormData()
    data.append('POWER', 'skip')
}
const back = () => {
    window.location = 'lobby.php'
}

// document.getElementById("surrender").onclick = surrender(;

// function surrender() {
//     header("location:lobby.php");

// }
window.addEventListener("load", () => {

    setTimeout(state, 1000); // Appel initial (attendre 1 seconde)

});

// {
//     "remainingTurnTime": 24,
//     "yourTurn": true,
//     "heroPowerAlreadyUsed": false,
//     "hp": 30,
//     "mp": 0,
//     "maxMp": 1,
//     "hand": [
//         { "id": 4, "cost": 2, "hp": 3, "atk": 2, "mechanics": [], "uid": 3, "baseHP": 3 },
//         { "id": 22, "cost": 7, "hp": 7, "atk": 7, "mechanics": [], "uid": 5, "baseHP": 7 },
//         { "id": 10, "cost": 3, "hp": 3, "atk": 3, "mechanics": ["taunt", "charge"], "uid": 6, "baseHP": 3 }
//     ],
//     "board": [
//         { "id": 2, "cost": 1, "hp": 1, "atk": 2, "mechanics": [], "uid": 7, "baseHP": 1, "state": "SLEEP" }
//     ],
//     "welcomeText": "My life for Aiur!",
//     "heroClass": “Warrior ",
//     "remainingCardsCount": 24,
//     "opponent": {
//         "username": "Dummy-AI",
//         "heroClass": "Hunter",
//         "hp": 30,
//         "mp": 0,
//         "board": [],
//         welcomeText: "Die, maggot!",
//         "remainingCardsCount": 24,
//         "handSize": 3
//     },
//     latestActions: [] // une liste des dernières actions jouées dans la partie.
// }   },
//     latestActions: [] // une liste des dernières actions jouées dans la partie.
// }   latestActions: [] // une liste des dernières actions jouées dans la partie.
// }