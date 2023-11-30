<head>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script> 
    <link href="/style/style.css" rel="stylesheet" type="text/css"/> 
</head>
<body>
    <form method="post">
        <div class="content_view">  
            <div class="view">   
            <h2 class="name">Название</h2>       
            <div class="title">
                
                <input name="add_title" type="text">
            </div>

                <h2 class="name">Описание</h2>
                <div class="description">
                    
                    <textarea  id="editor_desc" name="add_description"> </textarea>
                </div>
                <h2 class="name">Код скрипта</h2>
                <div class="code">
                    <textarea id="editor_code" name="add_code" rows="5">
                        <pre><code class='language-php'></code></pre>           
                    </textarea> 
                </div>
            </div>
            <div class="content_buttons">
                <input type="submit"  class="content_button" name="add" value="Добавить">
            </div> 
        </div>              		    						    				                       	    		    			    
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor_desc' ) )
                .then( editor => {
                    window.editor = editor;
                    editor.editing.view.change((writer) => {
                    writer.setStyle(
                        "height",
                        "200px",
                        editor.editing.view.document.getRoot()
                    );
                    });
                } )
                
                .catch( error => {
                    console.error( 'There was a problem initializing the editor.', error );
                } );
            var edidorCode;
            ClassicEditor
                .create( document.querySelector( '#editor_code' ), {                                         
                    codeBlock: {
                        languages: [
                            { language: 'php', label: 'PHP' }
                        ]
                    }
                })
                
                .then( editor => {
                    editorCode = editor;
                
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
    
    $file = "file.php";
    $fd = fopen("file.php", 'a+') or die("не удалось открыть файл");
    fclose($fd);
    if( isset($_POST['add'])) {

        if( isset($_POST['add_title'])) {
            $cur_title = $_POST['add_title'];
        }
        if( isset($_POST['add_description'])) {
            $cur_description= $_POST['add_description'];
            $cur_description = strip_tags($cur_description, "<b>");
        }
        if( isset($_POST['add_code'])) {
            $cur_content = $_POST['add_code'];
            $cur_content = strip_tags($cur_content, "<p><b>");
            $cur_content = strtr($cur_content, array('&lt;' => '<', '&gt;' => '>',  '<br>' => "\n") );
            file_put_contents($file, $cur_content);
        }

	    add($cur_title, $cur_description,$cur_content);
        echo'<script> parent.location.href="index.php" </script>';        
    }	
?>