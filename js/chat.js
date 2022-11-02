function togglechat() {
    var x = document.getElementById("chat");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
const applyStyles = iframe => {
    let styles = {
        fontColor: "#333",
        backgroundColor: "rgba(87, 41, 5, 0.2)",
        fontGoogleName: "Silkscreen",
        fontSize: "20px",
        hideIcons: false,
        inputBackgroundColor: "red",
        inputFontColor: "blue",
        height: "700px",
        memberListFontColor: "#ff00dd",
        memberListBackgroundColor: "white"
    }

    setTimeout(() => {
        iframe.contentWindow.postMessage(JSON.stringify(styles), "*");
    }, 100);
}
window.addEventListener("load", () => {
    stateLoop = setTimeout(state, 1000); // Appel initial (attendre 1 seconde)

    document.getElementById("chat").onclick = () => {
        var x = document.getElementById("chat");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
});