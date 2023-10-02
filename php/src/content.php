<head>
    <link href="style.css" rel="stylesheet" type="text/css"/> 
</head> 
<?php 
    require_once 'functions.php';
    $text=selectText();
    $not_empty=(count($text)>0);
      
    if($not_empty){
        if(isset($_GET['id'])){	            
	        $id = $_GET['id'];
            $script=selectScript($id);              
        }
        echo '<h2 class="content_header">'.$script['title'].'</h2>';
        echo '<div class="content_description">'.$script['descript'].'</div>'; 
        $fd = fopen("file.php", 'w') or die("не удалось создать файл");
        fwrite($fd, $script['content']);
        fclose($fd);
        $fd1 = fopen("file.php", 'r') or die("не удалось открыть файл");

        $filename = 'file.php';
        $text = htmlentities(file_get_contents($filename));
        echo '<div class="content_code"><pre>'.$text.'</pre></div>';
        // while(!feof($fd1)) {
        //         $str = htmlentities(fread($fd1, 1024));
        //         echo '<div class="content_code"><pre>'.$str.'</pre></div>';
        //     }
        // fclose($fd1);
        echo '<button type="button" onclick="location.href='."'edit.php?id=".$id."'".'">Редактировать</button>';
        echo '<button type="button" onclick="location.href='."'del.php?id=".$id."'".'">Удалить</button>';
        echo '<button type="button" onclick="location.href='."'execute.php?id=".$id."'".'">Выполнить</button>';
        // echo '</div>'; 
        // echo htmlspecialchars($script['content']->text).'<'.'>';
        // echo '<div class="d-grid gap-2 d-md-block">';               
        // echo '<button type="button"  class="btn btn btn-link" onclick="location.href='."'edit.php?id=".$id."'".'">Редактировать статью</button>';
        // echo '<button type="button"  class="btn btn btn-link" onclick="location.href='."'del.php?id=".$id."'".'">Удалить статью</button>';
        // echo '</div>';
        // echo '</div>';
    } 
    else {
        echo "Статей нет!";
    } 
?>     