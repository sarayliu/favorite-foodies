
<?php

require("PasswordHash.php");

// global $db;
class ProjectController {
    private $command;
    private $db;

    // private $uname = 'ssi3ka'; 
    // private $pass = 'Fall2022';
    // private $host = 'mysql01.cs.virginia.edu';
    // private $dbname = 'ssi3ka';
    // private $dsn = "mysql:host=$host;dbname=$dbname";
    
    public function __construct($command) {
 
        $this->command = $command;
        $this->db = include("connect-db.php");
        // $this->DB = $db;//new Database($host, $uname, $pass, $dbname);
        // $this->db = new Database();
        // echo "you are connected to the database\n";
        // echo $this->db;
        // try {
        //     $db = new PDO($dsn, $username, $password);
        //   } catch (Exception $e) {
        //     echo "error connecting  to the database";
        //     error_log($e->getMessage());
        //     exit('Something weird happened'); //something a user can understand
        //   }
    }

    public function run() {
        // global $db;
        switch($this->command) {
            case "get_jsonObj":
                $this->getJSONReview();
                break;
            case "enterReview":
                $this->enterReview();
                break;
            case "seeReviews":
                $this->seeReviews();
                break;
            case "seeFavorites":
                $this->seeFavorites();
                break;
            case "homePage":
                $this->homePage();
                break;
            case "editInfo":
                $this->editInfo();
                break;
            case "allEvents":
                $this->allEvents();
                break;
            case "myEvents":
                $this->myEvents();
                break;
            case "createEvents":
                $this->createEvents();
                break;
            case "logout":
                $this->destroyCookies();
            case "login":
            default:
                $this->login();
        }
    }

    private function destroyCookies() {
        session_destroy();
    }

    function login() {
        // global $db;
        $error_msg = "";
        if (isset($_POST["email"]) and isset($_POST["username"])) 
        {
            $email = $_POST["email"];
            $uname = $_POST["username"];
            $thing = $this->validateEmail($email);
            if($thing == true){
                // echo "email is valid<br>";
                $hasher = new PasswordHash(8, false);

                // $data = $this->db->query("select * from users where email = ?;", $_POST["email"]);
                try{
                    $query = "SELECT * FROM users WHERE email = :email AND username = :uname";
                    // echo "after query string<br>";
                    // echo $this->db;
                    // echo "after printing db<br>";
                    $statement =  $this->db->prepare($query);
                    // echo "after prepare<br>";
                    $statement->bindValue(':email', $email);
                    $statement->bindValue(':uname', $uname);
                    // echo "after bind value<br>";
                    $statement->execute();
                    // echo "after exec<br>";
                    $result = $statement->fetchAll();
                    $data = $result;
                    // echo "after data = result<br>";
                    // var_dump($data);
                }
                catch (PDOExcption $e){
                    echo $e->getMessage();
                    // if (primary)
                    //     echo "general message";
                    if($statement->rowCount() == 0)
                        echo "Failed to execute query <br/>";
                }
                catch (Exception $e){
                    echo "in catch exception  " . $e->getMessage();
                }
                // echo "after query in controller<br>";
                if ($data === false) 
                {
                    // echo "data === false<br>";
                    $error_msg = "Error checking for user";
                } 
                else if (!empty($data)) 
                {
                    // echo "!empty(data)";
                    if ($hasher->CheckPassword($_POST["password"], $data[0]['password'])) {
                        echo "Inside password verification statement<br>";
                        $_SESSION["username"] = $data[0]["username"]; 
                        setcookie("username", $data[0]["username"], time() + 3600);
                        $_SESSION["email"] = $data[0]["email"];
                        header("Location: ?command=homePage");
                    } else {
                        $error_msg = "Wrong password";
                    }
                } 
                else 
                { // empty, no user found
                    // TODO: input validation
                    //       PHP provides password_hash() and password_verify()
                    //       to provide password verification
                    // echo "no user found, so insert<br>";
                    // $db = new Database($host, $uname, $pass, $dbname);
                    $query = "INSERT INTO users VALUES (:a, :b, :c)";
                    $statement =  $this->db->prepare($query);
                    // echo "after insert query<br>";
                    $statement->bindValue(':a', $_POST["username"]);
                    // echo "after bind a (username) <br>";

                    $statement->bindValue(':b', $hasher->HashPassword($_POST['password']));
                    // echo "after bind b<br>";
                    $statement->bindValue(':c', $_POST["email"]);
                    $statement->execute();
                    // echo "after insert execute<br>";
                    $result = $statement->fetchAll();
                    $insert = $result;
                    // echo "after insert";
                    // $insert = $this->db->query("insert into users (username, email, password) values (?, ?, ?);", $_POST["username"], $_POST["email"], password_hash($_POST["password"], PASSWORD_DEFAULT)); //use hashing for dataase security
                    if ($insert === false) {
                        $error_msg = "Error inserting user";
                    } else {
                        $_SESSION["username"] = $_POST["username"];
                        setcookie("username", $data[0]["username"], time() + 3600);
                        $_SESSION["email"] = $_POST["email"];
                        header("Location: ?command=homePage");
                    }
                }
            }
            else if($this->validateEmail($_POST["email"]) == false){
                $error_msg = "Invalid email format, please try again";
                //echo $error_msg;
            }
        }
        
        include("templates/login.php");
    }

