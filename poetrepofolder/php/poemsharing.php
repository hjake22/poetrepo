<!DOCTYPE html>
<html>
    <head>
        <title>File Sharing</title>
    </head>
    <body>
    <link rel="stylesheet" type="text/css" href="poemsharing.css" />
<?php
  $user = $_POST['userinput'];
  $pass = $_POST['passinput'];



  $h = fopen("username.txt", "r"); //this traces through the users.txt file for usernames!
  
  
  
  while( !feof($h) ){

        if(trim(fgets($h)) == $user){
            session_start();
            $_SESSION['username'] = $user;
            break;
            
        }
        
    }
    fclose($h);
//this recognizes a username


//this is password stuff for creative portion
if ($user == "user1"){
    if ($pass == "user1pass"){
        session_start();
            $_SESSION['password'] = $pass;
    }else{
        echo('liar!    ');
            echo('    hit that back arrow and try again!!');
    }

}

if ($user == "jake"){
    if ($pass == "jake"){
        session_start();
            $_SESSION['password'] = $pass;
    }
    else{
        echo('liar!    ');
            echo('    hit that back arrow and try again!!');
    }

}



//this is the final logging in result!
    if (isset($_SESSION['username'])){
        if(isset($_SESSION['password'])){
        echo('logging in');
        echo '<a href="loggedin.php">Click to continue.</a>';
        header("Location: loggedin.php");
        } else {
            echo('liar!    ');
            echo('    hit that back arrow and try again!!');

        }
    } else {
        echo('liar!    ');
        echo('    hit that back arrow and try again!!');
    }
?>

   </body>
</html>