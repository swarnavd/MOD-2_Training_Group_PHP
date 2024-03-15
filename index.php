<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Form</title>
  <link rel = "stylesheet" href="./CSS/style.css">
</head>
<body>
    <div>
      <form action="connection.php" method="post" >
        <label for="employee-code">Employee code</label>
        <input type="text" id="ecode" name="ecode" placeholder="Enter employee code" >
        <label for="employee-code-name">Employee code name</label>
        <input type="text" id="ecodename" name="ecodename" placeholder="Enter employee code name....">
        <label for="employee-domain">Employee Domain name</label>
        <input type="text" id="edomain" name="edomain">
        <label for="id">Employee id</label>
        <input type="text" id="eid" name="eid" placeholder="Enter employee id....">
        <label for="employee-salary">Employee Salary</label>
        <input type="text" id="esal" name="esal" placeholder="Enter salary..">
        <label for="employee-first-name">Employee first name</label>
        <input type="text" id="efname" name="efname" placeholder="Enter employee name" >
        <label for="employee-last-name">Employee last name</label>
        <input type="text" id="elname" name="elname" placeholder="Enter employee last name" >
        <label for="graduation">Employee graduation percentile</label>
        <input type="text" id="graduation" name="graduation" placeholder="Enter employee graduation percentile..." >
        <input type="submit" name="Submit">
      </form>
    </div>
  </form>
</body>
</html>