<?php 
session_start();

$host = empty($_POST['host']) ? $_SESSION['host'] : $_POST['host'];
$username = empty($_POST['username']) ? $_SESSION['username'] : $_POST['username'];
$password = empty($_POST['password']) ? $_SESSION['password'] : $_POST['password'];
$database = empty($_POST['database']) ? $_SESSION['database'] : $_POST['database'];
$port = empty($_POST['port']) ? $_SESSION['port'] : $_POST['port'];

$_SESSION['host'] = $host;
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['database'] = $database;
$_SESSION['port'] = $port;

$mysqli = new mysqli($host,$username,$password,$database,$port);

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>