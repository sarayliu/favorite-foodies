<!DOCTYPE html>
<html>

<head>
	<title>Insert Event</title>
</head>

<body>
	<center>
		<?php
            $db = include("connect-db-for-templates.php");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            session_start();
		
            // Taking all 5 values from the form data (input)
            $title = $_REQUEST['title']; // a
            $date = $_REQUEST['date']; // b
            $venue = $_REQUEST['venue']; // c
            $city = $_REQUEST['city']; // d
            $description = $_REQUEST['description']; // e

            $query = "INSERT INTO event VALUES (:a, :b, :c, :e)";
            $statement = $db->prepare($query);
            // $successful = false;
            // $errorStatement = "";
            try {
                $statement->bindValue(':a', $title);
                $statement->bindValue(':b', $date);
                $statement->bindValue(':c', $venue);
                $statement->bindValue(':e', $description);
                $statement->execute();
                // $statement->debugDumpParams();
                // $result = $statement->fetchAll();
                echo "<h1>Your event has been stored in the database successfully!</h1>";
                echo "<h2><a href = 'https://www.cs.virginia.edu/~syl5fr/favorite-foodies/dbProjectTest/?command=allEvents'>Go see your event in the All Events page here</a></h2>";
                // $successful = true;
            } catch(Exception $e) {
                $errorStatement = $e->getMessage();
                // echo $errorStatement;
                // if (str_contains('abc', '')) { // errors, maybe php is not installed on the server
                //     echo "Checking the existence of the empty string will always return true";
                // }
                // if(str_contains($errorStatement, 'Duplicate entry')) {
                if(strpos($errorStatement, 'Duplicate entry') !== false) {
                    echo "An event with this title already exists! Please come up with a new title.";
                }
                else {
                    echo "Error: " . $errorStatement;
                }
                echo "<h2><a href = 'https://www.cs.virginia.edu/~syl5fr/favorite-foodies/dbProjectTest/?command=createEvents'>Go back to the Create Events page here</a></h2>";
                // echo "Error: " . $e;
                // echo "Error creating event";
                // echo $e->getMessage();
            }
		?>
	</center>
</body>

</html>
