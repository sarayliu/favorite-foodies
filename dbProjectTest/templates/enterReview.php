<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">  

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="define author of the page">
        <meta name="description" content="Review Page">  

        <title>FavoriteFoodies</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
        <link rel="stylesheet" href="styles/main.css">

        
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-sm navbar-custom border-bottom-0">
            <a class="navbar-brand mb-0 h1" href="home.html" aria-label="home"></a>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ11PiZaa5CEa4xTC3yYqCWR_GNtVArU7_ruh5sViBUb6y5p8unqM_rtwQjyP1FizulePg&usqp=CAU" 
            style="width:3%" alt="nav img">
            <nav class="navbar navbar-dark navbar-custom border-bottom-0">
                <a class="navbar-brand mb-0 h1" href="home.html" aria-label="home"></a>
                <a class="navbar-brand mb-0 h1" href="home.html" aria-label="home" style="color: black;">FavoriteFoodies</a> 
            </nav>
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <!-- <a class="nav-link text-dark" href="home.html"> Home </a> --> 
                        <a class="nav-link text-dark btn btn-default" href="?command=homePage">Home</a>

                    </li>
                   
                    <li class="nav-item">
                        <!-- <a class="nav-link text-dark" href="seeReviews.php"> See Reviews </a> -->
                        <a class="nav-link text-dark btn btn-default" href="?command=seeReviews">See Reviews</a>

                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link text-dark" href="editInfo.html"> Edit Information </a> -->
                        <a class="nav-link text-dark btn btn-default" href="?command=editInfo">Edit/Update User Info</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-default text-light" href="?command=allEvents">All Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-default text-light" href="?command=myEvents">My Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark btn btn-danger" href="?command=logout">Logout</a>
                    </li>
                </ul>
            </div>

            <!-- Searchbar -->
            <form id="form">
                <input
                    type="text"
                    id="search"
                    placeholder="Searchbar"
                    class="search"
                />
            </form>
        </nav>


        <div class="container" style="margin-top: 15px;">
            <div class="row col-xs-8">
                <h1>CS 4750 Project -- Entering a Review</h1>
                <h3>Hello <?=$user["username"]?>! Email: <?=$user["email"]?></h3>
            </div>
            <div class="row">
                <div class="col-xs-8 mx-auto">
               
                <!-- form to create new review -->
                <form name="form2" id="form2" action="?command=seeReviews" method="post"> <!-- onsubmit="return(checkForm())"> -->
                    <label for="url">Url of Food/Dish </label>
                    <input type="text" name="url" id="url">
                    <p>
                        <label for="comment">Comment</label>
                        <!--<input type="text" name="comment" id="comment"> -->
                        <textarea id="comment" name="comment" rows="4" cols="50">   </textarea>
                    </p>
        
                    <p>&nbsp;</p>
                    <p>
                        <input type="submit" name="Submit" id="Submit" value="Submit">
                    </p>
                </form>
                </div>
            </div>
        </div>

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

            // !! instead of getting url by user input thru a form maybe we can get url from session using api? --> TODO: Check this
            // data = (sessionStorage.getItem('url')); 
            // document.getElementById("url").value = data;

            //jquery used here for form validation dynamic behavior
            //anonymous function used here too
            $("#form2").submit(function(){
                var valid = true;
                //form condition
                if (document.form2.comment.value.length < 6) {
                    alert('Review comment should be more than 5 characters long, please.')
                    valid = false;
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

        <script src="script.js" defer></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>