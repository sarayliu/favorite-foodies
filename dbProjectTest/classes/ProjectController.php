
<?php

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
        // echo "you are connected to the database";
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
            case "homePage":
                $this->homePage();
                break;
            case "editInfo":
                $this->editInfo();
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
        if (isset($_POST["email"])) 
        {
            $email = $_POST["email"];
            $thing = $this->validateEmail($email);
            if($thing == true){
                echo "email is valid";
                // $data = $this->db->query("select * from users where email = ?;", $_POST["email"]);
                try{
                    $query = "SELECT * FROM users WHERE email = :email";
                    echo "after query string";
                    $statement =  $this->$db->prepare($query);
                    echo "after prepare";
                    $statement->bindValue(':email', $email);
                    echo "after bind value";
                    $statement->execute();
                    echo "after exec";
                    $result = $statement->fetchAll();
                    $data = $result;
                    echo "after data = result";
                }
                catch (PDOExcption $e){
                    echo $e->getMessage();
                    // if (primary)
                    //     echo "general message";
                    if($statement->rowCount() == 0)
                        echo "Failed to add a friend <br/>";
                }
                catch (Exception $e){
                    echo "in catch exception  " . $e->getMessage();
                }
                echo "after query in controlelr";
                if ($data === false) 
                {
                    echo "dtaa === flase";
                    $error_msg = "Error checking for user";
                } 
                else if (!empty($data)) 
                {
                    echo "!empty(data)";
                    if (password_verify($_POST["password"], $data[0]["password"])) {
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
                    echo "no user found, so insert";
                    // $db = new Database($host, $uname, $pass, $dbname);
                    $query = "INSERT INTO users VALUES (:a, :b, :c)";
                    $statement =  $this->$db->prepare($query);
                    $statement->bindValue(':a', $_POST["username"]);
                    $statement->bindValue(':b', password_hash($_POST["password"], PASSWORD_DEFAULT));
                    $statement->bindValue(':c', $_POST["email"]);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    $insert = $result;
                    echo "after insert";
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

    private function getJSONReview(){
        global $db;
        //Query that returns JSON instead of HTML
        $username = $_SESSION["username"];
        $msg4 = $this->db->query("select username, comment from review where username = ?;", $username);

        // Return JSON only
        header("Content-type: application/json");
        echo json_encode($msg4, JSON_PRETTY_PRINT);
    }

    private function seeReviews() 
    {
        $transac = $this->loadNewReview();

        $email = $_SESSION["email"];
        $username = $_SESSION["username"];

        $msg = $this->db->query("select * from review where username = ?;", $username);
        
        $user = [
            "username" => $_SESSION["username"],
            "email" => $_SESSION["email"],
        ];

        include("templates/seeReviews.php");
    }

    private function loadNewReview() {
       // get the post records
       if (isset($_POST["url"]) and isset($_POST["comment"])) 
       {
            $url = $_POST['url'];
            $comment = $_POST['comment'];

            $username = $_SESSION["username"];

            // database insert SQL code
            $sql = "insert into `review` (`username`, `url`, `comment`) values (?, ?, ?);";

            // insert in database 
            $rs = $this->db->query($sql, $username, $url, $comment);

            if($rs)
            {
                //echo "New Review Had Been Inserted Into Database \n";
                return $rs;
            }
        }

    }

    private function updateUserInfo() {
        // get the post records
        if (isset($_POST["username"])) 
        {
            $username = $_POST['username'];
            $email = $_SESSION["email"];
            setcookie("username", $_POST["username"], time() + 3600);
            $_SESSION["username"] = $_POST["username"];
            
            $rs = $this->db->query("update users set username = ? where email = ?", $username, $email);
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
}