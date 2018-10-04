#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$output = 0;
		$arr = preg_split('/\s+/', $argv[1]);
		foreach ($arr as $key => $value) {
			if (strlen($value) > 1)
			{
				$output++;
				if ($key != 0)
					echo " ";
				echo $value;
			}
		}
		if ($output > 0)
			echo "\n";
	}
?>