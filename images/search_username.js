// JavaScript Document
var xmlHttp;
function findUsername(str){ 
var objXmlHttp=null;
	if (str.length > 0)	{ 
		var url="login.php?sid=" + Math.random();
		x = document.getElementById("form1");
		tableCells = x.submit();
		xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		xmlHttp.onreadystatechange=stateChanged;
		xmlHttp.open("GET", url , true);
		xmlHttp.send(null);
		} 
} 
		
function stateChanged(){ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
		document.getElementById("err_msg").innerHTML=xmlHttp.responseText;
		} 
} 
