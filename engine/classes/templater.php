<?php

class Templater 
{
	public static function render($file, $defines = array()) 
	{
		$path = SITE_ROOT. "/engine/template/". $file;
		if(!file_exists($path)) 
		{ 
			return false; 
		}
		$handle = fopen($path, "r");
		$data = fread($handle, filesize($path));
		fclose($handle);
		foreach($defines as $option => $value) 
		{
			$data = str_replace($option, $value, $data);
		}
		return $data;
	}
}

?>
