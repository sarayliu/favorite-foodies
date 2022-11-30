<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">  

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="define author of the page">
        <meta name="description" content="View your reviews page">  

        <title>FavoriteFoodies</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
        <!-- <link rel="stylesheet" href="styles/main.css"> -->

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        
        <style>
            .dark-mode {
            background-color: #A9A9A9; /*#ffffff;*/
            color: white;
            }
        </style>
        
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
                    <a class="nav-link btn btn-default text-light" href="?command=enterReview">Enter a Review</a>
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

        <div class="d-flex flex-start mx-4">
        <input
                type="text"
                id="search"
                placeholder="Searchbar"
                class="search mx-2 form-control"
            />
        <button id="searchButton" class="btn bg-success text-light">Search</button>
        </div>
        </nav>

        <div class="container w-75">
        <div class="media justify-content-center">
        <div class="media-body text-center">
            <h2 class="my-4">Favorites</h2>
        </div>
    </div>
    <center>

      
        <button class="btn btn-primary mb-4 justify-content-center" onclick="darkMode()">Toggle dark/gray mode</button>

        <div id="OverallDiv">

            <!-- <div class="container">
                <div class="row">
                    <h4>Favorite Food: </h4>
                    <p id="jsonObj_text"></p> get favorite food json object and put here 
                </div>
            </div> -->
            
            <div class="container">
                    
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                    <th>#</th>
                                    <th>Food/Dish Name</th>
        </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // if($msg->rowCount > 1)
                                        // {      
                                            $sn=1;
                                            foreach($msg as $data)
                                            {
                                    ?>
                                                <tr class="table-secondary">
                                                <td><?php echo $sn; ?></td>
                                                <td><?php echo $data['food_name']; ?></td>
                                                </tr>
                                    <?php
                                                $sn++;
                                            }
                                        // }
                                        // else{ 
                                    ?>
                                            <!-- <tr>
                                                <td colspan="8">
                                                    <?php echo $msg; ?>
                                                </td>
                                            <tr> -->
                                    <!-- <?php
                                        // }
                                    ?> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                                        </center>
 
        <center>
        <footer class="primaryFooter containerClass"> <!-- class="text-center bg-light text-muted p-1 fixed-bottom mt-5"> -->
            <small class="copyrightClass">
                &copy; 2022 Copyright:
            <a class="text-reset fw-bold" >Sneha Iyer, Medha Boddu, Sara Liu, Neha Bagalkot, CS 4750 UVA</a>
            </small>
        </footer>
        </center>

        <script>
            function darkMode() {
                var element = document.body;
                element.classList.toggle("dark-mode");
            }
            
            // //AJAX
            // var jsonObj = null;
            // var score = 0;
            // // const myObject = null;

            // function getJSON() 
            // {
            //     // instantiate the object
            //     var ajax = new XMLHttpRequest();
            //     // open the request
            //     ajax.open("GET", "?command=get_jsonObj", true);
            //     // ask for a specific response
            //     ajax.responseType = "json";
            //     // send the request
            //     ajax.send(null);
            
            //     // What happens if the load succeeds
            //     ajax.addEventListener("load", function() {
            //         // set question
            //         if (this.status == 200) { // worked 

            //             //Define, instantiate, and use at least one JavaScript object
            //             //reading the JSON query
            //             jsonObj = this.response;
            //             const myObject = { title: jsonObj[0].title, rating: jsonObj[0].rating};

            //             // console.log("ajax worked!")
            //             // console.log("object: ", myObject.title)
            //             document.getElementById("jsonObj_text").innerHTML = myObject.title;

            //             // displayJSONObj();
            //         }
            //     });
            
            //     // What happens on error
            //     ajax.addEventListener("error", function() {
            //         document.getElementById("message").innerHTML = 
            //             "<div class='alert alert-danger'>An Error Occurred</div>";
            //     });
            // }
            // // Method to display a question
            // // function displayJSONObj() {
            // //     // Why innerHTML and not textContent?
            // //     document.getElementById("jsonObj_text").innerHTML = myObject.title;
            // // }

            // // Need to add the initial question load
            // getJSON();

        </script>
        <!-- <script src="script.js" defer></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>