const API_KEY = ''; // Insert your API key here
const NUM_RESULTS = 1;
const API_BASE_URL = 'https://api.spoonacular.com/recipes/'
const API_SEARCH_URL = API_BASE_URL + 'complexSearch?apiKey=' + API_KEY + '&number=' + NUM_RESULTS + '&query=';

var $recipes = $('#content');
var $search = $('#search');
var $myModal = $('#innerModalContent');

var recipeCardTemplate = $('#recipeCardTemplate').html();
var recipeInfoTemplate = $('#recipeInfoTemplate').html();

function addRecipe(recipe) {
    $recipes.append(Mustache.render(recipeCardTemplate, recipe));
}

function displayRecipeInfo(recipe_info) {
    console.log("In displayRecipeInfo()");
    $myModal.empty();
    $myModal.append(Mustache.render(recipeInfoTemplate, recipe_info));
    console.log("Finished rendering");
}

$('#searchButton').on('click', function() {

    $.ajax({
        type: 'GET',
        url: API_SEARCH_URL + $search.val(),
        success: function(recipes) {
            $.each(recipes.results, function(i, recipe) {
                $.ajax({
                    type: 'POST',
                    url: 'classes/JsToDb.php',
                    data: {
                        functionname: 'get', 
                        title: recipe.title,
                    },
                    success: function(recipeDbInfo) {
                        var colon = recipeDbInfo.indexOf(":");
                        var nextString = recipeDbInfo.slice(colon+2);
                        var quote = nextString.indexOf('"');
                        var rating = nextString.slice(0,quote);
                        colon = nextString.indexOf(":");
                        var hasfav = nextString.slice(colon+2, colon+3);
                        var fillcolor = "";
                        if(hasfav == "y") {
                            fillcolor = "red";
                        }
                        else {
                            fillcolor = "white";
                        }
                        recipe.rating = parseInt(rating);
                        recipe.fillcolor = fillcolor;
                        addRecipe(recipe);
                    },
                    error: function() {
                        alert('An error occurred while retrieving recipes.');
                    }
                });
            });
        },
        error: function() {
            alert('An error occurred while retrieving recipes.');
        }
    });
});

$('#content').delegate('.view-info', 'click', function() {
    var id = $(this).attr('data-id');
    console.log($('#myModal').css('display'));
    $.ajax({
        type: 'GET',
        url: API_BASE_URL + id + '/information?apiKey=' + API_KEY,
        success: function(recipe_info) {
            $('#myModal').modal('show');
            displayRecipeInfo(recipe_info);
        },
        error: function() {
            alert('An error occurred while displaying the recipe information.');
        }
    })
});

$('#content').delegate('.favorite', 'click', function() {
    var id = $(this).attr('data-id').slice(9);
    var color = $(this).attr('fill');
    if (color === 'red') {
        var fav = "no";
    } else {
        var fav = "yes";
    }
    $.ajax({
        type: 'GET',
        url: API_BASE_URL + id + '/information?apiKey=' + API_KEY,
        success: function(recipe_info) {
            var cuisine = recipe_info['cuisines'][0];
            if(cuisine == "") {
                cuisine = "NULL";
            }
            $.ajax({
                type: 'POST',
                url: 'classes/JsToDb.php',
                data: {
                    functionname: 'add', 
                    url: recipe_info['spoonacularSourceUrl'],
                    food_name: recipe_info['title'],
                    cuisine: cuisine,
                    rating: 0,
                    health_score: recipe_info['healthScore'],
                    image: recipe_info['image'],
                    favorite: fav,
                },
                success: function (obj) {
                    console.log(obj);
                }
            });
        },
        error: function() {
            alert('An error occurred while trying to favorite the item.');
        }
    })
    if (color === 'red') {
        $(this).attr('fill', 'white');
    } else {
        $(this).attr('fill', 'red');
    }
});

$myModal.delegate('.close-modal', 'click', function() {
    console.log("Closing modal");
    $('#myModal').modal('hide');
});