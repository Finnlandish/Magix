let curdata = []
let attackform = new FormData()
let gamelost = false
let gamewon = false
let waiting = false
let mp = 0
const state = () => {

    fetch("ajax-state.php", { // Il faut créer cette page et son contrôleur appelle

        method: "POST" // l’API (games/state)

    })

    .then(response => response.json())

    .then(data => {

        console.log(data); // contient les cartes/état du jeu.
        if (typeof data == "object") {
            //supposed to reduces flickerring
            if (JSON.stringify(curdata["hand"]) != JSON.stringify(data["hand"]) ||
                JSON.stringify(curdata["board"]) !== JSON.stringify(data["board"]) ||
                JSON.stringify(curdata["opponent"]["board"]) !== JSON.stringify(data["opponent"]["board"])) {
                mp = data.mp
                curdata = data
                clearJeu()
                add_stat(data)
                add_hand(data)
                add_board(data)
                add_enemy_board(data)
                creer_enemy_hand(data)
                afficher_Avatar(data)
                document.getElementById("error").innerHTML = ""
            }
            document.getElementById("backLobby").style.display = "none"

            timer(data)

            curdata = data

        } else {
            if (data == "LAST_GAME_WON") {
                gamewon = true

            } else
            if (data == "LAST_GAME_LOST") {
                gamelost = true


            } else if (data == "WAITING") {
                waiting = true


            }

            if (gamewon) {
                clearJeu()
                const boxes = document.querySelectorAll('.EndcardWon');

                boxes.forEach(box => {
                    box.remove();
                });
                let Endcard = document.createElement("div")
                Endcard.appendChild(document.createTextNode("GAME WON!!!"))
                Endcard.appendChild(document.createElement("br"))
                Endcard.appendChild(document.createElement("br"))
                Endcard.appendChild(document.createTextNode("Return to lobby to play again!"))

                Endcard.className = "EndcardWon"
                document.querySelector(".game").appendChild(Endcard)

                document.getElementById("backLobby").style.display = "block"
                document.getElementById("backLobby").style.backgroundColor = "#00FFFF"
                document.getElementById("backLobby").style.right = "40vw"
                document.getElementById("backLobby").style.width = "20vw"
                document.getElementById("backLobby").style.height = "5vh"
                document.getElementById("backLobby").style.fontSize = "36px"
                document.getElementById("heroPower").style.display = "none"
                document.getElementById("endturn").style.display = "none"
                document.getElementById("surrender").style.display = "none"

            } else if (gamelost) {
                clearJeu()
                const boxes = document.querySelectorAll('.EndcardLost');

                boxes.forEach(box => {
                    box.remove();
                });
                let Endcard = document.createElement("div")
                Endcard.appendChild(document.createTextNode("GAME LOST"))
                Endcard.appendChild(document.createElement("br"))
                Endcard.appendChild(document.createTextNode("better luck next time!"))
                Endcard.appendChild(document.createElement("br"))
                Endcard.appendChild(document.createElement("br"))
                Endcard.appendChild(document.createTextNode("Return to lobby to play again!"))

                Endcard.className = "EndcardLost"
                document.querySelector(".game").appendChild(Endcard)
                document.getElementById("backLobby").style.display = "block"
                document.getElementById("backLobby").style.right = "40vw"
                document.getElementById("backLobby").style.width = "20vw"
                document.getElementById("backLobby").style.height = "5vh"
                document.getElementById("backLobby").style.fontSize = "36px"
                document.getElementById("heroPower").style.display = "none"
                document.getElementById("endturn").style.display = "none"
                document.getElementById("surrender").style.display = "none"


            } else {
                document.getElementById("error").innerHTML = JSON.stringify(data)

            }

        }
        if (typeof data != "object") {
            document.getElementById("error").innerHTML = "Warning : " + data
        }
        if (!data.heroPowerAlreadyUsed) {
            document.getElementById("heroPower").onclick = () => {
                console.log("hero")
                let form = new FormData()
                form.append('type', 'HERO_POWER')
                fetch("ajax-state.php", { // Il faut créer cette page et son contrôleur appelle
                        method: "POST", // l’API (games/state)
                        body: form
                    })
                    .then(response => response.json())
                    .then(data => {})

            }
        }
        setTimeout(state, 1000); // Attendre 1 seconde avant de relancer l’appel

    })

}

