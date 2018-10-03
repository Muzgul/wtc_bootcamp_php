#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		if (file_exists($argv[1]))
		{
			$str = file_get_contents($argv[1]);
			$tags = preg_split("/</", $str);
			$output = "";
			foreach ($tags as $key => $value) {
				if ($value[0] == 'a')
				{
					$tmp = preg_split("/>/", $value);
					$tmp[1] = strtoupper($tmp[1]);
					$value = $tmp[0] . ">" . $tmp[1];
				}
				$tmp = preg_split("/title=/", $value);
				if (count($tmp) > 1)
				{
					echo $vaue . "\n";
					$title = preg_split("/\"/", $tmp[1]);
					$title[1] = strtoupper($title[1]);
					$tmp[1] = $title[0] . '"' . $title[1] . '"' . $title[2];
					$value = $tmp[0] . "title=" . $tmp[1];
				}
				$output = $output . "<" . $value;
			}
			echo $output;
		}
		else
			echo "File not found!\n";
	}
?>