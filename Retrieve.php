<?php
require 'Apicall.php';
require 'index.php';
/**
 * A class to store all the data from guven link.
 * 
 */
class Retrieve {
    /**
     * Storing all the objects.
     *
     * @var array
     */
    public $fullArr=[];
    /**
     * Declaring object which we will need for creation of object for demo class
     * 
     * @var mixed
     */
    public $obj;
    /** 
     * Declaring variable which we will need for create object for Apicall 
     * class.
     */
    public $api;
    /**
     * A function to store all the data.
     *
     * @return void
     */

    function dataRetrieve() {
      $this->api= new Apicall();
      // Initializing an array to contain all retrieved data.
      // Calling apiCall function to call the api and retrieve data.
      $data = $this->api->apiCall("https://www.innoraft.com/jsonapi/node/services");
      // Declaring domain name to concate it wherever needed.
      $domain = "https://www.innoraft.com";

      for ($i = 0; $i < count($data['data']); $i++) {
        if ($data['data'][$i]['attributes']['field_services']['value'] && $i > 11) {
          $iconArr = [];
          $title = $data['data'][$i]['attributes']['field_secondary_title']['value'];
          $service = $data['data'][$i]['attributes']['field_services']['value'];
          $image = $domain . ($this->api->apiCall($data['data'][$i]['relationships']['field_image']['links']['related']['href'])['data']['attributes']['uri']['url']);
          $alias = $domain . $data['data'][$i]['attributes']['path']['alias'];
          $iconApi1 = $this->api->apiCall($data['data'][$i]['relationships']['field_service_icon']['links']['related']['href']);
          for ($j = 0; $j < count($iconApi1['data']); $j++) {
            $iconApi2 = $this->api->apiCall($iconApi1['data'][$j]['relationships']['field_media_image']['links']['related']['href']);
            $iconImg = $domain . $iconApi2['data']['attributes']['uri']['url'];
            array_push($iconArr, $iconImg);
          }
        $this->obj = new demo($title, $service, $image, $alias, $iconArr);
        array_push($this->fullArr, $this->obj);
        }
      }
    }
}
?>
