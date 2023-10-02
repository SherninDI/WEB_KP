<?php
    include("config.php");
?>

<!DOCTYPE HTML>
<html>
   <head>
        <title> Шернин Д. И. А-07м-22 КР</title> 
        <link href="style.css" rel="stylesheet" type="text/css"/>  
        <?php
            require_once 'functions.php';
            $text=selectText();
            $not_empty=true;
            if (count($text) == 0) {
                $not_empty=false;
            }
            $target='content.php';
            if(isset($_GET['target'])){	            
                $target = $_GET['target'];                        
            }
            if(isset($_GET['id'])){	            
                $id = $_GET['id'];
                $script=selectScript($id);              
            } 
            else if($not_empty){              
                $script=$text[0];
                $id=$script['id'];
            } 
            else {
                $id=0;
            }
        ?>
    </head>
   <body> 
        <h1 class="main_header">Скрипты</h1> 
        <div class="container">
            <div class="scripts">
                <h2 class="scripts_header">Содержание</h2>
                <div class="scripts_name">
                    <?php
                        if($not_empty) {
                            foreach($text as $script) {
                                echo '<button type="button" name="scripts">';                       
                                echo "<div><a href=index.php?id=".$script['id']." href >".$script["title"]."</a></div>";
                                echo '</button><br>';
                            }
                        }                              
                    ?>                   
                </div>
                <div class="menu">
                    <button type="button" onclick="location.href='index.php?target=add.php'">Добавить</button>
                    <button type="button" onclick="location.href='index.php?target=filter.php'">Фильтр</button>
                </div>


            </div> 
                           
            <iframe class = 'content' src='<?php echo $target."? id=".$id?>'> </iframe>            
              
        </div>        
   </body>
</html>