function find(query_text){
	const find_url = 'https://imdb146.p.rapidapi.com/v1/find/?query='+query_text;
	const options = {
		method: 'GET',
		headers: {
			'x-rapidapi-key': '5ab8e342c4msh73054318ae8c6a4p12d0aajsn5ccf71dabf99',
			'x-rapidapi-host': 'imdb146.p.rapidapi.com'
		}
	};

	fetch(find_url, options)
	.then(response=>response.json())
	.then(data => {
	console.log('Response data:', data);
	const list= data.titleResults.results; 
	
	var movies = document.querySelector('.movies');
	movies.innerHTML = "";

	list.map((item)=>{
		const name= item.titleNameText;
		const poster= item.titlePosterImageModel.url;
		//makes button for each found movie
		const movie= `<li><button id="${item.id}" class="movieclass"> <img src="${poster}"> <h2>${name}</h2> </button></li>`;
		movies.innerHTML+=movie;
	})
	})
	.catch(err => {
		console.log(err);
	});
}

async function get_info(id) {  
    // Title details URL
    var title_url = "https://imdb146.p.rapidapi.com/v1/title/?id=" + id;
    const options = {
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': '5ab8e342c4msh73054318ae8c6a4p12d0aajsn5ccf71dabf99',
            'X-RapidAPI-Host': 'imdb146.p.rapidapi.com'
        }
    };

    var genre;
    var releaseYear;
    var caption;
    var director_names = [];
    var writer_names = [];
	var video;

    try {
        const response = await fetch(title_url, options);
        const data = await response.json();
        console.log('Response data:', data);

        // Extract genre
        genre = data.genres.genres.map(item => item.text);

        // Extract release year
        releaseYear = data.releaseYear.year;

        // Extract caption
        caption = data.plot.plotText.plainText;

		// Extract video
		video_url="https://imdb146.p.rapidapi.com/v1/video/?id="+data.videoStrip.edges[0].node.id;
		try {
			const response = await fetch(video_url, options);
			const data = await response.json();
			video=data.playbackURLs;
		}
		catch (error) {
			console.error('Error fetching data:', error);
		};

        // Extract directors
        const directors = data.directors;
        directors.forEach((item) => {
            item.credits.forEach((credit) => {
                let director_name = credit.name.nameText.text;
                director_names.push(director_name);
            });
        });

        // Extract writers
        const writers = data.writers;
        writers.forEach((item) => {
            item.credits.forEach((credit) => {
                let writer_name = credit.name.nameText.text;
                writer_names.push(writer_name);
            });
        });
    } catch (error) {
        console.error('Error fetching data:', error);
    }

    // Create the data object
    var data = {
        "video": video,
        "genre": genre,
        "releaseYear": releaseYear,
        "caption": caption,
        "director_names": director_names,
        "writer_names": writer_names
    };

    return data;
}

function send_data(button_id, poster, name){
	console.log(button_id);
	var start_data={
		"buttonId": button_id,
		"poster": poster, 
		"name": name,
	}

	get_info(button_id).then(more_data => {
		const data = Object.assign({}, start_data, more_data);
		console.log('Final data:', data);

	
	fetch('movie_page_creator.php', {
	    method: 'POST',
	    headers: {
	        'Content-Type': 'application/x-www-form-urlencoded'
	    },
	    body: JSON.stringify(data)
	})
	.then(response => response.text())
	.then(data => {
	    // Handle response from PHP script

	    //Opens file
	    window.location.href = 'movies/' + button_id + '.html';
	})
	.catch(error => {
	    console.error('Error:', error);
	});  
});  
}