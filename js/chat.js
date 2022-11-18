
const applyStyles = iframe => {
	let styles = {
		fontColor : "#333",
		backgroundColor : "rgba(126, 142, 185, 0.48)",
		fontGoogleName : "Teko",
		fontSize : "24px",
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