<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="home/allM_style.css">
        <link rel="stylesheet" href="home/topM_style.css">

    </head>

    <body>        
        
        <h2>Top 100</h2>
        <div id="listingTable">
            
        </div>
        
        <a href="javascript:prevPage()" id="btn_prev"></a>
        <div class="pagination"></div>
        <a href="javascript:nextPage()" id="btn_next"></a>
        
        
        <br/>
        <br/>
        <br/>
        <script src="home/script_topmovies.js"></script>

        <form id="searchForm">
            <input id="search" type="text" name="search" placeholder="Search...">
            <button></button>
        </form>

        <div class="movies">
             <!--ovo je test samo, obrisi sav innerhtml ovoga  -->
             <!-- <li>
                <div class="image-container">
                    <img src="https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg">
                    <button class="top-right-button">Button</button>
                </div>
                <button id="123" class="movieclass">
                    <h2>The Godfather</h2>
                </button>
            </li> -->
        </div>
        
        <br/>
        <br/>
        <br/>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const form = document.getElementById("searchForm");
                form.addEventListener("submit", function(event) {
                    event.preventDefault(); 
                    find(document.getElementById("search").value);
                });

                document.querySelector('.movies').addEventListener('click', function(event) {
                if (event.target && event.target.closest('.movieclass')) {
                    const button = event.target.closest('.movieclass');
        
                    // Get the button ID
                    const buttonId = button.id;
                    
                    // Get the img src
                    const imgSrc = button.querySelector('img').src;
                    
                    // Get the text between h2 tags
                    const name = button.querySelector('h2').textContent;
                    send_data(buttonId, imgSrc, name);
                }
                });
            });
        </script>
        <script src="home/script_allmovies.js"></script>
    </body>
</html>