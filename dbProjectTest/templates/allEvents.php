<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 

    <meta name="author" content="Sara Liu">
    <meta name="description" content="home page for app, CS4750 at UVA">
    <meta name="keywords" content="food events">

    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <title>All Events</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
    <link href="styles/main.css" rel="stylesheet">  
    
    <link rel="stylesheet" href="styles/tables.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-custom border-bottom-0 bg-dark text-light">
      <a class="navbar-brand mb-0 h1" href="home.html" aria-label="home"></a>
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ11PiZaa5CEa4xTC3yYqCWR_GNtVArU7_ruh5sViBUb6y5p8unqM_rtwQjyP1FizulePg&usqp=CAU" 
      style="width:3%" alt="nav img">
      <nav class="navbar navbar-dark navbar-custom border-bottom-0">
          <a class="navbar-brand mb-0 h1" href="?command=homePage" aria-label="home"></a>
          <a class="navbar-brand mb-0 h1" href="?command=homePage" aria-label="home">FavoriteFoodies</a> 
      </nav>
      <div class="navbar-collapse">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                  <a class="nav-link btn btn-default text-light" href="?command=homePage">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link btn btn-default text-light" href="?command=seeReviews">See Reviews</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link btn btn-default text-light" href="?command=editInfo">Edit/Update User Info</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link btn btn-default text-light" href="?command=allEvents">All Events</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link btn btn-default text-light" href="?command=myEvents">My Events</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link btn btn-danger text-light" href="?command=logout">Logout</a>
              </li>
          </ul>
      </div>
    </nav>

    <div id="page-container" class="container">
    <div class="media justify-content-center">
        <div class="media-body text-center">
            <h2 class="m-4">All Events</h2>
        </div>
    </div>

    <!-- <button id="rsvpButton" class="btn bg-success btn-sm mb-3 mt-2 w-big" style="background-color:green; border-color:blue">Yes, I want to go!</button> -->

    <?php
        // echo '<table border="0" cellspacing="2" cellpadding="2"> 
        //         <tr> 
        //             <td> <font face="Arial">Title</font> </td> 
        //             <td> <font face="Arial">Date</font> </td> 
        //             <td> <font face="Arial">Venue</font> </td> 
        //             <td> <font face="Arial">Description</font> </td> 
        //         </tr>';
        // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        // echo "in php of allEvents.php<br></br>";
        // $db = include("../classes/connect-db.php");
        $db = include("connect-db-for-templates.php");
        // echo "connected database<br></br>";
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        session_start();
        // echo "session started<br></br>";
        // $query = "CREATE PROCEDURE SelectAllEvents AS SELECT * FROM event GO; EXEC SelectAllEvents; CALL SelectAllEvents();";
        // $query = "SELECT * from event;";
        // $queryEvents = "CALL SelectAllEvents();";
        // $queryRSVP = "SELECT * from rsvp WHERE username='" . $user["username"] . "';";
        // $query = $queryEvents . " " . $queryRSVP;
        $query = "CALL SelectAllEvents();";
        // echo $query . "</br>";
        // echo "query written<br></br>";
        // echo $db;
        // echo "db echoed<br></br>";
        $statement =  $db->prepare($query);
        // echo $db->error;
        // echo "statement prepared<br></br>";
        $statement->execute();
        // $statement->debugDumpParams();
        // $result = $db->query($query);
        $resultEvents = $statement->fetchAll();
        // echo $result;
        echo "<div id=\"content-wrap\">";
        echo "<table border=\"0\" cellspacing=\"2\" cellpadding=\"2\"> 
                <tr> 
                    <td> <font face=\"Arial\">Title</font> </td> 
                    <td> <font face=\"Arial\">Date</font> </td> 
                    <td> <font face=\"Arial\">Venue</font> </td> 
                    <td> <font face=\"Arial\">Description</font> </td> 
                    <td> <font face=\"Arial\">RSVP</font> </td>
                </tr>";

        // $queryRSVP = "SELECT * from rsvp WHERE username='" . $user["username"] . "';";
        // echo $queryRSVP . "</br>";
        // $statementRSVP = $db->prepare($queryRSVP);
        // $statementRSVP->debugDumpParams();
        // echo "rsvp statement prepared</br>";
        // $statementRSVP->execute();
        // echo "rsvp statement executed</br>";
        // $resultRSVP = $statementRSVP->fetchAll();
        // echo $resultRSVP;

        $query = "SELECT * from rsvp WHERE username='" . $user["username"] . "';";
        // echo $query . "</br>";
        $statement = $db->prepare($query);
        // $statement->debugDumpParams();
        // echo "rsvp statement prepared</br>";
        $statement->execute();
        // echo "rsvp statement executed</br>";
        $result = $statement->fetchAll();
        // echo $result;
        // echo $result[0][0];
        // echo $result[0][1];
        // while($row = mysql_fetch_array($result)) {
        //     echo "in while loop";
        //     echo $row['column_name']; // Print a single column data
        //     echo print_r($row);       // Print the entire row data
        // }
        // foreach($result as $row) {
        //     echo "in for loop</br>";
        //     echo $row['column_name'] . "</br>"; // Print a single column data
        //     echo "printing entire row below</br>";
        //     echo print_r($row) . "</br>";       // Print the entire row data
        // }
        $myEvents = array();
        foreach($result as $row) {
            // echo $row[1];
            array_push($myEvents, $row[1]);
        }
        // echo "outside foreach";
        // echo print_r($myEvents);

        foreach($resultEvents as $row) {
            // echo $row[0];
            // echo "<b><h3>$row[0]</h3></b><br/>";
            // echo "<h4>Date: $row[1]</h4><br/>";
            $title = $row[0];
            $date = $row[1];
            $venue = $row[2];
            $description = "None";
            // echo "\$row[4]" . $row[4];
            // echo "\$row[5]" . $row[5];
            if(!empty($row[3])) {
                $description = $row[3];
            }
            $going = false;
            if(in_array($row[0], $myEvents)) {
                $going = true;
            }
            if($going) {
                echo "<tr>
                    <td>$title</td>
                    <td>$date</td>
                    <td>$venue</td>
                    <td>$description</td>
                    <td>
                        <input type=\"submit\" value=\"Yes, I want to go!\" disabled class=\"btn bg-light btn-sm mb-3 mt-2 w-big\" style=\"border-color:blue\"/>
                    </td>
                </tr>";
            }
            else {
                // echo "<tr>
                //     <td>$title</td>
                //     <td>$date</td>
                //     <td>$venue</td>
                //     <td>$description</td>
                //     <td>
                //         <button id=\"rsvpButton\" name=\"$title\" class=\"btn bg-success btn-sm mb-3 mt-2 w-big\" style=\"background-color:green; border-color:blue\">Yes, I want to go!</button>
                //     </td>
                // </tr>";
                // echo '<tr>
                //     <td>$title</td>
                //     <td>$date</td>
                //     <td>$venue</td>
                //     <td>$description</td>
                //     <td>
                //         <button id="rsvpButton" name=$title class="btn bg-success btn-sm mb-3 mt-2 w-big" style="background-color:green; border-color:blue">Yes, I want to go!</button>
                //     </td>
                // </tr>';
                echo "<tr>
                    <td>$title</td>
                    <td>$date</td>
                    <td>$venue</td>
                    <td>$description</td>
                    <td>
                        <button id='rsvpButton' name='$title' class='btn bg-success btn-sm mb-3 mt-2 w-big' style='background-color:green; border-color:blue'>Yes, I want to go!</button>
                    </td>
                </tr>";
            }
            
        // } catch(PDOException $e) {
        //     echo "Error: " . $e->getMessage();
        // }

        // $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
        // echo "setFetchMode done<br></br>";
        // $fetchAll = $statement->fetchAll();
        // echo $fetchAll . "<br></br>";
        // foreach(new TableRows(new RecursiveArrayIterator($statement->fetchAll())) as $k=>$v) {
        //     echo $v;
        // } catch(PDOException $e) {
        //     echo "Error: " . $e->getMessage();
        // }
        // echo "</table>";

        // $result = $statement->get_result();
        // echo $result;
        // while($row = $result->fetch_assoc()) {
        //     echo $row;
        }
        // $result->free();
        echo "</table></div>";

        echo "<center>
                <footer id=\"footer\" class=\"primaryFooter containerClass\">
                <small class=\"copyrightClass\">
                    &copy; 2022 Copyright:
                    <a class=\"text-reset fw-bold\" >Sneha Iyer, Medha Boddu, Sara Liu, Neha Bagalkot, CS 4750 UVA</a>
                </small>
                </footer>
            </center>";
    ?>

    <!-- <center>
        <footer id="footer" class="primaryFooter containerClass">
        <small class="copyrightClass">
            &copy; 2022 Copyright:
            <a class="text-reset fw-bold" >Sneha Iyer, Medha Boddu, Sara Liu, Neha Bagalkot, CS 4750 UVA</a>
        </small>
        </footer>
    </center>     -->
    </div>
    <script type="module" src="scriptMod.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