    //function to validate email using regex
    private function validateEmail($email) { 
        $answer = true;
        $pattern = "/[a-zA-Z0-9_+-]?([a-zA-Z0-9_+-]+\.[a-zA-Z0-9_+-]+)?@([a-zA-Z0-9_+-]+\.[a-zA-Z0-9_+-]+)+/";
        //echo "regex match: ". preg_match($regex, $email). "\n";
        if (preg_match($pattern, $email) == 0 ){
            $answer = false;
        }
        return $answer; // Outputs true if match, else false
    }
    

    private function homePage() 
    {
        $newUserInfo = $this->updateUserInfo();

        $username = "";
        if (isset($_COOKIE["username"])){
            $username = $_COOKIE["username"];
        }
        $user = [
            "username" => $_SESSION["username"], //$name,
            "email" => $_SESSION["email"],
        ];

        include("templates/home.php");
    }

    // private function getJSONReview(){
    //     global $db;
    //     //Query that returns JSON instead of HTML
    //     $username = $_SESSION["username"];
    //     $msg4 = $this->db->query("select username, comment from review where username = ?;", $username);

    //     // Return JSON only
    //     header("Content-type: application/json");
    //     echo json_encode($msg4, JSON_PRETTY_PRINT);
    // }

    private function seeReviews() 
    {
        $transac = $this->loadNewReview();
        // echo "after load new review in see reviews\n";
        $email = $_SESSION["email"];
        $username = $_SESSION["username"];

        // $msg = $this->db->query("select * from review where username = ?;", $username);
        $query = "SELECT * FROM review WHERE username = :uname ORDER BY url";
        $statement =  $this->db->prepare($query);
        $statement->bindValue(':uname', $username);
        $statement->execute();
        $result = $statement->fetchAll();
        $msg = $result;
        // echo "after query in see reviews\n";
        // var_dump($msg);
        $user = [
            "username" => $_SESSION["username"],
            "email" => $_SESSION["email"],
        ];

        include("templates/seeReviews.php");
    }

    private function loadNewReview() {
       // get the post records
       if (isset($_POST["url"]) and isset($_POST["comment"]) and isset($_POST["foodname"]) ) 
       {
            // echo "url and comment are set\n";
            $id = $_POST['url'];
            $comment = $_POST['comment'];
            $fname = strtolower($_POST['foodname']); 
            $username = $_SESSION["username"];

            //recontruct url using id and foodname
            $fname = str_replace(" ", "-", $fname);
            $url = 'https://spoonacular.com/recipes/'.$fname.'-'.$id;

            // database insert SQL code
            // $sql = "insert into `review` (`username`, `url`, `comment`) values (?, ?, ?);";

            // insert in database 
            // $rs = $this->db->query($sql, $username, $url, $comment);
            $query = "INSERT INTO review VALUES (:a, :b, :c)";
            $statement =  $this->db->prepare($query);
            $statement->bindValue(':a', $username);
            $statement->bindValue(':b', $url);
            $statement->bindValue(':c', $comment);
            $statement->execute();
            $result = $statement->fetchAll();
            $rs = $result;

            if($rs)
            {
                echo "New Review Had Been Inserted Into Database \n";
                return $rs;
            }
        }
    }

    private function seeFavorites() 
    {
        $email = $_SESSION["email"];
        $username = $_SESSION["username"];

        $query = "SELECT * FROM has_favorite WHERE username = :uname";
        $statement =  $this->db->prepare($query);
        $statement->bindValue(':uname', $username);
        $statement->execute();
        $result = $statement->fetchAll();
        $msg = $result;
        $user = [
            "username" => $_SESSION["username"],
            "email" => $_SESSION["email"],
        ];

        include("templates/seeFavorites.php");
    }

    private function updateUserInfo() {
        // get the post records
        if (isset($_POST["password"])) 
        {
            $hasher = new PasswordHash(8, false);
            $pass = $_POST['password'];
            $email = $_SESSION["email"];
            // setcookie("username", $_POST["username"], time() + 3600);
            // $_SESSION["username"] = $_POST["username"];
            
            // $rs = $this->db->query("update users set username = ? where email = ?", $username, $email);
            $query = "UPDATE users SET password = :a WHERE email = :b";
            $statement =  $this->db->prepare($query);
            $statement->bindValue(':a', $hasher->HashPassword($pass));
            $statement->bindValue(':b', $_SESSION["email"]);
            $statement->execute();
            $result = $statement->fetchAll();
            $rs = $result;
            if($rs)
            {
                //echo "User Information Has Been Updated In Database \n";
                return $rs;
            }
        }
    }

    private function enterReview() {
        $user = [
            "username" => $_SESSION["username"],
            "email" => $_SESSION["email"],
        ];
        
        include("templates/enterReview.php");
    }

    private function editInfo() {
        $user = [
            "username" => $_SESSION["username"],
            "email" => $_SESSION["email"],
        ];
        
        include("templates/editInfo.php");
    }

    private function allEvents() {
        $user = [
            "username" => $_SESSION["username"],
        ];
        include("templates/allEvents.php");
    }

    private function myEvents() {
        $user = [
            "username" => $_SESSION["username"],
        ];
        include("templates/myEvents.php");
    }

    private function createEvents() {
        include("templates/createEvents.php");
    }
}