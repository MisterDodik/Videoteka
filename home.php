<html>
    <head>
        <link rel="stylesheet" href="home/allM_style.css">
        <link rel="stylesheet" href="home/topM_style.css">

    </head>

    <body>        
        <form id="searchForm">
            <input id="search" type="text" name="search" placeholder="Search..">
        </form>

        <div class="movies"> 
        <button id="123" class="movieclass"> <img src="home/searchicon.png"> <h2>123</h2> </button></li>
        </div>

        <!-- <iframe src="https://imdb-video.media-imdb.com/vi2557478681/1434659454657-dx9ykf-1564192582976.mp4?Expires=1716843796&Signature=TQqmkDrGO5HPCs0qogQXRkZbfvo03xfvFKfFueyF6GKvXgRbgWrGxJ~lrxwaipm8zfmuohyHhYKpIyFcaDWHdfPgOAr042wwawFbmIXgm0p28AKUvNGKY0dEKc~YlwxkgyVM6ISgq5Kq0rENo17H8ggrn3qc5SW-T-5KpH1BzMGEfKEDOzgFD8yRVHSIZCtN~DVy05hy8lYGo~vQIzSIo2UE2oUrF2KgI0T8WctNI4ynIDpCv0h~x88zQRNitIVM3BXYYe3nzh4TLIKgpbeGMo70qucXMoMkefVOT6kunPrFDPffq1MDCneb3yCZSq6~wNKId7WYRqZtN5Rw~~Yntg__&Key-Pair-Id=APKAIFLZBVQZ24NQH3KA" width="500px" height="500px" frameborder="0"></iframe> -->
        <div id="listingTable"></div>
        <a href="javascript:prevPage()" id="btn_prev">Prev</a>
        <div class="pagination"></div>
        <a href="javascript:nextPage()" id="btn_next">Next</a>

        <script src="home/script_allmovies.js"></script>
        <script src="home/script_topmovies.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const form = document.getElementById("searchForm");
                form.addEventListener("submit", function(event) {
                    event.preventDefault(); 
                    pusiga(document.getElementById("search").value);
                });

                const button = document.getElementsByClassName("movieclass");
                for (var i = 0 ; i < button.length; i++) {
                    button[i].addEventListener('click' , function(event) {
                    var buttonid= button[i].id;    
                    <?php fopen('home/123.html', 'a');
                    ?>
                });
                }
            });
        </script>
    </body>
</html>