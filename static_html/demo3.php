<?PHP
	error_reporting("0");
	$file_name = $_GET['file_name'];
?>
<!doctype html>

<title></title>
<meta charset="utf-8"/>

<link rel="stylesheet" href="../codemirror/lib/codemirror.css">
<script src="../codemirror/lib/codemirror.js"></script>
<script src="../codemirror/addon/edit/matchbrackets.js"></script>
<script src="../codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="../codemirror/mode/xml/xml.js"></script>
<script src="../codemirror/mode/javascript/javascript.js"></script>
<script src="../codemirror/mode/css/css.js"></script>
<script src="../codemirror/mode/clike/clike.js"></script>
<script src="../codemirror/mode/php/php.js"></script>
<style type="text/css">.CodeMirror {border-top: 1px solid black; border-bottom: 1px solid black;}</style>


<h2></h2>
<form action="demo4.php" method="post">
	<p>
		文件名称:<input type="text" name="filename" value="<?PHP if($file_name) echo $file_name; ?>">
	</p>
	<textarea id="code" name="code"><?php
	if($file_name){
		$myfile = fopen($file_name, "r") or die("Unable to open file!");
		echo fread($myfile,filesize($file_name));
		fclose($myfile);
	}
?></textarea>
	
	<p>
		<input type="submit" value="提交">
	</p>
</form>

<script>
	var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
		lineNumbers: true,
		matchBrackets: true,
		mode: "application/x-httpd-php",
		indentUnit: 4,
		indentWithTabs: true,
		smartIndent:true,
		//theme: string,
	});
</script>
