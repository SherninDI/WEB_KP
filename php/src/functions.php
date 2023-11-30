<?php
require_once 'config.php';

function selectText() {
	global $conn;
    global $table;
	$text = array();
	$query = "SELECT * FROM ".$table." ORDER BY id;";
	$result = mysqli_query($conn,$query);
	for($i = 0; $i < mysqli_num_rows($result); $i++) {
		mysqli_data_seek($result, $i);
		$text[] = mysqli_fetch_assoc($result);
	}
	mysqli_free_result($result);
    return $text;
}

function selectScript($id) {
	global $conn;
    global $table;
	$text = array();
	$query="SELECT * FROM ".$table." WHERE id=".$id;
	$result=mysqli_query($conn,$query);
	for($i = 0; $i < mysqli_num_rows($result); $i++) {
		mysqli_data_seek($result,$i);
		$text[] = mysqli_fetch_assoc($result);
	}
	mysqli_free_result($result);
	return $text[0];
}

function update($id, $title, $description, $content) {
	global $conn;
    global $db;
    global $table;
	$content = $conn->real_escape_string($content);
	$query = "UPDATE ".$table." SET title='".$title."', descript='".$description."', content='".$content."' WHERE id=".$id;
	mysqli_query($conn,$query);
}

function add($title, $description, $content){
	global $conn;
    global $db;
    global $table;
	$content = $conn->real_escape_string($content);
	$query = "INSERT INTO ".$db.".".$table."(title,descript,content) VALUES ('".$title."','".$description."','".$content."')";
	mysqli_query($conn,$query);
}

function add_result($id, $result){
	global $conn;
    global $db;
    global $table;
	$result = $conn->real_escape_string($result);
	$query = "UPDATE ".$table." SET result='".$result."' WHERE id=".$id;
	mysqli_query($conn,$query);
}

function del($id){
	global $conn;
    global $db;
    global $table;
	$query = "DELETE FROM ".$db.".".$table." WHERE id=".$id;
	mysqli_query($conn,$query);
}
?>