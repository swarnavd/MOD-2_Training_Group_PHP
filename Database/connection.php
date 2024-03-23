<?php
  require __DIR__ .  '/../vendor/autoload.php';
  /**
   * A class to connect to database.
   */
  class Connection {
    // Declaring instance variable to connect with database.
    public $conn = "";
    /**
     * Constructor function to establish connection with Database.

     */
    function __construct() {
      try {
        $this->conn = new PDO("mysql:host=localhost;dbname=login","root","root");
      }
      catch (Exception $e) {
        die("Connection error:" . $e);
      }
    }

    /**
     * Function to close connection with Database.
     *
     * @return void
     */
    function closeDB()
    {
      $this->conn=null;
    }
  }
