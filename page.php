<?php
require 'Retrieve.php';
$obj = new Retrieve();
$obj->dataRetrieve();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advance task 1</title>
    <link rel = "stylesheet" href="./CSS/style.css">
</head>
<body>
    <?php for ($i = 0; $i < count($obj->fullArr); $i++) : ?>
        <?php if ($i % 2 == 0) : ?>
        <div class="container">
            <div class="lside">
            <div class="title"><?php echo $obj->fullArr[$i]->title; ?></div>

            <div class="image-container">
                <?php for ($j = 0; $j < $obj->fullArr[$i]->iconArrLen(); $j++) : ?>
                <div class="img">
                    <img src="<?php echo $obj->fullArr[$i]->iconArr[$j]; ?>">
                </div>
                <?php endfor; ?>
            </div>
            <div class="service">
                <?php echo $obj->fullArr[$i]->service; ?>
            </div>

            <button><a href="<?php echo $obj->fullArr[$i]->alias; ?>">Explore More</a></button>
            </div>

            <div class="rside">
            <img src="<?php echo $obj->fullArr[$i]->image; ?>">
            </div>
        </div>
        <?php else : ?>
        <div class="container">
            <div class="rside">
            <img src="<?php echo $obj->fullArr[$i]->image; ?>">
            </div>
            <div class="lside">
            <div class="title"><?php echo $obj->fullArr[$i]->title; ?></div>
            <div class="image-container">
                <?php for ($j = 0; $j < $obj->fullArr[$i]->iconArrLen(); $j++) : ?>
                <div class="img">
                    <img src="<?php echo $obj->fullArr[$i]->iconArr[$j]; ?>">
                </div>
                <?php endfor; ?>
            </div>
            <div class="service">
                <?php echo $obj->fullArr[$i]->service; ?>
            </div>
            <button><a href="<?php echo $obj->fullArr[$i]->alias; ?>">Explore More</a></button>
            </div>
        </div>
        <?php endif; ?>
    <?php endfor; ?>
</body>
</html>
