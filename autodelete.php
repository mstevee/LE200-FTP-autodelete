<?php
$folder = array('snap', 'record', 'saved');
$dir = 'LUPUSNET-LE200_C4D6553F6973/';//select the direction where are the subfolder (snap,record and saved) are stored
$date_allowed[] = date("Ymd", mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));//save files, because of a issue with different time-zones between LE200 and the server
$date_allowed[] = date("Ymd", mktime(0, 0, 0, date("m")  , date("d"), date("Y")));  //save files, which are from today
$date_allowed[] = date("Ymd", mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));//save files, which are 1 days old
$date_allowed[] = date("Ymd", mktime(0, 0, 0, date("m")  , date("d")-2, date("Y")));//save files, which are 2 days old
$date_allowed[] = date("Ymd", mktime(0, 0, 0, date("m")  , date("d")-3, date("Y")));//save files, which are 3 days old
foreach($folder as $fname){
	$files = scandir($dir.$fname);
	foreach($files as $file){
		$file1 = split('_', $file);
		$file1 = split('-', $file1[1]);
		if(in_array($file1[0], $date_allowed)){
		}else{
			unlink($dir.$fname.'/'.$file);
		}
	}
}
