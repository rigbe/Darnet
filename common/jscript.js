



function checkUsername (strng) {
 var error = "";
 if (strng == "") {
    error = "You didn't enter a username.\n";
 }
 
 
 if ((strng.length < 4) || (strng.length > 10)) {
    error = "The username is the wrong length.\n";
}




var illegalChars = /\W/;
  // allow only letters, numbers, and underscores
    if (illegalChars.test(strng)) {
       error = "The username contains illegal characters.\n";
    } 
	
onSubmit="checkWholeForm(frmchangepass)	
	
	
function checkPassword (strng) {
 var error = "";
 if (strng == "") {
    error = "You didn't enter a password.\n";
 }
    var illegalChars = /[\W_]/; // allow only letters and numbers
    if ((strng.length < 6) || (strng.length > 8)) {
       error = "The password is the wrong length.\n";
    }
    else if (illegalChars.test(strng)) {
      error = "The password contains illegal characters.\n";
    }	
else if (!((strng.search(/(a-z)+/))
  && (strng.search(/(A-Z)+/))
  && (strng.search(/(0-9)+/)))) {
  error = "The password must contain at least one 
    uppercase letter, one lowercase letter,
    and one numeral.\n";
  }
  
  
  
  
  	





	