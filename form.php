<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel = "stylesheet" href = "./CSS/style.css">
</head>
<body>
    <div>
        <form method = "post" action = "pdf.php" enctype = "multipart/form-data">
            <label for = "firstname">First Name</label>
            <input type = "text" id = "fName" name = "fName" placeholder = "Your name.." pattern="[A-Za-z]+"  maxlength= "20">
            <label for = "lastname">Last Name</label>
            <input type = "text" id = "lName" name = "lName" placeholder = "Your last name.." pattern="[A-Za-z]+"  maxlength = "20">
            <label for = "fullname">Full Name</label>
            <input type = "text" id = "full" name = "fullName"  disabled>
            <label for = "image">Upload a image</label>
            <input type = "file" id = "image" name = "image" accept = "image/*">
            <label for="marks">Enter Marks</label>
            <textarea id="marks" name="marks" rows="4" cols="50" placeholder="SUBJECT|MARKS"></textarea>
            <label for = "phoneNumber">Phone Number</label>
            <input type = "text" id = "phoneNumber" name = "phoneNumber" placeholder = "Enter your phone number(+91)">
            <label for = "email">Email</label>
            <input type = "text" id = "email" name = "email" placeholder = "Enter your email">
            <input type = "submit" name = "Submit">
        </form>
    </div>
    <script type="text/javascript" src="./JS/script.js"></script>
</body>
</html>
