<?php
  require 'vendor/autoload.php';
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();
  // Storing data from .env file.
  $server = $_ENV['serverName'];
  $user = $_ENV['user'];
  $psw = $_ENV['passWord'];
  $db = $_ENV['db'];
  /**
   * A class to establish database connection and inserting data into database
   */
  class Connection {
    private $conn;
    private $sql;
    private $sql1;
    private $sql2;
    /**
     * Constructor function to initialize the database.
     *
     * @param string $server
     * Storing server name.
     * @param string $user
     * Storing username.
     * @param string $psw
     * Storing password from env file.
     * @param string $db
     * Storing database name from env file.
     */
    function __construct($server, $user, $psw, $db)
    {
      try {
        $this->conn = mysqli_connect($server, $user, $psw, $db);
      }
      catch (Exception $e) {
        die("Connection failed:" . $e);
      }
    }
    /**
     * A function inserts data into our database.
     *
     * @return void
     */
    function insert() {
      $this->sql = "INSERT INTO employee_code_table (employee_code, employee_code_name, employee_domain) 
      VALUES ('" . $_POST['ecode'] . "', '" . $_POST['ecodename'] . "', '" . $_POST['edomain'] . "')";
      $exec = mysqli_query($this->conn,$this->sql);
      
      $this->sql1 = "INSERT INTO employee_salary_table (employee_id, employee_salary, employee_code) 
      VALUES ('" . $_POST['eid'] . "', '" . $_POST['esal'] . "', '" . $_POST['ecode'] . "')";
      $exec1 = mysqli_query($this->conn,$this->sql1);
      
      $this->sql2 = "INSERT INTO employee_details_table (employee_id, employee_first_name,employee_last_name, graduation_percentile) 
      VALUES ('" . $_POST['eid'] . "', '" . $_POST['efname'] . "', '" . $_POST['elname'] . "', '" . $_POST['graduation'] . "')";
      $exec2 = mysqli_query($this->conn,$this->sql2);
      if ($exec == TRUE && $exec1 == TRUE && $exec2 == TRUE) {
        echo "All datas are succesfully inserted";
      }
    }
    /**
     * A function to close database connection.
     *
     * @return void
     */
    function closeDb() {
      $this->conn->close();
    }
  }
  // Creating instance of the Connection class.
  $ob = new Connection($server, $user, $psw, $db);
  // Calling insert function through  object to inserts data.
  $ob->insert();
  // Calling closeDb function through  object to close connection.
  $ob->closeDb();
?>