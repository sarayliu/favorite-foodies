// const APIURL = "https://api.themoviedb.org/3/discover/movie?api_key=99e91b6a58a5ae76496412db2d1fd2d9";
// const IMGPATH = "https://image.tmdb.org/t/p/w1280";
// const SEARCHAPI = "https://api.themoviedb.org/3/search/movie?&api_key=99e91b6a58a5ae76496412db2d1fd2d9&query=";

// foodAPIResponse(APIURL);

//------------------------------GET THE FOODS FROM API------------------------------
async function foodAPIResponse(url) {
    const response = await fetch(url);
    const responseData = await response.json();

    if(responseData.total_results < 1){
        alert("No food found with this title/keyword. Try again.")
    }
    displayFoodsInDiv(responseData.results);
}

//------------------------------SEARCH BAR------------------------------
document.getElementById("form").addEventListener("submit", (action) => {
    action.preventDefault();
    foodAPIResponse(SEARCHAPI + document.getElementById("search").value);
    document.getElementById("search").value = "";
    
});


//------------------------------FILTER BUTTONS------------------------------



//------------------------------LISTS THE FOODS IN A DIV, GET DIV FROM INDEX (id = content)------------------------------
const foodContent = document.getElementById("content");

function displayFoodsInDiv(foods) {
    foodContent.innerHTML = "";

    foods.forEach((food) => {
        const {poster_path, title, url} = food;
        const foodElement = document.createElement("div");
        foodElement.classList.add("foodItem"); //CSS formatting, class = movieItem
        // console.log("title: ", {title}.title);
        var title_text = {title}.title;
        

        foodElement.innerHTML = 
            `
            <img src="${IMGPATH + poster_path}" alt="${title}"/>
            <div class="foodItemTitle">
                    <h5>${title}</h5>
            </div>

            <a class="nav-link text-dark btn btn-default" href="?command=enterReview" onClick="sessionStorage.setItem('url', '${url}')">Create A Review</a>
            `;

        foodContent.appendChild(foodElement);
    });
}

