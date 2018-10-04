#!/usr/bin/php
<?php
	date_default_timezone_set("Europe/Paris");
	$bin = file_get_contents("/var/run/utmpx");
	$user = get_current_user();
	$who = [];
	while ($bin)
	{
		$arr = unpack("A256user/A4id/A32line/ipid/itype/lsec/lusec/A256host/A64pad", $bin);
		if (strcmp($arr[user], $user) == 0)
		{
			$month = date("M", $arr[sec]);
			$day = date("j", $arr[sec]);
			$time = date("H:i", $arr[sec]);
			$entry = array($arr[user], $arr[line], $month, $day, $time);
			array_push($who, $entry);
		}
		$bin = substr($bin, 628);
	}
	foreach ($who as $key => $v) {
		echo "$v[0] $v[1]  $v[2]  $v[3] $v[4]\n";
	}
?>