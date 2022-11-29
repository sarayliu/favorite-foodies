<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- 3. Include the following <meta> tags in the <head> section of this index.html --> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <meta name="author" content="define author of the page">
        <meta name="description" content="login for project, CS4750 at UVA">
        <meta name="keywords" content="define keywords for search engines">


        <!-- 2. include meta tag to ensure proper rendering and touch zooming -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FavoriteFoodies Login</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 

        <link rel="stylesheet" href="styles/main.css">

    </head>

    <body>
        
        <div class="container" style="margin-top: 15px;">
            <!--
            <div class="row col-xs-8">
            </div>
            -->

            <!-- card with image -->    
            <div class="card mx-auto mt-5" style="width: 35rem;">
                <img class="card-img-top" src="https://d18mqtxkrsjgmh.cloudfront.net/public/styles/header_image/public/2021-03/Eating%20More%20Ultraprocessed%20%E2%80%98Junk%E2%80%99%20Food%20Linked%20to%20Higher%20CVD%20Risk.jpeg?itok=zmNGCySB" alt="loginImg" id="imgClick" onclick="anotherImg()">
                <div class="card-body">
                    <h4 class="card-title text-center">FavoriteFoodies</h4>
                    <h6 class="card-subtitle mb-1 text-muted text-center">Brought to you by Sneha Iyer, Medha Boddu, Sara Liu, Neha Bagalkot</h6>
                    <p class="card-text text-center">
                        Welcome to the FavoriteFoodies App! 
                        This application is for food lovers to view, comment, and interact with foods and other foodies. 
                        To get started, enter your email, username, and password!
                    </p>
                    <!--<div class="text-center"><a class="btn btn-dark" href="home.html" role="button">Login With Google</a></div>-->
                </div>
            </div>
        
            <div class="row justify-content-center">
                <div class="col-4">
                
                <h6 style="color: red;"><?= $error_msg ?></h6>

                <form action="?command=login" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email"/>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="username" name="username"/>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"/>
                    </div>
                    <div class="text-center">                
                        <button type="submit" class="btn btn-primary">Go To Home Page</button>
                    </div>
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
        
        <script>

            function anotherImg() {
                if (document.getElementById("imgClick").src == "https://d18mqtxkrsjgmh.cloudfront.net/public/styles/header_image/public/2021-03/Eating%20More%20Ultraprocessed%20%E2%80%98Junk%E2%80%99%20Food%20Linked%20to%20Higher%20CVD%20Risk.jpeg?itok=zmNGCySB"){
                    document.getElementById("imgClick").src = "https://images.hindustantimes.com/rf/image_size_960x540/HT/p2/2018/06/02/Pictures/assorted-junk-food_1b488780-6635-11e8-b4a9-2154dcd09999.jpg";
                } else {
                    document.getElementById("imgClick").src = "https://d18mqtxkrsjgmh.cloudfront.net/public/styles/header_image/public/2021-03/Eating%20More%20Ultraprocessed%20%E2%80%98Junk%E2%80%99%20Food%20Linked%20to%20Higher%20CVD%20Risk.jpeg?itok=zmNGCySB";
                }
            }
        </script>
        <!-- 4. include bootstrap Javascript-->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>