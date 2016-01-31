<?PHP
	error_reporting("0");
	
	$filename = $_POST['filename'];
	if(empty($filename)) $filename = time().'.html';
	$content = $_POST['code'];
	
	$fp = fopen($filename, "w");
	fwrite($fp, $content);
	fclose($fp);
	
	$url = "demo3.php?file_name=$filename";  
	echo "<script language='javascript' 
	type='text/javascript'>";  
	echo "window.location.href='$url'";  
	echo "</script>"; 
	exit;
?>
