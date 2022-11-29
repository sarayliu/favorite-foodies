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
                  <!-- <a class="nav-link text-dark" href="seeReviews.php"> See Reviews </a> -->
                  <a class="nav-link btn btn-default text-light" href="?command=seeReviews">See Reviews</a>

              </li>
              <li class="nav-item">
                  <!-- <a class="nav-link text-dark" href="editInfo.html"> Edit Information </a> -->
                  <a class="nav-link btn btn-default text-light" href="?command=editInfo">Edit/Update User Info</a>

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

    <!-- Media heading -->
    <div class="container">
    <div class="media justify-content-center">
        <div class="media-body text-center">
            <h2 class="m-4">Hello <?=$user["username"]?>, welcome to <b><mark>FavoriteFoodies</mark></b>!</h2>
        </div>

        <div class="d-flex flex-start my-4">
        <div class="mx-2">
              <img src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?cs=srgb&dl=pexels-ella-olsson-1640777.jpg&fm=jpg" 
                   class="d-block w-100 center-block mx-auto opacity-75 border border-dark"
                   height=300
                   alt="media heading">
            </div>
            <div class="mx-0">
              <img src="https://cdn.vox-cdn.com/thumbor/bif3U7XKUqWpOUv91_fXLfzsIx8=/0x0:6000x4000/1200x675/filters:focal(2520x1520:3480x2480)/cdn.vox-cdn.com/uploads/chorus_image/image/71262429/Le_Fantome.0.jpg" 
                   class="d-block w-100 center-block mx-auto opacity-75 border border-dark" 
                   height=300 
                   alt="media heading">
            </div>
            <div class="mx-2">
              <img src="https://media.istockphoto.com/id/497959594/photo/fresh-cakes.jpg?s=612x612&w=0&k=20&c=T1vp7QPbg6BY3GE-qwg-i_SqVpstyHBMIwnGakdTTek=" 
                   class="d-block w-100 center-block mx-auto opacity-75 border border-dark" 
                   height=300 
                   alt="media heading">
            </div>
        </div>
        
    </div>
  
    <!-- Accordion with Info -->
    <div class="accordion my-3" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" 
            aria-controls="collapseOne">
            Brief Statement
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body bg-light">
            <strong>Welcome to FavoriteFoodies.</strong> This website allows [enter desc here]!
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" 
            aria-controls="collapseTwo">
            How-To: About this Website
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body bg-light">
              <ul>
                  <li>enter instructions here</li>
              </ul>
              <strong>We hope you enjoy your foodie experience!</strong>
          </div>
        </div>
      </div>
    </div>
    <br>
    <!--Filter Buttons-->
    <div class="justify-content: center;">
      
    </div>
    <hr />

    <!-- this div is for the list of foods (layed out in a grid format?)-->
    <div id="content" class="row mx-3 bg-light">
      <template id='recipeCardTemplate'>
      <div class="col-md-4 col-sm-6 col-lg-3 my-2">
          <div class="p-2 card m-1 bg-dark text-light recipeCard">
            <img
              class="card-img-top"
              src="{{image}}"
            />
            <div class="card-body text-center">
              <h5 class="card-title">{{title}}</h5>
              <p class="card-title">ID: {{id}}</p>
              <hr class="bg-light"/>
              <button
                data-id="{{id}}"
                class="btn bg-light btn-sm mb-3 mt-2 w-big view-info"
              >
                View Recipe
            </button>
</div>
            <div class="card-footer row align-items-start">
            <div class="col-2">
              <svg xmlns="http://www.w3.org/2000/svg"
                  data-id="favorite_{{id}}"
                  type="button" 
                  width="16" 
                  height="16" 
                  fill="{{fillcolor}}" 
                  class="bi bi-heart-fill favorite" 
                  viewBox="0 0 16 16"
                  >
                  <path fill-rule="evenodd"
                        d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
                  />
              </svg>
                  </div>
                  <div class="col-6">
                    <p class="text-muted card-title">Rating: {{rating}}</p>
                  </div>
              </div>
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
                <button type="button" class="btn-close close-modal"></button>
              </div>

              <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-bs-toggle="tab" href="#modalBodyOne">Info</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="tab" href="#modalBodyTwo">Review</a>
  </li>
</ul>

<div class="tab-content">
  <div class="tab-pane container active" id="modalBodyOne">
              <div class="modal-body">
                <h3 class="text-center modal-title">{{title}}</h3>
              <div class="small d-flex justify-content-center mt-4">
              <div class="d-flex align-items-center me-3">
              <svg xmlns="http://www.w3.org/2000/svg" 
                   width="16" 
                   height="16" 
                   fill="currentColor" 
                   class="bi bi-people-fill mx-1" 
                   viewBox="0 0 16 16">
                   <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 
                   6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 
                   1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
              </svg>
                <p class="mb-0">{{servings}}</p>
              </div>
              <div class="d-flex align-items-center me-3">
              <svg xmlns="http://www.w3.org/2000/svg" 
                   width="20" 
                   height="20" 
                   fill="currentColor" 
                   class="bi bi-clock-fill mx-1" 
                   viewBox="0 0 16 16">
                   <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 
                   0 0 0 .496-.868L8 8.71V3.5z"/>
              </svg>
                <p class="mb-0">{{readyInMinutes}} min</p>
              </div>
              <div class="d-flex align-items-center me-3">
              <svg xmlns="http://www.w3.org/2000/svg" 
                   width="20" 
                   height="20" 
                   fill="currentColor" 
                   class="bi bi-hand-thumbs-up-fill mx-1" 
                   viewBox="0 0 16 16">
                   <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 
                   2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 
                   1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 
                   .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 
                   1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 
                   16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 
                   14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 
                   1.039-1.639.199-.575.356-1.539.428-2.59z"/>
               </svg>
                <p class="mb-0">{{aggregateLikes}}</p>
              </div>
              </div>

              <hr />
              <h4>Summary</h4>
              <p>{{{summary}}}</p>
              <hr />
              <h4>Ingredients</h4>
                <ul>
                  {{#extendedIngredients}}
                    <li class="my-1">{{original}}</li>
                  {{/extendedIngredients}}
                </ul>
                <hr />
              <h4>Instructions</h4>
              <ol>
                {{#analyzedInstructions}}
                {{#steps}}
                <li class="my-1">{{step}}</li>
                {{/steps}}
                {{/analyzedInstructions}}
              </ol> 
              {{^analyzedInstructions}}
              <p>{{{instructions}}}</p>
              {{/analyzedInstructions}}
              </div>
</div> <!-- End of first pane -->
<div class="tab-pane container fade" id="modalBodyTwo">
              <div class="modal-body">
                <h3 class="text-center modal-title">Create Review</h3>

                <form action="?command=seeReviews" method="POST">
                <input type="hidden" id="url" name="url" value="{{spoonacularSourceUrl}}">
  <div class="mb-3 mt-3">
    <label for="comment" class="form-label">Review:</label>
    <input type="text" class="form-control" id="comment" placeholder="Enter review" name="comment">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</div>

</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger close-modal">Close</button>
              </div>
              </template>
            </div>
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
    <script src="scriptMod2.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>