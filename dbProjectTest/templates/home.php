<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 3. Include the following <meta> tags in the <head> section of this index.html --> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 

    <meta name="author" content="define author of the page">
    <meta name="description" content="home page for app, CS4750 at UVA">
    <meta name="keywords" content="define keywords for search engines">


    <!-- 2. include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 
    Bootstrap is designed to be responsive to mobile.
    Mobile-first styles are part of the core framework.

    width=device-width sets the width of the page to follow the screen-width
    initial-scale=1 sets the initial zoom level when the page is first loaded   
    -->
      
    <title>Home</title>

    <!-- 3. link bootstrap -->
    <!-- if you choose to use CDN for CSS bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
    <link href="styles/main.css" rel="stylesheet"> 
    <!-- 
    Use a link tag to link an external resource. A rel (relationship) specifies relationship between the current document and the linked resource. 
    -->
    
    <!-- For development, we may want a better-printed CSS, but with larger download size.  Ignore "min"
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.css" rel="stylesheet"> 
    -->
    <!-- if you choose to download bootstrap and host it locally -->
    <!-- <link rel="stylesheet" href="path-to-your-file/bootstrap.min.css" /> --> 
    
    <!-- include your CSS
        by including your CSS last, anything you write may override (depending on specificity) the Bootstrap CSS
    <link rel="stylesheet" href="your-custom.css" /> 
    -->
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
                  <a class="nav-link text-dark btn btn-danger" href="?command=logout">Logout</a>
              </li>
          </ul>
      </div>

      <!-- Searchbar -->
      <!--<form id="form">
          <input
              type="text"
              id="search"
              placeholder="Searchbar"
              class="search"
          />
      </form>-->
      <div class="d-flex flex-start mx-4">
      <input
              type="text"
              id="search"
              placeholder="Searchbar"
              class="search mx-2"
          />
      <button id="searchButton">Search</button>
    </div>
    </nav>

    <!-- Media heading -->
    <div class="media justify-content-center">
        <div class="media-body">
            <h3 class="mt-0" style="text-align: center;">Hello <?=$user["username"]?>!</h3>
            <h4 class="mt-0" style="text-align: center;">Welcome to FavoriteFoodies</h4>
        </div>
        <img class="mr-3 img-fluid img-responsive center-block d-block mx-auto" 
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ11PiZaa5CEa4xTC3yYqCWR_GNtVArU7_ruh5sViBUb6y5p8unqM_rtwQjyP1FizulePg&usqp=CAU" 
          height=100 width = 500 alt="media heading">
    </div>
  
    <!-- Accordion with Info -->
    <div class="accordion my-3" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" 
            aria-controls="collapseOne">
            Brief Statement
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <strong>Welcome to FavoriteFoodies.</strong> This website allows [enter desc here]!
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" 
            aria-controls="collapseTwo">
            How-To: About this Website
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
              <ul>
                  <li>enter instructions here</li>
              </ul>
              <strong>We hope you enjoy your foodie experience!</strong>
          </div>
        </div>
      </div>
    </div>

      <br>
      <br>

    <!--Filter Buttons-->
    <div class="justify-content: center;">
      
    </div>

    <!-- this div is for the list of foods (layed out in a grid format?)-->
    <div id="content" class="row mx-3">
      <template id='recipeCardTemplate'>
      <div class="col-md-4 col-sm-6 col-lg-3 my-2">
          <div class="p-2 card m-1 bg-dark text-light recipeCard">
            <img
              class="card-img-top"
              src="{{image}}"
            />
            <div class="card-body text-center">
              <h5 class="card-title">{{title}}</h5>
              <hr class="bg-light"/>
              <button
                data-id="{{id}}"
                class="btn bg-light btn-sm mb-3 mt-2 w-big view-info"
              >
                View Recipe
            </button>
            </div class="d-flex justify-content-end">
              <svg xmlns="http://www.w3.org/2000/svg"
                  data-id="favorite_{{id}}"
                  type="button" 
                  width="16" 
                  height="16" 
                  fill="white" 
                  class="bi bi-heart-fill favorite" 
                  viewBox="0 0 16 16">
                  <path fill-rule="evenodd" 
                        d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
                  />
              </svg>
          </div>
      </div>
      </template>
  </div>

        <!-- This is where the modal code goes (might need to use templates here too) -->
        <div class="modal hide" id="myModal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content" id="innerModalContent">
              <template id='recipeInfoTemplate'>
              <div class="modal-header">
                <h4 class="modal-title">{{title}}</h4>
                <button type="button" class="btn-close close-modal"></button>
              </div>

              <div class="modal-body">
                {{summary}}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger close-modal">Close</button>
              </div>
              </template>
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
    <!-- 4. include bootstrap Javascript-->
    <script src="scriptMod.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>