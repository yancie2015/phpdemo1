<?php
	error_reporting("0"); //屏蔽错误
	$filename = $_GET['del'];
	if($filename){
		unlink($filename);
		$url = "demo1.php";  
		echo "<script language='javascript' 
		type='text/javascript'>";  
		echo "window.location.href='$url'";  
		echo "</script>"; 
		exit;
	}
	
	$dir = "./";  //要获取的目录
	echo "********** 获取目录下所有文件和文件夹 ***********<hr/>";
	//先判断指定的路径是不是一个文件夹
	if (is_dir($dir)){
		if ($dh = opendir($dir)){
			while (($file = readdir($dh))!= false){
				//文件名的全路径 包含文件名
				$filePath = $dir.$file;
				//获取文件修改时间
				$fmt = filemtime($filePath);
				//echo "<span style='color:#666'>(".date("Y-m-d H:i:s",$fmt).")</span> ".$filePath."<br/>";
				if($file!=='.'&&$file!=='..'){
					echo "<p><td style=\"width:400px;\">{$file}</td>&nbsp;&nbsp;<a href=\"demo2.php?file_name={$file}\" target=\"_blank\">查看源代码</a>&nbsp;&nbsp;<a href=\"{$file}\" target=\"_blank\">运行</a>&nbsp;&nbsp;<a href=\"demo3.php?file_name={$file}\" target=\"_blank\">编辑</a>&nbsp;&nbsp;<a href=\"demo1.php?del={$file}\">删除</a></p>";
				}
				//echo "<br>";
			}
			closedir($dh);
		}
	}

	$time = time();
	$file_name = time().'.html';
	ob_start();
	//echo "Hello World!";
	//$content = ob_get_contents();//取得php页面输出的全部内容
	$str = "<html>
	<head>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
		<title>测试{$time}</title>
	</head>
	<body>
		<h1>测试{$time}</h1>
		<h2></h2>
	</body>
</html>";
	$content =<<<Eof
{$str}
Eof;
	$fp = fopen($file_name, "w");
	fwrite($fp, $content);
	fclose($fp);
	echo "<a href='{$file_name}' target=\"_blank\">查看</a>";
?>
