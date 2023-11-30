<?php 
    require_once 'functions.php';

    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        del($id);
        echo'<script> parent.location.href="index.php" </script>';
    }	
?>