const afficher_Avatar = (data) => {
    let mAvatar = document.getElementById("myAvatar")
    let eAvatar = document.getElementById("enemyAvatar")

    if (data.heroClass.includes("Rogue")) {
        mAvatar.style.background = "url('img/Heros/mRogue.png')";
        mAvatar.style.backgroundSize = "contain";
        mAvatar.style.backgroundRepeat = "no-repeat";
    } else if (data.heroClass.includes("DemonHunter")) {
        mAvatar.style.background = "url('img/Heros/mDemonHunter.png')";
        mAvatar.style.backgroundSize = "contain";
        mAvatar.style.backgroundRepeat = "no-repeat";
    } else if (data.heroClass.includes("Mage")) {
        mAvatar.style.background = "url('img/Heros/mMage.png')";
        mAvatar.style.backgroundSize = "contain";
        mAvatar.style.backgroundRepeat = "no-repeat";
    } else if (data.heroClass.includes("Shaman")) {
        mAvatar.style.background = "url('img/Heros/mShaman.png')";
        mAvatar.style.backgroundSize = "contain";
        mAvatar.style.backgroundRepeat = "no-repeat";
    } else if (data.heroClass.includes("Warrior")) {
        mAvatar.style.background = "url('img/Heros/mWarrior.png')";
        mAvatar.style.backgroundSize = "contain";
        mAvatar.style.backgroundRepeat = "no-repeat";
    } else if (data.heroClass.includes("Priest")) {
        mAvatar.style.background = "url('img/Heros/mPriest.png')";
        mAvatar.style.backgroundSize = "contain";
        mAvatar.style.backgroundRepeat = "no-repeat";
    } else if (data.heroClass.includes("Hunter")) {
        mAvatar.style.background = "url('img/Heros/mHunter.png')";
        mAvatar.style.backgroundSize = "contain";
        mAvatar.style.backgroundRepeat = "no-repeat";
    } else if (data.heroClass.includes("Paladin")) {
        mAvatar.style.background = "url('img/Heros/mPaladin.png')";
        mAvatar.style.backgroundSize = "contain";
        mAvatar.style.backgroundRepeat = "no-repeat";
    } else if (data.heroClass.includes("Druid")) {
        mAvatar.style.background = "url('img/Heros/mDruid.png')";
        mAvatar.style.backgroundSize = "contain";
        mAvatar.style.backgroundRepeat = "no-repeat";
    } else if (data.heroClass.includes("Warlock")) {
        mAvatar.style.background = "url('img/Heros/mWarlock.png')";
        mAvatar.style.backgroundSize = "contain";
        mAvatar.style.backgroundRepeat = "no-repeat";
    }
    if (data.opponent.heroClass.includes("Rogue")) {
        eAvatar.style.background = "url('img/Heros/eRogue.png')";
        eAvatar.style.backgroundSize = "contain";
        eAvatar.style.backgroundRepeat = "no-repeat";
    } else if (data.opponent.heroClass.includes("Mage")) {
        eAvatar.style.background = "url('img/Heros/eMage.png')";
        eAvatar.style.backgroundSize = "contain";
        eAvatar.style.backgroundRepeat = "no-repeat";
    } else if (data.opponent.heroClass.includes("Shaman")) {
        eAvatar.style.background = "url('img/Heros/eShaman.png')";
        eAvatar.style.backgroundSize = "contain";
        eAvatar.style.backgroundRepeat = "no-repeat";
    } else if (data.opponent.heroClass.includes("Warrior")) {
        eAvatar.style.background = "url('img/Heros/eWarrior.png')";
        eAvatar.style.backgroundSize = "contain";
        eAvatar.style.backgroundRepeat = "no-repeat";
    } else if (data.opponent.heroClass.includes("Priest")) {
        eAvatar.style.background = "url('img/Heros/ePriest.png')";
        eAvatar.style.backgroundSize = "contain";
        eAvatar.style.backgroundRepeat = "no-repeat";
    } else if (data.opponent.heroClass.includes("Hunter")) {
        eAvatar.style.background = "url('img/Heros/eHunter.png')";
        eAvatar.style.backgroundSize = "contain";
        eAvatar.style.backgroundRepeat = "no-repeat";
    } else if (data.opponent.heroClass.includes("Paladin")) {
        eAvatar.style.background = "url('img/Heros/ePaladin.png')";
        eAvatar.style.backgroundSize = "contain";
        eAvatar.style.backgroundRepeat = "no-repeat";
    } else if (data.opponent.heroClass.includes("Druid")) {
        eAvatar.style.background = "url('img/Heros/eDruid.png')";
        eAvatar.style.backgroundSize = "contain";
        eAvatar.style.backgroundRepeat = "no-repeat";
    } else if (data.opponent.heroClass.includes("DemonHunter")) {
        eAvatar.style.background = "url('img/Heros/eDemonHunter.png')";
        eAvatar.style.backgroundSize = "contain";
        eAvatar.style.backgroundRepeat = "no-repeat";
    } else if (data.opponent.heroClass.includes("Warlock")) {
        eAvatar.style.background = "url('img/Heros/eWarlock.png')";
        eAvatar.style.backgroundSize = "contain";
        eAvatar.style.backgroundRepeat = "no-repeat";
    }

    eAvatar.onmouseenter = () => {
        eAvatar.style.boxShadow = "0 0 6px 6px #FF0000"
    }
    eAvatar.onmouseleave = () => {
        eAvatar.style.boxShadow = "none";


    }
}

