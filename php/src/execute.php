<link href="style.css" rel="stylesheet" type="text/css"/> 
<?php 
    require_once 'functions.php';
    $text=selectText();
    $not_empty=(count($text)>0);
      
    if($not_empty){
        if(isset($_GET['id'])){	            
	        $id = $_GET['id'];
            $script=selectScript($id);              
        } 
        $output = shell_exec('php file.php');      
        echo '<div class="content_result">'.$output.'</div>';;
    } 
    else {
        echo "Статей нет!";
    } 
?>    