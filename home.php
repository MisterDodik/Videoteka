<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="home/allM_style.css">
        <link rel="stylesheet" href="home/topM_style.css">

    </head>

    <body>        
        <form id="searchForm">
            <input id="search" type="text" name="search" placeholder="Search..">
        </form>

        <div class="movies"> 
        </div>

        <div id="listingTable"></div>
        <a href="javascript:prevPage()" id="btn_prev">Prev</a>
        <div class="pagination"></div>
        <a href="javascript:nextPage()" id="btn_next">Next</a>


        <script src="home/script_topmovies.js"></script>
            
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const form = document.getElementById("searchForm");
                form.addEventListener("submit", function(event) {
                    event.preventDefault(); 
                    find(document.getElementById("search").value);
                    //pusiga(document.getElementById("search").value);
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