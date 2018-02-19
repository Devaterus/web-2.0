<h2>Registration</h2>


<?php
	if(isset($_POST["sent"])){
		if(isset($_POST["name"]) && $_POST["name"] != "" &&
			isset($_POST["password1"]) && $_POST["password1"] != "" &&
			isset($_POST["password2"]) && $_POST["password2"] != "" &&
			isset($_POST["mail"]) && $_POST["mail"] != ""){
			if ($_POST["password1"] == $_POST["password2"]){
				$q = $db->query("SELECT * FROM users WHERE jmeno = '".$db->real_escape_string($_POST["name"])."'");
					if($q->num_rows == 0){
						$db->query("INSERT INTO users (jmeno, heslo, mail) VALUES ('".$db->real_escape_string($_POST["name"])."','".md5($_POST["password1"])."','".$db->real_escape_string($_POST["mail"])."')");
						echo "Registration was successful";
					}else{
						echo "User doesn't exist";
					}
			}else{
				echo "Incorrect password";
			}

		}else{
			echo "Wrong";
		}
	}
?>

<form method="POST">
	<table>
		<tr><td>Login: </td><td><input type="text" name="name"></td></tr> 
		<tr><td>Password: </td><td><input type="password" name="password1"></td></tr> 
		<tr><td>Password again: </td><td><input type="password" name="password2"></td></tr>
		<tr><td>Mail: </td><td><input type="text" name="mail"></td></tr>
		<tr><td></td><td><input type="submit" value="Register"></td></tr>
	</table>
	<input type="hidden" name="sent" value="1">
</form>