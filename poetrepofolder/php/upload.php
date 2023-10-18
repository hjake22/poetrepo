

<!DOCTYPE html>
<html>
    <head>
        <title>Upload</title>
    </head>
    <body>
        <link rel="stylesheet" type="text/css" href="poemsharing.css" />
        <h1>Upload a Poem!</h1>
        <br>
        <?php
            session_start();
            $username = $_SESSION['username'];
            //echo($username);
            $full_path = sprintf("/home/hjake22/userinfo/%s/", $username);
            //echo($full_path);
            $_SESSION['path'] = $fullpath;

?>
        <form enctype="multipart/form-data" action="uploader.php" method="POST">
	        <p>
		<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
		<label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
	        </p>
	        <p>
		<input type="submit" value="Upload File" />
	        </p>
</form>


       
        
    </body>
</html>