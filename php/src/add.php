<head>
	<script type="text/javascript" src="ckeditor5/build/ckeditor.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css"/> 
    <!-- <link href="ckeditor5/sample/styles.css" rel="stylesheet" type="text/css"/>  -->
</head>
<body>
    <form method="post">

        <div class="title">
            <h2 class="name">Название</h2>
            <input name="add_title" type="text">
        </div>
        
        <div class="description">
            <h2 class="name">Описание</h2>
            <textarea  id="editor_desc" name="add_description">                
            </textarea>
        </div>
        <div class="code">
            <h2 class="name">Код скрипта</h2>
            <textarea id="editor_code" name="add_code">                
            </textarea>
        </div>
        <div class="add">
            <!-- <div id="article"><p>Введите название<br></div>
		    <input type="text" name="title"></p>
            <div id="article"><p>Введите содержание<br></div> -->

            <!-- <textarea id="editor1" name="content" cols="100" rows="1000"></textarea> -->
            <input  type="submit" name="add" value="Добавить">
        </div>                    		    						    				                       	    			
		    			    
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
    </form>
</body>
</html>
<?php 
require_once 'functions.php'; 
	if( isset($_POST['id'])) {
	    $cur_id = $_POST['id'];
    }
    if( isset($_POST['add_title'])) {
	    $cur_title = $_POST['add_title'];
    }
    if( isset($_POST['add_description'])) {
	    $cur_description= $_POST['add_description'];
    }
    if( isset($_POST['add_code'])) {
	    $cur_content = $_POST['add_code'];
    }

    if( isset($_POST['add'])) {
	    add($cur_title, $cur_content, $cur_description);
        echo'<script> parent.location.href="index.php" </script>';        
    }	
?>