<?php
	$output = [];
	if ($argc > 1)
	{
		$str = $argv[1];
		$sparr = explode(' ', $str);
		foreach ($sparr as $key => $value) {
			$value = trim($value);
			if (strlen($value) > 0)
			{
				$tbarr = explode('\t', $value);
				foreach ($tbarr as $key => $value) {
					$value = trim($value);
					if (strlen($value) > 0)
						array_push($output, $value);
				}
			}
		}
		foreach ($output as $key => $value) {
			if ($key != 0)
				echo " ";
			echo $value;
		}
		echo "\n";
	}
?>