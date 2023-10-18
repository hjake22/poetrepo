<?php
    session_start();

        unset($_SESSION['username']);
        unset($_SESSION['file']);
        session_destroy();
        header("Location: poemsharing.html");
	exit;
    

?>