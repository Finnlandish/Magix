function togglechat() {
    var x = document.getElementById("chat");
    if (x.style.display === "none") {
      x.style.display = "block";
    } 
    else {
      x.style.display = "none";
    }
}

window.addEventListener("load", () => {
    stateLoop = setTimeout(state, 1000); // Appel initial (attendre 1 seconde)

    document.getElementById("chat").onclick = ()=>{
        var x = document.getElementById("chat");
        if (x.style.display === "none") {
        x.style.display = "block";
        } 
        else {
        x.style.display = "none";
        }
    }
});