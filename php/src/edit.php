<?php 
    require_once 'functions.php';
	$getid=$_GET['id'];	
	$query="SELECT * FROM ".$table." WHERE id=" .$getid;
	$result=mysqli_query($conn,$query);	
	$text=mysqli_fetch_assoc($result);
	$content = $text['content'];
	$title = $text['title'];
    $description = $text['descript'];

	if(isset($_POST['edit'])) {
        
	    // $up_content = $_POST['up_content'];
        // $fd = fopen("file.php", 'w') or die("не удалось создать файл");
        // fwrite($fd, $up_content);
        // fclose($fd);
	    // $up_title = $_POST['up_title'];
        $up_description = $_POST['up_description'];
        $up_content = $_POST['up_content'];
	    $up_id = $getid;
        // $plaintext_with_ps = strip_tags($_POST['up_content'], '<p>');
		update($up_id, $title, $up_description, $up_content);
		echo'<script> parent.location.href="index.php?id='.$up_id.'" </script>';
	}
	
	
?>
<head>
    <link href="style.css" rel="stylesheet" type="text/css"/> 
	<script type="text/javascript" src="ckeditor5/build/ckeditor.js"></script>  
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
    <form method="post">

        <div name="up_title" class="title" >
            <?php //echo $title;?>
        </div>

        <div class="description">
            <textarea name="up_description" id="editor_desc" > 
                <?php echo $description;?>
            </textarea>                         
        </div>

        <div id="editor_code"> 
            <pre><code class='language-php'>     
                <textarea  name="up_content">            
                    <?php
                        
                        // $filename = 'file.php';
                        // $text = htmlentities(file_get_contents($filename));
                        // json_encode($text);

                        echo htmlentities($content);
                    ?>                
                </textarea> 
            </code></pre>         
        </div>
        
        <input type="submit" name="edit" value="Редактировать">
		    			    
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor_desc' ) )
                .then( editor => {
                    window.editor = editor;
                } )
                .catch( error => {
                    console.error( 'There was a problem initializing the editor.', error );
                } );
                
        </script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor_code' ), {                                         
                    codeBlock: {
                        languages: [
                            { language: 'php', label: 'PHP' }
                        ]
                    }
                })
                
                .then( editor => {
                    window.editor = editor;
                } )
                .catch( error => {
                    console.error( 'There was a problem initializing the editor.', error );
                } );            
        </script> 
        
        <!-- <script language="JavaScript">
            $(document).ready(function() { // Отслеживаем полную загрузку документа
                $.ajax({ // Готовим ajax запрос
                    url: "file.php",  // Указываем файл, к которому обращаемся
                     // Указываем метод, который необходимо использовать.
                    success: function(data) { // Если успешно запрос отправлен и данные получены.
                        // console.log(data); // Возвращаемые данные выводим в консоль
                        $('#up_title').text(data); // Добавляем значение в поле с id = param
                    }
                });
            });
        </script> -->
    </form>
</body>
</html>
