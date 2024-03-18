<?php
/**
 * Class fetch to fetch the data from API.
 * 
 */
class demo {
  /**
   * Storing title.
   *
   * @var string
   */
  public $title;
  /**
   * Storing service section.
   *
   * @var string
   */
  public $service;
  /**
   * Storing image url.
   *
   * @var string
   */
  public $image;
  /**
   * Storing alias.
   *
   * @var string
   */
  public $alias;
  /**
   * Storing icons in array format.
   *
   * @var array
   */
  public $iconArr = [];
  public function __construct($title, $service, $image, $alias, $iconArr)
  {
    $this->title = $title;
    $this->service = $service;
    $this->image = $image;
    $this->alias = $alias;
    $this->iconArr = $iconArr;
  }
  /**
   * iconArrLen function to count the number of icons which will be stored in 
   * array format.
   *
   * @return integer
   */
  function iconArrLen() {
    return count($this->iconArr);
  }
}
?>

