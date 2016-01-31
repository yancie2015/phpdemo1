<?PHP
	$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$arr1 = array();
	$arr1[] = array("linkurl"=>.$url."/static_html/demo1.php","title"=>"static_html");

	foreach($arr1 as $item){
?>
	<a href="<?PHP echo $item['linkurl']; ?>" target="_blank"><?PHP echo $item['title']; ?></a>
<?PHP
	}
?>
