var fname=document.getElementById("fname");
var lname=document.getElementById("lname");
var full=document.getElementById("full");
trimmed2="";
fname.addEventListener('input', function() {
    if (fname.value.length > 20 ||lname.value.length > 20 ) {
        full.value="";
        return 0;
      }
    else{
        const value=fname.value;
    trimmed1=value.replace(/[^a-zA-Z]/g, '');
    // full.value = trimmed1;
    full.value = trimmed1+" "+trimmed2;
    }
    
});
lname.addEventListener('input', function() {
    if (fname.value.length > 20 ||lname.value.length > 20 ) {
        full.value="";
        return 0;
      }
    else{
        const value=lname.value;
        trimmed2=value.replace(/[^a-zA-Z]/g, '');
        full.value = trimmed1+" "+trimmed2;
    }
    
});