const créer_hand = (data, area) => {
    data.forEach(e => {
        let card = document.createElement("div")
        let card_uid = e.uid
        let card_id = e.id
        card.id = e.uid
        card.appendChild(document.createTextNode(" hp : " + e.hp))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode(" id : " + e.id))

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
        if (e.cost <= mp) {
            card.style.border = "thick inset #FFFF00"

        } else {
            card.style.opacity = "0.7"
            card.style.boxShadow = "none"
        }

        card.onmouseenter = () => {
            if (e.cost <= mp) {
                card.style.border = "thick inset #FFFFF0"
                card.style.boxShadow = "0 0 6px 6px #FFFF00"
            }
        }
        card.onmouseleave = () => {
            card.style.border = "none";
            card.style.boxShadow = "none";
            card.style.height = "70%"
            if (e.cost <= mp) {
                card.style.border = "thick inset #FFFF00"

            } else {
                card.style.opacity = "0.7";
            }
        }
        card.onclick = () => {

            let form = new FormData()

            if (e.cost < mp) {
                form.append("id", card_id)

            }
            form.append("type", "PLAY")
            form.append("uid", card_uid)

            fetch("ajax-state.php", { // Il faut créer cette page et son contrôleur appelle
                    method: "POST", // l’API (games/state)
                    body: form
                })
                .then(response => response.json())
                .then(data => {
                    if (typeof data == "object") {

                    } else {}
                })
            cardPlayed = false
        }
        if (e.mechanics.includes("Charge")) {
            card.style.backgroundImage = "url('img/pichuCard.png')";
        } else if (e.mechanics.includes("Taunt")) {
            card.style.backgroundImage = "url('img/snorlaxCard.png')";
        } else if (e.mechanics.includes("Stealth")) {
            card.style.backgroundImage = "url('img/greninjaCard.png')";
        }

    });

}

const creer_enemy_hand = (data) => {
    for (let i = 0; i < data.opponent.handSize; i++) {
        let card = document.createElement("div")
        card.className = "flipedCard"
        document.getElementById("enemydeck").appendChild(card)
        card.className = "flipedCard"

    }
}

