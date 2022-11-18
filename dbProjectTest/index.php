<?php
require("connect-db.php");
?>

<?php
session_start();
// https://www.cs.virginia.edu/~syl5fr/favorite-foodies/dbProjectTest/index.php
// https://www.cs.virginia.edu/~syl5fr/favorite-foodies/dbProjectTest/index.php?command=NULL

// Register the autoloader
spl_autoload_register(function($classname) {
    include "classes/$classname.php";
});


// Parse the query string for command
$command = "login";
echo $command;
echo "\n";
echo $_GET['command'];
echo "\n";
if (isset($_GET["command"])) {
    echo "command is set\n";
    $command = $_GET["command"];
}

// If the user's email is not set in the cookies, then it's not
// a valid session (they didn't get here from the login page),
// so send them over to log in first before doing anything else!
if (!isset($_SESSION["email"])) {
    // they need to see the login
    $command = "login";
}

// Instantiate the controller and run
$PC = new ProjectController($command);
$PC->run();
?>