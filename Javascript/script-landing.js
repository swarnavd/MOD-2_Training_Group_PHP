// Storing all the values from the html form.
var fName = document.getElementById("fName");
var lName = document.getElementById("lName");
var full = document.getElementById("full");
var trimmed2 = "";
var trimmed1 = "";
// Declaring regular expression for replacing character other than alphabet.
const regex = new RegExp(/[^a-zA-Z]/g);

/**
 * lengthCheck checks if number of characters in first name or last name exceeds or not.
 *
 * @returns void
 */
function lengthCheck() {
  // If length of first name or last name exceeds then it terminates and shows nothing in fullname field.
  if (fName.value.length > 20 || lName.value.length > 20) {
    full.value = "";
    return 0;
  }
}

// Displaying full name in a different field.
fName.addEventListener('input', function () {
  lengthCheck();
  const value = fName.value;
  // If fullname contains any special character then it ignores it.
  trimmed1 = value.replace(regex, '');
  full.value = trimmed1 + " " + trimmed2;
});
lName.addEventListener('input', function () {
  lengthCheck();
  const value = lName.value;
  // If lastname contains any special character then it ignores it.
  trimmed2 = value.replace(regex, '');
  full.value = trimmed1 + " " + trimmed2;
});