const créer_board = (data, area) => {
    data.forEach(e => {
        let card = document.createElement("div");
        // let state = board.state
        card.id = e.uid
        let card_uid = e.uid
        card.appendChild(document.createTextNode(" hp : " + e.hp))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))

        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode(" id : " + e.id))
        card.appendChild(document.createElement("br"))
        card.appendChild(document.createTextNode(" Cost : " + e.cost))
        card.appendChild(document.createElement("br"))
        card.appendChild(document.createTextNode(" Dmg : " + e.atk))
        card.appendChild(document.createElement("br"))
        card.appendChild(document.createElement("br"))
        card.appendChild(document.createElement("br"))
        card.appendChild(document.createTextNode(" mechanic : " + e.mechanics))
        document.getElementById(area).appendChild(card)
        card.className = "myboard"

        if (e.state == "SLEEP") {
            card.style.backgroundImage = "url('img/dittoSleep.png')"
            card.style.opacity = 0.5;

        } else {
            card.style.border = "thick inset #FFFF00"

            card.style.backgroundImage = "url('img/Dittocart.png')"
        }

        card.onmouseenter = () => {
            card.style.boxShadow = "0 0 6px 6px #FFFF00"
            card.style.border = "thick inset #FFFFF0"
        }
        card.onmouseleave = () => {
            card.style.border = "none";
            card.style.boxShadow = "none";
            card.style.height = "70%"
            if (e.state != "SLEEP") {
                card.style.border = "thick inset #FFFF00"
            }
            if (e.mechanics.includes("Stealth")) {
                card.style.backgroundImage = "url('img/greninjaCard.png')";
                card.style.boxShadow = "0 0 6px 6px #b1b9c7"

                card.style.opacity = 1;

                if (e.state == "SLEEP") {
                    card.style.opacity = 0.5;

                } else {
                    card.style.border = "thick inset #FFFF00"
                }
            }

        }
        card.onclick = () => {
            attackform.delete('type')
            attackform.delete('uid')
            attackform.append("type", "ATTACK")
            attackform.append("uid", card_uid)

        }
        if (e.mechanics.includes("Charge")) {
            card.style.backgroundImage = "url('img/pichuCard.png')";
            card.style.backgroundSize = 'cover';
            card.style.opacity = 1;

            if (e.state == "SLEEP") {

                card.style.backgroundImage = "url('img/pichuSleep.png')";
                card.style.opacity = 0.5;

            } else {
                card.style.border = "thick inset #FFFF00"
            }

        } else if (e.mechanics.includes("Taunt")) {
            card.style.backgroundImage = "url('img/snorlaxCard.png')";
            card.style.backgroundSize = 'cover';
            card.style.opacity = 1;

            if (e.state == "SLEEP") {
                card.style.backgroundImage = "url('img/snorlaxSleep.png')";
                card.style.opacity = 0.5;

            } else {
                card.style.border = "thick inset #FFFF00"
            }

        } else if (e.mechanics.includes("Stealth")) {
            card.style.backgroundImage = "url('img/greninjaCard.png')";
            card.style.boxShadow = "0 0 6px 6px #b1b9c7"

            card.style.opacity = 1;

            if (e.state == "SLEEP") {
                card.style.backgroundImage = "url('img/greninjaSleep.png')";
                card.style.opacity = 0.5;

            } else {
                card.style.border = "thick inset #FFFF00"
            }
        }

    });
}
const créer_enemy_board = (data, area) => {
    data.forEach(e => {
        let card = document.createElement("div");
        card.id = e.uid
        let card_uid = e.uid
        card.appendChild(document.createTextNode(" hp : " + e.hp))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))

        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode('\u00A0\u00A0'))
        card.appendChild(document.createTextNode(" id : " + e.id))

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

        if (e.state == "SLEEP") {
            card.style.backgroundImage = "url('img/dittoSleep.png')"
            card.style.opacity = 0.5;

        } else {
            card.style.backgroundImage = "url('img/Dittocart.png')"
            card.style.opacity = 1;

        }
        card.onmouseenter = () => {
            card.style.border = "thick inset #FF0000"
            card.style.boxShadow = "0 0 6px 6px #FF0000"



        }
        card.onmouseleave = () => {
            card.style.border = "none";
            card.style.boxShadow = "none";
            card.style.height = "70%"
            if (e.mechanics.includes("Stealth")) {
                card.style.backgroundImage = "url('img/greninjaCard.png')";
                card.style.boxShadow = "0 0 6px 6px #b1b9c7"
                card.style.border = "none"
                card.style.opacity = 1;

                if (e.state == "SLEEP") {
                    card.style.backgroundImage = "url('img/greninjaSleep.png')";
                    card.style.opacity = 0.5;

                } else {
                    card.style.border = "thick inset #FFFF00"
                }
            }

        }
        card.onclick = () => {
            attackform.delete('targetuid')
            attackform.append("targetuid", card_uid)
            fetch("ajax-state.php", { // Il faut créer cette page et son contrôleur appelle
                    method: "POST", // l’API (games/state)
                    body: attackform
                })
                .then(response => response.json())
                .then(data => {})
        }
        if (e.mechanics.includes("Charge")) {
            card.style.backgroundImage = "url('img/pichuCard.png')";
            card.style.backgroundSize = 'cover';
            card.style.opacity = 1;

            if (e.state == "SLEEP") {
                card.style.backgroundImage = "url('img/pichuSleep.png')";
                card.style.opacity = 0.5;

            }

        } else if (e.mechanics.includes("Taunt")) {
            card.style.backgroundImage = "url('img/snorlaxCard.png')";
            card.style.backgroundSize = 'cover';
            card.style.opacity = 1;

            if (e.state == "SLEEP") {
                card.style.backgroundImage = "url('img/snorlaxSleep.png')";
                card.style.opacity = 0.5;

            }

        } else if (e.mechanics.includes("Stealth")) {
            card.style.backgroundImage = "url('img/greninjaCard.png')";
            card.style.boxShadow = "0 0 6px 6px #b1b9c7"

            card.style.opacity = 1;

            if (e.state == "SLEEP") {
                card.style.backgroundImage = "url('img/greninjaSleep.png')";
                card.style.opacity = 0.5;

            }
        }


    });
}

