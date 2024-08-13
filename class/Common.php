<?php
	class Common {
		// format MySQL DateTime (YYYY-MM-DD hh:mm:ss) using date()
		function FormatDate($format, $datetime) {
			$year = substr($datetime, 0, 4);
			$month = substr($datetime, 5, 2);
			$day = substr($datetime, 8, 2);
			$hour = substr($datetime, 11, 2);
			$min = substr($datetime, 14, 2);
			$sec = substr($datetime, 17, 2);
			return date($format, mktime($hour, $min, $sec, $month, $day, $year));
		}
		
		private $day = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
		private $month = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
		
		// format MySQL DateTime (YYYY-MM-DD hh:mm:ss) using date()
		function FormatDateThai($datetime, $style = 1) {
			if($datetime) {
				$year = substr($datetime, 0, 4) + 543;
				$month = substr($datetime, 5, 2);
				$day = substr($datetime, 8, 2);
				$hour = substr($datetime, 11, 2);
				$min = substr($datetime, 14, 2);
				$sec = substr($datetime, 17, 2);
				
				switch($style) {
					case 1:
						return $day."/".$month."/".$year." ".$hour.":".$min;
						break;
					case 2:
						return $day."/".$month."/".$year;
						break;
					case 3:
						return $day." ".$this->month[$month - 1]." ".$year;
						break;
					case 4:
						return $hour.":".$min;
						break;
				}
			}
			else {
				return "";
			}
		}
		
		// format Thai DateTime (DD/MM/YYYY hh:mm) using date()
		function t2eDate($datetime) {
			$day = substr($datetime, 0, 2);
			$month = substr($datetime, 3, 2);
			$year = substr($datetime, 6, 4) - 543;
			if(strlen($datetime) > 10) {
				$hour = substr($datetime, 11, 2);
				$min = substr($datetime, 14, 2);
				return date("Y-m-d H:i:s", mktime($hour, $min, 0, $month, $day, $year));
			}
			else {
				return date("Y-m-d H:i:s", mktime(0, 0, 0, $month, $day, $year));
			}
		}
		
		function SQLText($text) {
			$text = str_replace("\'", "'", $text);
			return mysql_escape_string($text);
		}
		
		function UniqueRands($min, $max, $keys) {
			static $retval = array();
			$x = rand($min,$max);
			if(!in_array($x,$retval)){
				array_push($retval, $x);
			}
			if($keys > count($retval)){
				$this->UniqueRands($min, $max, $keys);
			}
			return $retval;
		}
		
		function isImage($filename) {
			$types = array(".gif", ".jpg", ".bmp", ".png");
			$ext = substr($filename, strrpos($filename, "."));
			foreach ($types as $type) {
				if($ext == $type) {
					return true;
				}
			}
			return false;
		}
		
		function html_remove($text) {
			$keys = array(
								"&nbsp;" => "",
								"&amp;nbsp;" => "",
								"&quot;" => "\"",
								"&amp;quot;" => "\"",
								"&amp;gt;" => "&gt;",
								"&amp;&lt;" => "&lt;"
			);
			
			foreach($keys as $key => $value) {
				$text = str_replace($key, $value, $text);
			}
			
			return $text;
		}
		
		function makedir_blog()
		{
			if(!is_dir($_SERVER['DOCUMENT_ROOT']."/images/blog/".$_SESSION["blog_url"]))
				mkdir($_SERVER['DOCUMENT_ROOT']."/images/blog/".$_SESSION["blog_url"], 0777);
			if(!is_dir($_SERVER['DOCUMENT_ROOT']."/images/blog/".$_SESSION["blog_url"]."/Image"))
				mkdir($_SERVER['DOCUMENT_ROOT']."/images/blog/".$_SESSION["blog_url"]."/Image", 0777);
		}
	}
?>