<?php #!/usr/bin/php
	$message = "OK";
	$root = $_SERVER["CONTEXT_DOCUMENT_ROOT"];
	if ($_POST['submit'] == "OK" && $_POST['login'] != "" && $_POST['passwd'] != "")
	{
		$match = 0;
		$usr = array("login"=>$_POST['login'], "passwd"=>hash("sha256", $_POST['passwd']));
		if (file_exists($root . "/private/passwd"))
		{
			$arr = unserialize(file_get_contents($root . "/private/passwd"));
			foreach ($arr as $key => $value) {
				if ($value['login'] == $usr['login'])
					$match = 1;
			}
			if ($match == 0)
				array_push($arr, $usr);
			else
				$message = "Username has been taken\n";
		}
		else
		{
			$arr = array($usr);
			if (!(file_exists($root . "/private")))
				mkdir($root . "/private");
		}
		if ($match == 0)
			file_put_contents($root . "/private/passwd", serialize($arr)) . "\n";
	}
	else
		$message = "Incorrect values!\nLogin: " . $_POST['login'] . "\nPasswd: " . $_POST['passwd'] . "\nSubmit: " . $_POST['submit'] . "\n";
	echo $message;
?>