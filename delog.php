<?php
    $cale = 'http://localhost/admin.php';
	session_start();
    session_destroy();
    header('Location: '.$cale);
?>