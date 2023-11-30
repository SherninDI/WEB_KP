<?php 
    $filename = "file_filter.txt";
    $file = fopen($filename, 'a+') or die("не удалось создать файл");
    fclose($file);

    if (file_exists($filename)) { 
        if( isset($_POST['add_function'])) {         
            if( isset($_POST['function'])) {
                $func = $_POST['function']."\n"; 
                
            }
            file_put_contents($filename,$func, FILE_APPEND);
        }    
        if( isset($_POST['clear'])) {         
            file_put_contents($filename,"");
        }    
    }

?>

<head>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script> 
    <link href="/style/style.css" rel="stylesheet" type="text/css"/> 
</head>

<body>
    <form method="post">
   
        <div class="content_view">    
            <h2 class="name">Запрещенные функции</h2>    
            <div class="view">
                <?php 
                    echo "<ul class='list1'>";
                    $data = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    foreach ($data as $line) { 
                        echo "<li>";
                        echo $line;
                        echo "</li>";
                    }
                    echo "</ul>";
                ?>               
            </div>
            
            <div class="content_buttons">
                <input type="text" name="function">
                <input type="submit" name="add_function" class="content_button" value="Добавить">
                <input type="submit" name="clear" class="content_button" value="Очистить">
            </div>

        </div>              		    						    				                       	    		    			               
    </form>
</body>
</html>
