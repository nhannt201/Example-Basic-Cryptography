<?php 
	$kq= '';
	$string = '';
	if (isset($_GET['string'])) { 
		if (strlen($_GET['string'])) { 
			$string = htmlspecialchars($_GET['string']); 
			$kq = '<div class="heading">Result</div>';
			if (isset($_GET['type'])) { //Check type data need to encrytion
				switch ($_GET['type']) {
					case 'hash':
						$kq .= "<br> <h2>Hash: <mark>".hash('ripemd160', $string)."</mark></h2>"; //ripemd160 la kieu thuat toan ma hoa, co length, string chuoi dau vao
					break;
					case 'md5':
						$kq .= "<br> <h2>MD5: <mark>".md5($string)."</mark></h2>";
					break;
					case 'base64':
						$kq .= "<br> <h2>Base64: <mark>".base64_encode($string)."</mark></h2>";
					break;
					case 'sha1':
						$kq .= "<br> <h2>Hash: <mark>".hash('sha1', $string)."</mark></h2>"; //ripemd160 la kieu thuat toan ma hoa, co length, string chuoi dau vao
					break;
				}
			}
			//References: https://www.php.net/manual/en/function.hash.php
			// https://www.geeksforgeeks.org/how-to-encrypt-and-decrypt-a-php-string/
		}
	}
?>
<html lang="vi">
	<head>
		<title>Example Basic Cryptography</title>
		<meta charset="utf-8"/>
		<style>
			.form {
				border-style: solid;
				padding: 2%;
				text-align: center;
			}
			.heading {
				font-weight: bold;
				font-size: 30px;		
				padding: 1%;
			}
			.chuoi {
				border-style: solid;	
			}
			input[type=text] {
			  width: 100%;
			  padding: 12px 20px;
			  margin: 8px 0;
			  box-sizing: border-box;
			  text-align: center;
			}
		</style>
	</head>
	<body>
		<div class="form">
			<form method="get" action="">
				<div class="heading">Example Basic Cryptography</div>
				<input type="text" class="chuoi" id="string" name="string" value="<?=$string;?>" placeholder="Nhập một chuỗi để mã hoá">
				<input type="submit" name="type" value="hash">
				<input type="submit" name="type" value="md5">
				<input type="submit" name="type" value="base64">
				<input type="submit" name="type" value="sha1">
			</form>
			<?=$kq;?>
		</div>
	</body>
</html>