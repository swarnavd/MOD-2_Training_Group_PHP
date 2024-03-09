<?php
require 'apicall.php';
/**
 * Class fetch to fetch the data from API.
 * 
 * Class for fetching title,service,image,alias and icon 
 */
class fetch
{
  public $title;
  public $service;
  public $image;
  public $alias;
  public $iconArr;
  /**
   * fetch constructor.
   * 
   * @param string $alias,$title,$service,$image,$iconArr
   * 
   * Fetched data will be passed as parameter.
   */
  function __construct($title, $service, $image, $alias, $iconArr)
  {
    $this->title = $title;
    $this->service = $service;
    $this->image = $image;
    $this->alias = $alias;
    $this->iconArr = $iconArr;
  }
  /**
   * iconArrLen function to count the number of icons which will be stored in array format.
   *
   * @return integer
   */
  function iconArrLen()
  {
    return count($this->iconArr);
  }
}
// Initializing an array to contain all retrieved data.
$fullArr = [];
// Calling apiCall function to call the api and retrieve data.
$data = apiCall("https://www.innoraft.com/jsonapi/node/services");
// Declaring domain name to concate it wherever needed.
$domain = "https://www.innoraft.com";

for ($i = 0; $i < count($data['data']); $i++) {
  if ($data['data'][$i]['attributes']['field_services']['value'] != NULL && $i > 11) {
    $iconArr = [];
    $title = $data['data'][$i]['attributes']['field_secondary_title']['value'];
    $service = ($data['data'][$i]['attributes']['field_services']['value']);
    $image = $domain . apiCall($data['data'][$i]['relationships']['field_image']['links']['related']['href'])['data']['attributes']['uri']['url'];
    $alias = $domain . $data['data'][$i]['attributes']['path']['alias'];
    $iconApi1 = apiCall($data['data'][$i]['relationships']['field_service_icon']['links']['related']['href']);
    for ($j = 0; $j < count($iconApi1['data']); $j++) {
      $iconApi2 = apiCall($iconApi1['data'][$j]['relationships']['field_media_image']['links']['related']['href']);
      $iconImg = $domain . $iconApi2['data']['attributes']['uri']['url'];
      array_push($iconArr, $iconImg);
    }
    $obj = new fetch($title, $service, $image, $alias, $iconArr);
    array_push($fullArr, $obj);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advanced 1</title>
  <link rel="stylesheet" href="./CSS/style.css">
</head>

<body>
  <?php
  for ($i = 0; $i < count($fullArr); $i++) : ?>
    <?php if ($i % 2 == 0) : ?>
      <div class="container">
        <div class="lside">
          <div class="title"><?php echo $fullArr[$i]->title; ?></div>

          <div class="image-container">
            <?php for ($j = 0; $j < $fullArr[$i]->iconArrLen(); $j++) : ?>
              <div class="img">
                <img src="<?php echo $fullArr[$i]->iconArr[$j]; ?>">
              </div>
            <?php endfor; ?>
          </div>

          <div class="service">
            <?php echo $fullArr[$i]->service; ?>
          </div>

          <button><a href="<?php echo $fullArr[$i]->alias; ?>">Explore More</a></button>
        </div>

        <div class="rside">
          <img src="<?php echo $fullArr[$i]->image; ?>">
        </div>
      </div>

    <?php else : ?>
      <div class="container">
        <div class="rside">
          <img src="<?php echo $fullArr[$i]->image; ?>">
        </div>

        <div class="lside">
          <div class="title"><?php echo $fullArr[$i]->title; ?></div>

          <div class="image-container">
            <?php for ($j = 0; $j < $fullArr[$i]->iconArrLen(); $j++) : ?>
              <div class="img">
                <img src="<?php echo $fullArr[$i]->iconArr[$j]; ?>">
              </div>
            <?php endfor; ?>
          </div>

          <div class="service">
            <?php echo $fullArr[$i]->service; ?>
          </div>

          <button><a href="<?php echo $fullArr[$i]->alias; ?>">Explore More</a></button>
        </div>
      </div>
    <?php endif; ?>
  <?php endfor; ?>
</body>

</html>