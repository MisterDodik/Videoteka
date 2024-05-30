const list = [
{"name":"The Shawshank Redemption","poster":"https://m.media-amazon.com/images/M/MV5BMDFkYTc0MGEtZmNhMC00ZDIzLWFmNTEtODM1ZmRlYWMwMWFmXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_QL75_UX380_CR0,1,380,562_.jpg","year":1994,"rating":"9.3","genre":["Drama"]},
{"name":"The Godfather","poster":"https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_QL75_UY562_CR8,0,380,562_.jpg","year":1972,"rating":"9.2","genre":["Crime","Drama"]},
{"name":"The Dark Knight","poster":"https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_QL75_UX380_CR0,0,380,562_.jpg","year":2008,"rating":"9.0","genre":["Action","Crime","Drama"]},
{"name":"The Godfather Part II","poster":"https://m.media-amazon.com/images/M/MV5BMWMwMGQzZTItY2JlNC00OWZiLWIyMDctNDk2ZDQ2YjRjMWQ0XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_QL75_UY562_CR7,0,380,562_.jpg","year":1974,"rating":"9.0","genre":["Crime","Drama"]},
{"name":"12 Angry Men","poster":"https://m.media-amazon.com/images/M/MV5BMWU4N2FjNzYtNTVkNC00NzQ0LTg0MjAtYTJlMjFhNGUxZDFmXkEyXkFqcGdeQXVyNjc1NTYyMjg@._V1_QL75_UX380_CR0,11,380,562_.jpg","year":1957,"rating":"9.0","genre":["Crime","Drama"]},
{"name":"Schindler's List","poster":"https://m.media-amazon.com/images/M/MV5BNDE4OTMxMTctNmRhYy00NWE2LTg3YzItYTk3M2UwOTU5Njg4XkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_QL75_UX380_CR0,4,380,562_.jpg","year":1993,"rating":"9.0","genre":["Biography","Drama","History"]},
{"name":"The Lord of the Rings: The Return of the King","poster":"https://m.media-amazon.com/images/M/MV5BNzA5ZDNlZWMtM2NhNS00NDJjLTk4NDItYTRmY2EwMWZlMTY3XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_QL75_UX380_CR0,0,380,562_.jpg","year":2003,"rating":"9.0","genre":["Action","Adventure","Drama"]},
{"name":"Pulp Fiction","poster":"https://m.media-amazon.com/images/M/MV5BNGNhMDIzZTUtNTBlZi00MTRlLWFjM2ItYzViMjE3YzI5MjljXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_QL75_UY562_CR3,0,380,562_.jpg","year":1994,"rating":"8.9","genre":["Crime","Drama"]},
{"name":"The Lord of the Rings: The Fellowship of the Ring","poster":"https://m.media-amazon.com/images/M/MV5BN2EyZjM3NzUtNWUzMi00MTgxLWI0NTctMzY4M2VlOTdjZWRiXkEyXkFqcGdeQXVyNDUzOTQ5MjY@._V1_QL75_UX380_CR0,1,380,562_.jpg","year":2001,"rating":"8.8","genre":["Action","Adventure","Drama"]},
{"name":"The Good, the Bad and the Ugly","poster":"https://m.media-amazon.com/images/M/MV5BNjJlYmNkZGItM2NhYy00MjlmLTk5NmQtNjg1NmM2ODU4OTMwXkEyXkFqcGdeQXVyMjUzOTY1NTc@._V1_QL75_UX380_CR0,4,380,562_.jpg","year":1966,"rating":"8.8","genre":["Adventure","Western"]},
{"name":"Forrest Gump","poster":"https://m.media-amazon.com/images/M/MV5BNWIwODRlZTUtY2U3ZS00Yzg1LWJhNzYtMmZiYmEyNmU1NjMzXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_QL75_UY562_CR4,0,380,562_.jpg","year":1994,"rating":"8.8","genre":["Drama","Romance"]},
{"name":"Fight Club","poster":"https://m.media-amazon.com/images/M/MV5BNDIzNDU0YzEtYzE5Ni00ZjlkLTk5ZjgtNjM3NWE4YzA3Nzk3XkEyXkFqcGdeQXVyMjUzOTY1NTc@._V1_QL75_UX380_CR0,1,380,562_.jpg","year":1999,"rating":"8.8","genre":["Drama"]},
{"name":"The Lord of the Rings: The Two Towers","poster":"https://m.media-amazon.com/images/M/MV5BZGMxZTdjZmYtMmE2Ni00ZTdkLWI5NTgtNjlmMjBiNzU2MmI5XkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_QL75_UX380_CR0,14,380,562_.jpg","year":2002,"rating":"8.8","genre":["Action","Adventure","Drama"]},
{"name":"Inception","poster":"https://m.media-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_QL75_UX380_CR0,0,380,562_.jpg","year":2010,"rating":"8.7","genre":["Action","Adventure","Sci-Fi"]}];

var objJson=[];
for(var i=0; i<list.length;i++){
    var item=list[i];
    objJson.push({ name: item.name, poster: item.poster, year: item.year, rating: item.rating, genre: item.genre})
}

document.addEventListener('DOMContentLoaded', function() {
    changePage(1);
    paginate();
});

var current_page = 1;
var records_per_page = 5;



function prevPage()
{
    if (current_page > 1) {
        current_page--;
        changePage(current_page);
    }
}

function nextPage()
{
    if (current_page < numPages()) {
        current_page++;
        changePage(current_page);
    }
}

function changePage(page)
{
    var btn_next = document.getElementById("btn_next");
    var btn_prev = document.getElementById("btn_prev");
    var listing_table = document.getElementById("listingTable");

    // Validate page
    if (page < 1) 
        page = 1;
    
    if (page > numPages()) 
        page = numPages();

    listing_table.innerHTML = "";

    for (var i = (page-1) * records_per_page; i < (page * records_per_page); i++) {
        const movie= `<li> <img src="${objJson[i].poster}"> <h2>${i+1}. ${objJson[i].name}</h2> 
                    <br/><p>${objJson[i].year} &nbsp \u2B50 ${objJson[i].rating} &nbsp ${objJson[i].genre}</p> </li>`;
        listing_table.innerHTML += movie;
    }

    if (page == 1) {
        btn_prev.style.visibility = "hidden";
    } else {
        btn_prev.style.visibility = "visible";
    }

    if (page == numPages()) {
        btn_next.style.visibility = "hidden";
    } else {
        btn_next.style.visibility = "visible";
    }
}
function paginate(){
    for(var i=1; i<numPages()+1; i++){
        console.log("caosdfjasodfjasodfas");

        const number=`<div class="page_container"><a href="javascript:changePage(${i})" id="page_num">${i}</a></div> `;
        document.querySelector('.pagination').innerHTML+=number;
    }
}
function numPages()
{
    return Math.ceil(objJson.length / records_per_page);
}


