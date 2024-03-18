<?php
require 'result.php';
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/style.css">
  </head>
  <body>
    <div>
      <p class="check">
        <?php
        // This whole block checks if there is any error in input data.
        
        ?>
      </p>
      <?php
      
        

       
             // If length of errorArray is more than 0 then there is error in input data so it shows only specific error messages.
          
      ?>
            <h1>ERROR!</h1>
            <ul>
              <?php
              // Prints error messages in list format.
                for ($x = 0; $x < count($errorArray); $x++) {
              ?>
                  <li class="red"><?= $errorArray[$x] ?></li>
              <?php
                }
         
              ?>
            </ul>
      
  </div>
</body>
</html>