var fName=document.getElementById("fName");
var lName=document.getElementById("lName");
var full=document.getElementById("full");
trimmed2="";
function lengthCheck(){
    if (fName.value.length > 20 ||lName.value.length > 20 ) {
        full.value = "";
        return 0;
      }
    
}
fName.addEventListener('input',function(){
    lengthCheck();
    const value=fName.value;
    trimmed1 = value.replace(/[^a-zA-Z]/g, '');
    full.value = trimmed1+" "+trimmed2;
});
lName.addEventListener('input',function(){
    lengthCheck();
    const value=lName.value;
    trimmed2=value.replace(/[^a-zA-Z]/g, '');
    full.value = trimmed1+" "+trimmed2;
});
