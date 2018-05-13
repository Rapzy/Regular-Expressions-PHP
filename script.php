<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Regular Expressions PHP</title>
</head>
<body>
	<style type="text/css">
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			margin: 0;
		}
		div {
			text-align: center;
		}
		#number{
			font-size: 100px;
		}
		#text,a{
			font-size: 30px;
		}
	</style>

</body>
</html>
<?php
	$str_in = htmlentities($_GET['str_in']);
	$lang = $_GET['lang'];
	$str_in = DeleteBadChar($str_in);
	$str_in = MakeSpaces($str_in);
	$str_out = ArabicToRoman($str_in);
	
	echo "<div><span id='number'>$str_in</span><br><span id='text'>$str_out</span>";
	if ($lang == 'en') {
		echo "<br><a href='index.html'>Home</a></div>";
	}
	else{
		echo "<br><a href='index.html'>На главную</a></div>";
	}
	function MakeSpaces($str){
		$pos = [];
		for ($i = strlen($str) - 1; $i >= 0; $i--) {
			if ((strlen($str) - $i) % 3 == 0) {
				$pos[count($pos)] = $i;
			}
		}
		for ($i=0; $i < count($pos); $i++) {
			$str = substr_replace($str, " ", $pos[$i],0);
		}
		return $str;
	}
	function DeleteBadChar($str){
		$minus = "";
		if (substr($str,0,1) == '-'){
			$minus = "-";
			$str = substr($str,1);
		}
		preg_match('[^\D]',$str,$matches);
		$str = str_replace($matches, '' , trim($str));
		while (substr($str,0,1) == '0' && strlen($str) > 1) {
			$str=substr($str,1);
		}
		return $minus.$str;
	}
	function ArabicToRoman($num)
	{
		return $num;
	}