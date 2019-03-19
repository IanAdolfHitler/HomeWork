<html>
<head>
	<title>Student Member</title>
	<!--
		project: Student Member Homework
		Date: 2019/3/19
		Author: A106223012
	-->
	<script src="studentMember.js"></script>
</head>
<body>


<form id="StudentMember" name="studentMember" method="post" enctype="multipart/form-data" action="">
	<table cellpadding="8" style="background-color: #77DDFF;">
		<tr>
			<td>帳號</td>
			<td><input type="text" name="account" value=""></td>
		</tr>
		<tr>
			<td>密碼</td>
			<td><input type="text" name="password" value=""></td>
		</tr>
		<tr>
			<td>確認密碼</td>
			<td><input type="text" name="re_password" value=""></td>
		</tr>
		<tr>
			<td>性別</td>
			<td>
				<input type="radio" name="sex" value="man">男性
				<input type="radio" name="sex" value="female">女性
			</td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td><input type="text" name="email" value=""></td>
		</tr>
		<tr>
			<td>照片</td>
			<td><input type="file" name="pic" value=""></td>
		</tr>
			<input name="uploaded" type="hidden" value="true">
			<td colspan="2">
				<input type="button" value="註冊" onClick="CheckForm(this.form)" style="margin-left: 40; font-size: 20;">
				<input type="reset" value="清除" style="margin-left: 40; font-size: 20;">
			</td>
		</tr>
	</table>
</form>

<?php
	if(isset($_POST["uploaded"]) && ($_POST["uploaded"]=="true"))
	{
		$output = "";
		$checked = true;
		
		if($_FILES["pic"]["error"] != 0 || strpos($_FILES["pic"]["type"], "image") === false){
			$checked = false;
			$output .= "上傳照片失敗".$_FILES["pic"]["type"]."<br>";
		}

		if($checked){
			if (move_uploaded_file($_FILES["pic"]["tmp_name"], "./studentData/".$_FILES["pic"]["name"])){
				$output .= "照片 ".$_FILES["pic"]["name"]." 上傳成功!<br>";
				$book = $_POST["account"]."\r\n";
				$book .= $_POST["password"]."\r\n";
				$book .= $_POST["sex"]."\r\n";
				$book .= $_POST["email"]."\r\n";
				$book .= $_FILES["pic"]["name"]."\r\n";

				$file_path = "./studentData/student.txt";

				if(file_exists($file_path)){
					$handle = fopen($file_path, "a");
					if($handle){
						fwrite($handle, $book);
						$output .= "註冊成功!!!<br>";
					}
					fclose($handle);
				}
			}
		}
		echo $output."<br>";
	}
?>

</body>
</html>