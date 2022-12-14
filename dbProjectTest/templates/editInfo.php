<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">  

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="define author of the page">
        <meta name="description" content="Edit Info Page">  

        <title>FavoriteFoodies</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
        <!-- <link rel="stylesheet" href="styles/main.css"> -->

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
                    <!-- <a class="nav-link text-dark" href="home.html"> Home </a> --> 
                    <a class="nav-link btn btn-default text-light" href="?command=homePage">Home</a>

                </li>
                <li class="nav-item">
                  <a class="nav-link btn btn-default text-light" href="?command=seeFavorites">See Favorites</a>
                </li>
                
                <li class="nav-item">
                    <!-- <a class="nav-link text-dark" href="seeReviews.php"> See Reviews </a> -->
                    <a class="nav-link btn btn-default text-light" href="?command=seeReviews">See Reviews</a>

                </li>
                <li class="nav-item">
                        <!-- <a class="nav-link text-dark" href="seeReviews.php"> See Reviews </a> -->
                        <a class="nav-link btn btn-default text-light" href="?command=enterReview">Enter Review</a>
                    </li>
                <li class="nav-item">
                    <!-- <a class="nav-link text-dark" href="editInfo.html"> Edit Information </a> -->
                    <a class="nav-link btn btn-default text-light" href="?command=editInfo">Edit/Update User Info</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-default text-light" href="?command=allEvents">All Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-default text-light" href="?command=myEvents">My Events</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn btn-default text-light" href="?command=createEvents">Create Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-light" href="?command=logout">Logout</a>
                </li>
            </ul>
        </div>
        </nav>
<center>
        <div class="container w-50">

         <div class="media justify-content-center">
        <div class="media-body text-center">
            <h2 class="m-4">Edit User Information</h2>
        </div>
    </div>
              
                <form name="form3" id="form3" action="?command=homePage" method="post">
                    <div class="form-group">
                    <div class="mb-3 mt-3">

                        <label for="password" class="form-label">Edit Password:</label>
                        <input type="text" name="password" id="password" class="form-control" required>
                    </div>
                    </div>
                              

                        <input type="submit" class="btn btn-primary" name="Submit" id="Submit" value="Submit">
                </form>
                </div>
</center>
<br>
        <center>
        <footer class="primaryFooter containerClass"> <!-- class="text-center bg-light text-muted p-1 fixed-bottom mt-5"> -->
            <small class="copyrightClass">
                &copy; 2022 Copyright:
            <a class="text-reset fw-bold" >Sneha Iyer, Medha Boddu, Sara Liu, Neha Bagalkot, CS 4750 UVA</a>
            </small>
        </footer>
        </center>

        <!-- jquery script -->
        <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
        <script type="text/javascript">
            
            //arrow function
            checkEqual = (val) => "" == val;

            //jquery used here for form validation dynamic behavior
            //anonymous function used here too
            $("#form3").submit(function(){
                var valid = true;

                //second condition
                if (checkEqual(document.form3.username.value)) {
                    alert('Failure, please enter a username')
                    valid = false;
                }
                else{
                    alert("Success!")
                }
                //check whether form should submit
                if(!valid){
                    //Suppress form submit
                    return false;
                }else{
                    return true;
                }
            });

        </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>