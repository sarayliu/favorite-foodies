<?php
    $db = include("connect-db.php");
    session_start();
    $aResult = array();
    $funcName = $_POST['functionname'];
    $url = $_POST['url'];
    $fav = $_POST['favorite'];
    if($_POST['functionname'] == "get") {
        $query = "select rating from food where food_name = :a;";
        $statement =  $db->prepare($query);
        $statement->bindValue(':a', $_POST['title']);
        $statement->execute();
        $result = $statement->fetchAll();
        $rating = 0;
        if(empty($result[0])) {
            $rating = 0;
        }
        else {
            $rating = $result[0][0];
        }
        $aResult['rating'] = $rating;
        $query = "select food_name from has_favorite where food_name = :a and username = :b;";
        $statement =  $db->prepare($query);
        $statement->bindValue(':a', $_POST['title']);
        $statement->bindValue(':b', $_SESSION["username"]);
        $statement->execute();
        $result = $statement->fetchAll();
        if(empty($result[0])) {
            $hasfav = "no";
        }
        else {
            $hasfav = "yes";
        }
        $aResult['hasfav'] = $hasfav;
        echo json_encode($aResult);
    }
    if($funcName == "add") {
        $query = "select food_name from food where url = :url;";
        $statement =  $db->prepare($query);
        $statement->bindValue(':url', $url);
        $statement->execute();
        $result = $statement->fetchAll();
        if(empty($result[0])) {
            $query = "INSERT INTO food VALUES (:a, :b, :c, :d, :e, :f)";
            $statement =  $db->prepare($query);
            $statement->bindValue(':a', $_POST['food_name']);
            $statement->bindValue(':b', $_POST['cuisine']);
            $statement->bindValue(':c', $_POST['rating']);
            $statement->bindValue(':d', $_POST['health_score']);
            $statement->bindValue(':e', $_POST['image']);
            $statement->bindValue(':f', $_POST['url']);
            $statement->execute();
            $result = $statement->fetchAll();
        }
        if($fav == "yes") {
            $query = "INSERT INTO has_favorite VALUES (:a, :b)";
            $statement =  $db->prepare($query);
            $statement->bindValue(':a', $_SESSION["username"]);
            $statement->bindValue(':b', $_POST['food_name']);
            $statement->execute();
            $result = $statement->fetchAll();
            $query = "UPDATE food SET rating = rating + 1 WHERE url = :a";
            $statement =  $db->prepare($query);
            $statement->bindValue(':a', $_POST['url']);
            $statement->execute();
            $result = $statement->fetchAll();
        }
        else {
            $query = "DELETE FROM has_favorite WHERE username=:a AND food_name=:b;";
            $statement =  $db->prepare($query);
            $statement->bindValue(':a', $_SESSION["username"]);
            $statement->bindValue(':b', $_POST['food_name']);
            $statement->execute();
            $result = $statement->fetchAll();
            $query = "UPDATE food SET rating = rating - 1 WHERE url = :a";
            $statement =  $db->prepare($query);
            $statement->bindValue(':a', $_POST['url']);
            $statement->execute();
            $result = $statement->fetchAll();
        }
    }
?>