<?php  
function getBrowser() {
		$useragent = $_SERVER["HTTP_USER_AGENT"];
		$matched = "";
		if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
		    $browser_version=$matched[1];
		    $browser = "IE";
		} elseif (preg_match( '|Opera ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
		    $browser_version=$matched[1];
		    $browser = "Opera";
		} elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
		        $browser_version=$matched[1];
		        $browser = "Firefox";
		} elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
		        $browser_version=$matched[1];
		        $browser = "Chrome";
		} elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
		        $browser_version=$matched[1];
		        $browser = "Safari";
		} else {
		    $browser_version = "";
		    $browser= "Other";
		}

		return trim("{$browser} {$browser_version}");
	}


function getOS() {
		$OSList = array(
						        'Windows 3.11' => 'Win16',
						        'Windows 95' => '(Windows 95)|(Win95)|(Windows_95)',
						        'Windows 98' => '(Windows 98)|(Win98)',
						        'Windows 2000' => '(Windows NT 5.0)|(Windows 2000)',
						        'Windows XP' => '(Windows NT 5.1)|(Windows XP)',
						        'Windows Server 2003' => '(Windows NT 5.2)',
						        'Windows Vista' => '(Windows NT 6.0)',
						        'Windows 7' => '(Windows NT 6.1)',
						        'Windows NT 4.0' => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',
						        'Windows ME' => 'Windows ME',
						        'QNX' => 'QNX',
						        'BeOS' => 'BeOS',
						        'OS/2' => 'OS/2',
								'Android' => '(Android)',
								'iPhone' => '(iPhone)',
								'iPad' => '(iPad)',
								'Black Berry' => '(BlackBerry)',
								'Symbian' => '(Symbian)',
								'Mobile' => '(J2ME/MIDP)|(Profile/MIDP)|(SAMSUNG)',
						        'Mac OS' => '(Mac_PowerPC)|(Macintosh)|(Mac)',
						        'Open BSD' => 'OpenBSD',
						        'Sun OS' => 'SunOS',
						        'Linux' => '(Linux)|(X11)',
						        'Search Bot'=>'(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp)|(MSNBot)|(Ask Jeeves/Teoma)|(ia_archiver)'
							);

		foreach($OSList as $CurrOS=>$Match) {
		        if (eregi($Match, $_SERVER['HTTP_USER_AGENT'])) break;
		}
		return $CurrOS;
	}
?>