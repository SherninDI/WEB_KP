<link href="style.css" rel="stylesheet" type="text/css"/> 
<?php 
    require_once 'functions.php';
    $text=selectText();
    $not_empty=(count($text)>0);
      
    $filter_filename = "file_filter.txt";
    $filename = "file.php";
    $exists = false;

    function getLines($file) {
        $f = fopen($file, 'r');
        try {
            while ($line = fgets($f)) {
                yield $line;
            }
        } finally {
            fclose($f);
        }
    }

    echo "<ul class='list1'>";
    foreach (getLines($filter_filename) as $filter_line) {
        $needle = rtrim($filter_line);
        foreach (getLines($filename) as $line) { 
            $haystack = $line;
            $pos= strpos($haystack, $needle);
            if ($pos !== false) {
                echo "<li>";
                echo "Последнее вхождение ($needle) найдено в ($haystack)";
                echo "</li>";
                $exists = false;
            } 
            // else if($pos === 0){
            //     // $exists = true;
            // }
        }
    }
    echo "</ul>";
   
    if($not_empty ){
        if(isset($_GET['id'])){	            
	        $id = $_GET['id'];
            $script=selectScript($id);              
        } 
        if ($exists) {
            $result= shell_exec('php file.php');    
            add_result($id, $result);  
            echo '<div class="content_result">'.$result.'</div>';;
        }
       
    } 
    else {
        echo "Статей нет!";
    } 

?>    