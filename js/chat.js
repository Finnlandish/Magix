
const applyStyles = iframe => {
	let styles = {
		fontColor : "#333",
		backgroundColor : "rgba(164, 215, 219, 0.88)",
		fontGoogleName : "Teko",
		fontSize : "25px",
		hideIcons : false,
		inputFontColor : "black",
		memberListFontColor : "#ff00dd",
		memberListBackgroundColor : "white"
	}
	
	setTimeout(() => {
		iframe.contentWindow.postMessage(JSON.stringify(styles), "*");	
}, 100);
}
function togglechat() {
    var x = document.getElementById("chat");
    if (x.style.display == "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}