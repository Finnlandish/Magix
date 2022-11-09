const state = () => {

    fetch("ajax-state.php", { // Il faut créer cette page et son contrôleur appelle

        method: "POST" // l’API (games/state)

    })

    .then(response => response.json())

    .then(data => {

        console.log(data); // contient les cartes/état du jeu.
        if(typeof data == "object"){
            tickJeu()
            créer_jeu(data);
        }
        setTimeout(state, 1000); // Attendre 1 seconde avant de relancer l’appel

    })

}

const créer_area = (data, area)=>{
    data.forEach(e => {
        let card = document.createElement("div");
        card.id = e.uid;
        card.appendChild(document.createTextNode("id: "+e.uid))
        card.appendChild(document.createTextNode("Hp : "+e.hp))
        card.appendChild(document.createTextNode("Cost : "+e.cost ))
        card.appendChild(document.createTextNode("Dmg : "+e.atk))
        document.getElementById(area).appendChild(card);
    });
}
const créer_jeu = (data)=>{
    let deck = data.hand;
    let mycards = data.board;
    créer_area(deck,"mydeck");
    créer_area(mycards,"mycards");    

}


const tickJeu=()=>{
    document.getElementById("mydeck").innerHTML = "";
    document.getElementById("mycards").innerHTML = "";

}





window.addEventListener("load", () => {

    setTimeout(state, 1000); // Appel initial (attendre 1 seconde)

});