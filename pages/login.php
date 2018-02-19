<h2>Login</h2>


<?php
	if(isset($_POST["sent"])){
		if(isset($_POST["name"]) && $_POST["name"] != "" &&
			isset($_POST["password"]) && $_POST["password"] != ""){
				$q = $db->query("SELECT * FROM users WHERE jmeno = '".$db->real_escape_string($_POST["name"])."' AND heslo = '".md5($_POST["password"])."'");
				if($q->num_rows != 0){
					$_SESSION["logged"] = true;
					header("Location: ?p=about");
				}else{
					echo "Wrong name or password";
				}
		}else{
			echo "Wrong";
		}
	}
?>

<form method="POST">
	<table>
		<tr><td>Login: </td><td><input type="text" name="name"></td></tr> 
		<tr><td>Password: </td><td><input type="password" name="password"></td></tr> 
		<tr><td></td><td><input type="submit" value="Log in"></td></tr>
	</table>
	<input type="hidden" name="sent" value="1">
</form>