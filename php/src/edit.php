<?php 
    require_once 'functions.php';

    $file = "file.php";
	$getid=$_GET['id'];	
	$query="SELECT * FROM ".$table." WHERE id=" .$getid;
	$result=mysqli_query($conn,$query);	
	$text=mysqli_fetch_assoc($result);
	$content = $text['content'];
	$title = $text['title'];
    $description = $text['descript'];


    if( isset($_POST['edit'])) {

        $up_id = $getid;
        $up_title = $_POST['update_title'];
        $up_description = $_POST['update_description'];
        $up_content = $_POST['update_code'];
        $up_content = strip_tags($up_content, "<p><b>");
        $up_content = strtr($up_content, array('&lt;' => '<', '&gt;' => '>') );
        file_put_contents($file, $up_content);

        update($up_id, $up_title, $up_description, $up_content);
		echo'<script> parent.location.href="index.php?id='.$up_id.'" </script>';
    }	
	
?>
<head>
    <link href="/style/style.css" rel="stylesheet" type="text/css"/> 
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>  
</head>
<body>
    <form method="post">

        <div >
            <h2 class="name">Название</h2>
            <input name="update_title" value="<?php echo $title;?>">         
        </div>

        <div>
            <h2 class="name">Описание</h2>
            <textarea name="update_description" id="update_description" > 
                <?php echo $description;?>
            </textarea>                         
        </div>

        <div >     
                <h2 class="name">Код скрипта</h2> 
                <textarea id="update_code" name="update_code" >
                    <pre><code class='language-php'><?php                       
                            $content = strtr($content, array('<' => '&lt;', '>' => '&gt;'));
                            $content = trim($content);
                            $content = htmlspecialchars($content);
                            echo $content;
                        ?></code></pre></textarea>               
        </div>
        
        <input type="submit" name="edit" value="Редактировать">
		    			    
        <script>
            ClassicEditor
                .create( document.querySelector( '#update_description' ) )
                .then( editor => {
                    window.editor = editor;
                } )
                .catch( error => {
                    console.error( 'There was a problem initializing the editor.', error );
                } );
                
        </script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#update_code' ), {                                         
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
    </form>
</body>
</html>
