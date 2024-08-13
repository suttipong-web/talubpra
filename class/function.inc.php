<?php
	function DayName($n) {
		$arrN=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์","อาทิตย์");
		return $arrN[$n];
	}
	function MonthName($mm) {
		$arrMM=array(1=>"มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤษจิกายน","ธันวาคม");
		return $arrMM[$mm];
	}

	function ConvertToThaiDate  ($date,$short) {
		if($date){
			if($short){
				$MONTH = array("", "ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
			}else{
				$MONTH = array(1=>"มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤษจิกายน","ธันวาคม");
			}
			$dt = explode("-", $date);
			$tyear = $dt[0];
			$dt[0] = $dt[2] +0;
			$dt[1] = $MONTH[$dt[1]+0];
			$dt[2] = $tyear+543;
			$str  = join(" ", $dt);
			$pos = strpos($str,"543");
			if($pos === false ){
				return join(" ", $dt);
			}else {
				return "<font color=\"#FF0000\">ไม่ระบุ</font>";				
			}
			
			
		}else{
			return "<font color=\"#FF0000\">ไม่ระบุ</font>";
		}
	}
	function random_char($max) {
		unset($pass,$i);
		$i="";$pass="";
		$salt = "abchefghjkmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		srand((double)microtime()*1000000);
		while ($i++ < $max)
			$pass .= substr($salt, rand() % strlen($salt), 1);
		return date('Ymdhis').$pass;
	}

	function diffnow($val) {
		$x=explode(":",$val);
		$x[0]=(int)$x[0];
		$x[1]=(int)$x[1];
		if(!empty($x[0]))
			$x= "{$x[0]} ชั่วโมง";
		else
			$x= "{$x[1]} นาที";
		return $x;
	}

	function convert($number) {
	  $txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ');
	  $txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน');
	  $number = str_replace(",","",$number);
	  $number = str_replace(" ","",$number);
	  $number = str_replace("บาท","",$number);
	  $number = explode(".",$number);
	  if(sizeof($number)>2){
		return 'ทศนิยมหลายตัวนะจ๊ะ';
		exit;
	  }
	  $strlen = strlen($number[0]);
	  $convert = '';
	  for($i=0;$i<$strlen;$i++){
		$n = substr($number[0], $i,1);
		if($n!=0){
		  if($i==($strlen-1) AND $n==1){ $convert .= 'เอ็ด'; }
		  elseif($i==($strlen-2) AND $n==2){ $convert .= 'ยี่'; }
		  elseif($i==($strlen-2) AND $n==1){ $convert .= ''; }
		  else{ $convert .= $txtnum1[$n]; }
		  $convert .= $txtnum2[$strlen-$i-1];
		}
	  }
	  $convert .= 'บาท';
	  if($number[1]=='0' OR $number[1]=='00' OR $number[1]==''){
		$convert .= 'ถ้วน';
	  }else{
		$strlen = strlen($number[1]);
		for($i=0;$i<$strlen;$i++){
		  $n = substr($number[1], $i,1);
		  if($n!=0){
			if($i==($strlen-1) AND $n==1){$convert .= 'เอ็ด';}
			elseif($i==($strlen-2) AND $n==2){$convert .= 'ยี่';}
			elseif($i==($strlen-2) AND $n==1){$convert .= '';}
			else{ $convert .= $txtnum1[$n];}
			$convert .= $txtnum2[$strlen-$i-1];
		  }
		}
		$convert .= 'สตางค์';
	  }
	  return $convert;
	}
	
	function html2text($text, $pos) {
			
					
		$text = strip_tags ($text) ;
		$text = str_replace("&nbsp;", " ", trim(strip_tags($text)));
		$text = str_replace("\n", " ", $text);
		$text = str_replace("\r", " ", $text);
		//$text = str_replace("  ", "", $text);
		$pos = $pos > strlen(utf8_decode($text))?strlen(utf8_decode($text)) : $pos;
	
		$text = empty($text) ? "" : $text ;
		$pos = (int) $pos ;
		if ( strlen(utf8_decode(trim($text))) < $pos ){
			return trim($text) ;
		}
		$b = strpos(utf8_decode(trim($text)) , " " , $pos) ;
		$p = ( $b > $pos) ? strpos(trim(utf8_decode($text)), " ", $pos) + 4 : $pos ;
		$text =  mb_strimwidth(trim($text), 0, $p , "..." , "UTF-8");
			
		return $text     ;
		
	}
	
	function substr4thai($text,$len) {
		$tmp = ord(iconv_substr($text, $len-1, 1, "UTF-8"));
		if(!in_array($tmp, array(9, 32)))
			return substr4thai($text,$len+1);
		return iconv_substr($text, 0, $len+1, "UTF-8");
	}
	
	function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
	}

	
	function genPagingMain( $num_rows = 10 , $per_page = 10 , $page , $url){
		if(!$page){
			$page=1;
		}
		
		$prev_page = $page-1;
		$next_page = $page+1;
		$page_start = (($per_page*$page)-$per_page);
		if($num_rows<=$per_page){
			$num_pages =1;
		}else if(($num_rows % $per_page)==0){
			$num_pages =($num_rows/$per_page) ;
		}else{
			$num_pages =($num_rows/$per_page)+1;
			$num_pages = (int)$num_pages;
		}
		$paging = "" ; 
		for($p=1; $p<=$num_pages; $p++){
			if($p != $page){
				$paging  .=  "[ <a href='?page={$p}{$url}'>{$p}</a> ]";
			}else{
				$paging .= "<b> {$p} </b>";
			}
		}
		
		$array_paging = array();
		$array_paging["per_page"] = $per_page ;
		$array_paging["page_start"] = $page_start ;
		$array_paging["paging"] = $paging ;
		
		return $array_paging ;
	
	}
	
	function getImageInHtml($html){
		if(!empty($html)){
			$xpath = new DOMXPath(@DOMDocument::loadHTML($html));
			$src = $xpath->evaluate("string(//img/@src)");
			return $src ; 
		}else{
			return "" ;
		}
	}
	
	function countdown($datatime){
		//$datatime = '2014-12-25 13:00:00';
		$rem = strtotime($datatime) - time();
		$day = floor($rem / 86400);
		$hr  = floor(($rem % 86400) / 3600);
		$min = floor(($rem % 3600) / 60);
		$sec = ($rem % 60);				
		if($day>0){
			$day = "$day วัน ";
		}else if($hr>0){
			$day = "1 วัน ";
		}else if($min>0){
			$day = "1 วัน ";
		}else if($sec>0){
			$day = "1 วัน ";
		}else{
			$day = "NOW!!";
		}
		return $day;
	}
	
	function decodeDate($text){
		$data ="";
		if($text){
			$data = explode("-", $text);
		}
		$year=$data[0]+0;
		return $data[2].'-'.$data[1].'-'.$year;
	}
	function encodeDate($text){
		$data ="";
		if($text){
			$data = explode("-", $text);
		}
		$year=$data[2]-0;
		return $year.'-'.$data[1].'-'.$data[0];
	}
	function convertDateThaiToEng($date){
		$now = explode("-", $date);
		return $now[0]-543 .'-'.$now[1].'-'.$now[2];
	}
	function getAge($date) { // Y-m-d format
		$now = explode("-", date('Y-m-d'));
		$dob = explode("-", $date);
		$dif = $now[0] - $dob[0];
		if ($dob[1] > $now[1]) { // birthday month has not hit this year
			$dif -= 1;
		}
		elseif ($dob[1] == $now[1]) { // birthday month is this month, check day
			if ($dob[2] > $now[2]) {
				$dif -= 1;
			}
			elseif ($dob[2] == $now[2]) { // Happy Birthday!
				$dif = $dif;
			};
		};
		return $dif;
	}
  function  getURLPage() {
	$pageURL = $_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://';
$pageURL .= $_SERVER['SERVER_PORT'] != '80' ? $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"] : $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
return    $pageURL;
  }
?>