const créer_stats = (data, area) => {
    let stat = document.createElement("div")
    let hp = document.createElement("div")
    let mp = document.createElement("div")
    stat.appendChild(document.createTextNode(" class : " + data.heroClass))
    stat.appendChild(document.createElement("br"))
    stat.appendChild(document.createTextNode(" carte restantes : " + data.remainingCardsCount))
    hp.id = "hp"
    mp.id = "mp"
    hp.appendChild(document.createTextNode(data.hp))
    mp.appendChild(document.createTextNode(data.mp))
    stat.appendChild(hp)
    stat.appendChild(mp)
    document.getElementById(area).appendChild(stat)
    document.getElementById(area).style.textAlign = "center"
}
const créer_enemy_stats = (data, area) => {

    let stat = document.createElement("div")
    let info = document.createElement("div")
    let hp = document.createElement("div")
    let mp = document.createElement("div")
    stat.appendChild(document.createTextNode(" Enemy : " + data.username))
    stat.appendChild(document.createElement("br"))
    stat.appendChild(document.createTextNode(" Class : " + data.heroClass))
    hp.id = "hp"
    mp.id = "mp"
    hp.appendChild(document.createTextNode(data.hp))
    mp.appendChild(document.createTextNode(data.mp))
    info.appendChild(hp)
    info.appendChild(mp)
    document.getElementById(area).appendChild(stat)
    document.getElementById("enemyInfo").appendChild(info)

    let avatar = document.getElementById("enemyAvatar")
    avatar.onclick = () => {
        attackform.delete('targetuid')
        attackform.append("targetuid", 0)
        fetch("ajax-state.php", { // Il faut créer cette page et son contrôleur appelle
                method: "POST", // l’API (games/state)
                body: attackform
            })
            .then(response => response.json())
            .then(data => {})
    }
}

const add_hand = (data) => {
    let deck = data.hand;
    créer_hand(deck, "mydeck")
}
const add_board = (data) => {
    let myboard = data.board

    créer_board(myboard, "mycardBox")
}
const add_enemy_board = (data) => {
    let enemycards = data.opponent.board

    créer_enemy_board(enemycards, "enemycardBox")

}
const add_stat = (data) => {

    créer_stats(data, "mystats")
    créer_enemy_stats(data.opponent, "enemystats")
}

const timer = (data) => {
    let time = data.remainingTurnTime
    if (data.yourTurn) {
        document.getElementById("timer").innerHTML = "<br>your turn <br> " + time
        document.getElementById
    } else {
        document.getElementById("timer").innerHTML = "<br>opponent's turn<br> " + time

    }
}
const clear_attackform = (data) => {
    if (!data.yourTurn) {
        var entries = attackform.entries();
        for (var pair of entries) {
            attackform.delete(pair[0]);
        }
    }
    console.log(attackform)
}

const clearJeu = () => {
    document.getElementById("mydeck").innerHTML = ""
    document.getElementById("mycardBox").innerHTML = ""
    document.getElementById("enemycardBox").innerHTML = ""
    document.getElementById("enemydeck").innerHTML = ""
    document.getElementById("timer").innerHTML = ""
    document.getElementById("mystats").innerHTML = ""
    document.getElementById("enemystats").innerHTML = ""
}


var surrenderMp3 = document.getElementById("lostmp3")




document.getElementById('surrender').onclick = function() {
    surrender();
    surrenderMp3.play();

}
document.getElementById('endturn').onclick = function() {
    endturn();
}
document.getElementById('heroPower').onclick = function() {
    heroPower();
}
const surrender = () => {
    let form = new FormData()
    form.append("type", "SURRENDER")
    fetch("ajax-state.php", { // Il faut créer cette page et son contrôleur appelle
            method: "POST", // l’API (games/state)
            body: form
        })
        .then(response => response.json())
        .then(data => {
            if (typeof data == "object") {}
        })
}
const endturn = () => {
    let form = new FormData()
    form.append("type", "END_TURN")
    fetch("ajax-state.php", { // Il faut créer cette page et son contrôleur appelle
            method: "POST", // l’API (games/state)
            body: form
        })
        .then(response => response.json())
        .then(data => {
            if (typeof data == "object") {}
        })
}
const heroPower = () => {
    let form = new FormData()
    form.append("type", "HERO_POWER")
    fetch("ajax-state.php", { // Il faut créer cette page et son contrôleur appelle
            method: "POST", // l’API (games/state)
            body: form
        })
        .then(response => response.json())
        .then(data => {
            if (typeof data == "object") {}
        })
}


window.addEventListener("load", () => {

    setTimeout(state, 1000); // Appel initial (attendre 1 seconde)

});