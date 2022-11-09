const state = () => {

    fetch("ajax-state.php", { // Il faut créer cette page et son contrôleur appelle

        method: "POST" // l’API (games/state)

    })

    .then(response => response.json())

    .then(data => {

        console.log(data); // contient les cartes/état du jeu.

        setTimeout(state, 1000); // Attendre 1 seconde avant de relancer l’appel

    })

}
const créer_area = (data, area)=>{
    data.forEach(e => {
        let card = document.createElement("div");
        card.id = e.uid;
        card.appendChild(document.createTextNode("Uid: "+e.uid))
        card.appendChild(document.createElement("br"));
        card.appendChild(document.createTextNode("Hp : "+e.hp))
        card.appendChild(document.createElement("br"));
        card.appendChild(document.createTextNode("Cost : "+e.cost ))
        card.appendChild(document.createElement("br"));
        card.appendChild(document.createTextNode("Dmg : "+e.atk))
        card.appendChild(document.createElement("br"));
        document.getElementById(area).appendChild(card);
    });
}

const créer_jeu = (data)=>{
    jeu= data;
    let hand = data.hand;
    let myboard = data.boardl
    créer_area(hand,"myhand");
    créer_area(myboard,"myboard");    



}
window.addEventListener("load", () => {

    setTimeout(state, 1000); // Appel initial (attendre 1 seconde)

});