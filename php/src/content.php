<head>
    <link href="/style/style.css" rel="stylesheet" type="text/css"/> 
</head> 
<?php 
    require_once 'functions.php';
    $text=selectText();
    $not_empty=(count($text)>0);

    $filename = "file.php";
    $file = fopen("file.php", 'w') or die("не удалось создать файл");
    fclose($file);
      
    if($not_empty){
        if(isset($_GET['id'])){	            
	        $id = $_GET['id'];
            $script=selectScript($id);              
        }

        echo '<h2 class="content_header">'.$script['title'].'</h2>';
        echo '<div class="content_description">'.$script['descript'].'</div>'; 

        if (file_exists($filename)) {
            file_put_contents($filename,$script['content']);
            $text = htmlentities(file_get_contents($filename));

            echo '<div class="content_code"><pre>'.$text.'</pre></div>';
        } 

        echo ' <div class="buttons">';
        echo '<button type="button" onclick="location.href='."'edit.php?id=".$id."'".'">Редактировать</button>';
        echo '<button type="button" onclick="location.href='."'del.php?id=".$id."'".'">Удалить</button>';
        echo '<button type="button" onclick="location.href='."'execute.php?id=".$id."'".'">Выполнить</button>';
        echo ' </div>';

    } 
    else {
        echo "Скриптов нет!";
    } 
?>     