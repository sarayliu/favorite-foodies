// require('dotenv').config();
{/* <script src="dotenv.js"></script>
console.log("in scriptMod"); 
console.log(process.env.SPOONACULAR_API_KEY); */}
// import { spoonacular_api_key } from "./env-variables.js";
// const spoonacular_api_key = require(env-variables.js);
// console.log(spoonacular_api_key);
const API_KEY = '90921f3219034ec79939dba1fb8c4711'; // Insert your API key here
const NUM_RESULTS = 8;
const API_BASE_URL = 'https://api.spoonacular.com/recipes/'
const API_SEARCH_URL = API_BASE_URL + 'complexSearch?apiKey=' + API_KEY + '&number=' + NUM_RESULTS + '&query=';

var $recipes = $('#content');
var $search = $('#search');
var $myModal = $('#innerModalContent');

var recipeCardTemplate = $('#recipeCardTemplate').html();
var recipeInfoTemplate = $('#recipeInfoTemplate').html();

function addRecipe(recipe) {
    $recipes.empty();
    $recipes.append(Mustache.render(recipeCardTemplate, recipe));
}

function parseInstructions(recipe_info) {
  var instructions = recipe_info['instructions'];
  if (!instructions) {
      var source = recipe_info['creditsText'];
      if (!source) {
          instructions = "Sorry, this recipe's instructions are unavailable.";
      } else {
          console.log("In the else block in parseInstructions");
          var sourceUrl = recipe_info['sourceUrl'];
          var hrefElem = "<a href=\"" + sourceUrl + "\" target=\"_blank\">" + source + "</a>.";
          instructions = 'Read the detailed instructions on ' + hrefElem;
      }
  }
  return instructions;
}

function displayRecipeInfo(recipe_info) {
  console.log("in the displayRecipeInfo() function");
  recipe_info.instructions = parseInstructions(recipe_info);
  console.log(recipe_info.instructions);
  $myModal.empty();
  $myModal.append(Mustache.render(recipeInfoTemplate, recipe_info));
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
            $.ajax({
                type: 'POST',
                url: 'classes/JsToDb.php',
                data: {
                    functionname: 'getsize',
                    serving_size: recipe_info['servings'],
                },
                success: function(recipe_fam) {
                    if(recipe_fam == "0") {
                        recipe_info.family = "No";
                    }
                    else {
                        recipe_info.family = "Yes";
                    }
                    $('#myModal').modal('show');
                    displayRecipeInfo(recipe_info);
                },
                error: function() {
                    alert('An error occurred while displaying the recipe information.');
                }
            })
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
            var instructions = recipe_info['instructions'];
            if (instructions == null || instructions == "") {
                var source = recipe_info['creditsText'];
                if (source == null || source == "") {
                    instructions = "Sorry, this recipe's instructions are unavailable.";
                } else {
                    instructions = 'Read the detailed instructions on ' + source;
                }
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
                    instructions: instructions,
                    serving_size: recipe_info['servings'],
                    ingredients: JSON.stringify(recipe_info['extendedIngredients'])
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