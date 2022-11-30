<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 

    <meta name="author" content="Sara Liu">
    <meta name="description" content="Create Events page">
    <meta name="keywords" content="create food events">

    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <title>Create Events</title>

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
                  <a class="nav-link btn btn-default text-light" href="?command=seeFavorites">See Favorites</a>
                </li>
              <li class="nav-item">
                  <a class="nav-link btn btn-default text-light" href="?command=seeReviews">See Reviews</a>
              </li>
              <li class="nav-item">
                    <a class="nav-link btn btn-default text-light" href="?command=enterReview">Enter Review</a>
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
                  <a class="nav-link btn btn-default text-light" href="?command=createEvents">Create Events</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link btn btn-danger text-light" href="?command=logout">Logout</a>
              </li>
          </ul>
      </div>
    </nav>

    <div class="container w-50">
    <div class="media justify-content-center">
        <div class="media-body text-center">
            <h2 class="m-4">Create an Event</h2>
            <h4 class="m-4">All fields are required except for the description.</h4>
        </div>
    </div>

    <center>
         <form action="templates/insertEvent.php" method="post" class="my-3">
         <div class="mb-3 mt-3">
               <label for="title" class="form-label">Title*:</label>
               <input type="text" name="title" id="title" maxlength="100" class="form-control" required>
</div>
    
            <div class="mb-3 mt-3">
               <label for="date" class="form-label">Date*:</label>
               <input type="date" name="date" id="date" class="form-control" required>
</div>
             
            <div class="mb-3 mt-3">
               <label for="venue" class="form-label">Venue*:</label>
               <input type="text" name="venue" id="venue" maxlength="100" class="form-control" required>
</div>

            <div class="mb-3 mt-3">
               <label for="city" class="form-label">City*:</label>
               <input type="text" name="city" id="city" maxlength="40" class="form-control" required>
</div>
 
            <div class="mb-3 mt-3">
               <label for="Description" class="form-label">Description (optional):</label>
               <input type="text" name="description" id="description" class="form-control">
</div>
            <input type="submit" value="Submit Event" class="btn btn-primary">
        </form>
        <br>
        <footer class="primaryFooter containerClass">
        <small class="copyrightClass">
            &copy; 2022 Copyright:
            <a class="text-reset fw-bold" >Sneha Iyer, Medha Boddu, Sara Liu, Neha Bagalkot, CS 4750 UVA</a>
        </small>
        </footer>
    </center>
    </div>

    <script type="module" src="scriptMod.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
