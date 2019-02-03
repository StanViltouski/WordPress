function showElement(layer){
	var myLayer = document.getElementById(layer);
	
	if(myLayer.style.display=="none") {
		myLayer.style.display="block";
	}
}
function hideElement(layer){
	var myLayer = document.getElementById(layer);
	
	if(myLayer.style.display=="block") {
		myLayer.style.display="none";
	}
}