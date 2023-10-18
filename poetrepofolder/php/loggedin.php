<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
    </head>
    <body>
    <link rel="stylesheet" type="text/css" href="poemsharing.css" />
    <?php

session_start();
echo("logged in as: ");
if (isset($_SESSION['username'])) {
  echo $_SESSION['username'];
}



?>
        
<br> <br>


      <form action="upload.php" method="POST">
          
            Upload a Poem?  <button id ="uploa" style="height:15px; width:10px"  name="subbutton" type="gotoupload" value="gotoupload"></button>
            
          </form>

          <form action="logout.php" method="POST">
          
            
            Log out?  <button id ="logou" style="height:15px; width:10px"  name="subbutton" type="gotologout" value="gotologout"></button>
          </form>

<br> 

Current Poems:

<?php //THIS CODE COUNTS THE NUMBER OF FILES IN THE DIRECTORY
session_start();
$username = $_SESSION['username'];



$uploadnum = glob(sprintf('/home/hjake22/userinfo/%s', $username));
$number_of_uploads = count($uploadnum);
//echo($number_of_uploads);


 
// Set the current working directory
$directory = sprintf('/home/hjake22/userinfo/%s/', $username);
 
// Initialize filecount variable
$filecount = 0;
 
$files2 = glob( $directory ."*" );
 
if( $files2 ) {
    $filecount = count($files2);
}
 
echo $filecount . " files ";
 




?>


<br> FILES: <br> <br>
<?php
$full_path = sprintf("/home/hjake22/userinfo/%s/%s", $username, $filename);

$files = scandir($full_path); //this prints the files and gives them silly buttons for viewing and deleting
    foreach ($files as $file) {
        if ($file != "." && $file != "..") {
          
            echo $file, "\n";
            
            ?>
              <form action='view.php' method='POST'>
              
              <input type='hidden' name='file' value='<?php echo htmlentities($file) ?>'>
              <input type='submit' name='action' value='view'>
              </form>

              <form action='deleteit.php' method='POST'>
            
              <input type='hidden' name='file' value='<?php echo htmlentities($file) ?>'>
              
              <input type='submit' name='action' value='delete'>
              
              </form>
              <br><br>
            <?php 
      }
    }

    
  ?>
       
    


       
        
    </body>
</html>

