<?php
require 'vendor/autoload.php';
class Apicall {
    /**
   * apiCall function to call the api and get the response.
   *
   * @param string $url
   * @return array consists of information related to api.
   */
  function apiCall($url)
  {
    $client = new GuzzleHttp\Client();
    $response = $client->request('GET', $url);
    $data = json_decode($response->getBody(), TRUE);
    return $data;
  }
}
