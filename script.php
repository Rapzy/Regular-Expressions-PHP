<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Regular Expressions PHP</title>
</head>
<body>
	<style type="text/css">
		body {
			
		}
		div {
			text-align: center;
		}
		#number,#text,a{
			font-size: 30px;
		}
	</style>

</body>
</html>
<?php
	$str_in = htmlentities($_GET['str_in']);
	$lang = $_GET['lang'];
	$str_out = $str_in;
	while (preg_match('/[\d]{1,}/', $str_out, $matches, PREG_OFFSET_CAPTURE)) { 
		$math = ConvertToRoman($matches[0][0]);
		$str_out = substr_replace($str_out, $math, $matches[0][1],strlen($matches[0][0]));
	}
	
	echo "<div><span id='number'>$str_in</span><br><span id='text'>$str_out</span>";
	if ($lang == 'en') {
		echo "<br><a href='index.html'>Home</a></div>";
	}
	else{
		echo "<br><a href='index.html'>На главную</a></div>";
	}
	
	function ConvertToRoman($num)
	{
		$arrayName = array(
			'1000' => 'M',
			'900'  => 'CM',
			'500'  => 'D',
			'400'  => 'CD',
			'100'  => 'C',
			'90'   => 'XC',
			'50'   => 'L',
			'40'   => 'XL',
			'10'   => 'X',
			'9'    => 'IX',
			'5'    => 'V',
			'4'    => 'IV',
			'1'    => 'I'
			 );
	if (!$num) return "N";
	$result = $num >= 1000 ? str_repeat('M',intdiv($num, 1000)) : ""; 
	$num = str_repeat("I", $num % 1000);
	while (preg_match('/(I){4,}|([^I])\2{3,}/', $num)){
		foreach ($arrayName as $number => $value) {
			$reg = '/(I){'.$number.'}/';
			$num = preg_replace($reg, $value, $num);
		}
	}
	return $result.$num;
}