
function twManageFarbe(vonwo) {
	if (vonwo == 'a1') {
	} 
	if (vonwo == 'a2') {
	} 
	if (vonwo == 'a3') {
		//document.getElementById("a3").className = 'boxGelb';
		document.getElementById("a3TabbedAll").className = 'tabbedAllAmpelGelb';		
		document.getElementById("a3TabbedTabs").className = 'tabbedTabsAmpelGelb';
		//document.getElementById("hier").style.backgroundColor = '#ffffcc';
		//document.getElementById("hier").style.borderBottom = '1px solid #ffffcc';
		document.getElementById("a3TabbedInhalt").className = 'tabbedInhaltAmpelGelb';
	} 
	if (vonwo == 'a4') {
		document.getElementById("a4").className = 'boxGelb';
	} 
	if (vonwo == 'a4submit') {
	} 
	if (vonwo == 'a5') {
	}
	if (vonwo == 'a5submit') {
	}  	
}

// Farbwahl
   function rkFarbeWechseln(FarbObj){       
        //alert ("aaa");
          document.getElementById("tshirtFarbe").style.backgroundColor = FarbObj.style.backgroundColor;
          
    }

