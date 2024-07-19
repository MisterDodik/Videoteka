<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sdaf</title>
</head>
<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postData = file_get_contents("php://input");
            
            // Decode the JSON data
            $data = json_decode($postData, true);
            
            
            $buttonId=$data["buttonId"];
            // Sanitize the button ID to prevent any potential security issues
            $buttonId = preg_replace('/[^a-zA-Z0-9-_]/', '', $buttonId);
            
            // Defi 
            $filePath = "movies/$buttonId.html";
            
            // Create the file if it doesn't exist
            if (!file_exists($filePath)) {
                $fileHandle = fopen($filePath, 'w');
                
                $poster=$data["poster"];
                $name=$data["name"];
                $video=$data["video"];
                $genre=$data["genre"];
                $releaseYear=$data["releaseYear"];
                $caption=$data["caption"];
                $director_names=$data["director_names"];
                $writer_names=$data["writer_names"];
                
                // Convert genre array to a comma-separated string
                $genreList = implode(', ', $genre);
                
                // Convert director_names array to a comma-separated string
                $directorList = implode(', ', $director_names);
                
                // Convert writer_names array to a comma-separated string
                $writerList = implode(', ', $writer_names);
                
                // Extract video
                $videoUrl = null;
                foreach ($video as $item) {
                    if (isset($item['videoDefinition'])){
                        if($item['videoDefinition'] === "DEF_720p") {
                            $videoUrl = $item['url'];
                            break;  
                        }
                        else if($item['videoMimeType']==="MP4"){
                            $videoUrl = $item['url'];
                        }
                    }
                }
                
                $htmlContent = "<!DOCTYPE html>\n
                <html lang='en'>\n
                <head>\n
                <meta charset='UTF-8'>\n
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>\n
                <title>Document for $buttonId</title>\n
                <link rel='stylesheet' href='movie_page.css'>\n
                <link rel='preconnect' href='https://fonts.googleapis.com'>\n
                <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>\n
                <link href='https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap' rel='stylesheet'>\n
                </head>\n
                <body>\n
                <div id='content'>
                <div id='name'>
                <h1>$name</h1>\n
                <h3>($releaseYear)</h3>\n
                </div>
                <div id='media'>
                <img src='$poster' style='max-width: 300px;'>\n
                <iframe alt='Video trailer' src='$videoUrl' frameborder='0'></iframe>\n
                </div>
                <div id='info'>
                <h3>Genre: $genreList</h3>\n
                <p>$caption</p>\n
                <hr>\n
                <h3>Director</h3>\n
                <p>$directorList</p>\n
                <hr>\n
                <h3>Writers</h3>\n
                <p>$writerList</p>\n
                <hr>\n
                </div>
                </div>
                </body>\n
                </html>";

                fwrite($fileHandle, $htmlContent);

                // Close the file
                fclose($fileHandle);
            } else {
                // Handle error if the file cannot be opened
                echo "Error: Unable to create the file.";
                exit();
                }
        }
    ?>
</body>
</html>