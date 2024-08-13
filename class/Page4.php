<?php   
// สร้างฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
function page_navigator($before_p,$plus_p,$total,$total_p,$chk_page,$gid,$name){   
	$pPrev=$chk_page-1;
	$pPrev=($pPrev>=0)?$pPrev:0;
	$pNext=$chk_page+1;
	$pNext=($pNext>=$total_p)?$total_p-1:$pNext;		
	$lt_page=$total_p-4;
	if($chk_page>0){  
		if($gid!="") {
		echo "<a  href='?".$name."=$gid&page=$pPrev' class='naviPN'>ก่อนหน้า</a>";
		} else {
		echo "<a  href='?".$name."page=$pPrev' class='naviPN'>ก่อนหน้า</a>";
		}
	}
	if($total_p>=11){
		if($chk_page>=4){
				if($gid!="") {
					  echo "<a $nClass href='?".$name."=$gid&page=0'>1</a><a class='SpaceC'>. . .</a>";
					} else {
					echo "<a $nClass href='?".$name."page=0'>1</a><a class='SpaceC'>. . .</a>";
					}
		}
		if($chk_page<4){
			for($i=0;$i<$total_p;$i++){  
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				if($i<=4){
			 
					if($gid!="") {
					  	echo "<a $nClass href='?".$name."=$gid&page=$i'>".intval($i+1)."</a> ";  
					} else {
						echo "<a $nClass href='?".$name."=$gid&page=$i'>".intval($i+1)."</a> ";  
					}
				}
				if($i==$total_p-1 ){ 			
					if($gid!="") {					
						echo "<a class='SpaceC'>. . .</a><a $nClass href='?".$name."=$gid&page=$i'>".intval($i+1)."</a> ";  
					} else {
						echo "<a class='SpaceC'>. . .</a><a $nClass href='?".$name."=$gid&page=$i'>".intval($i+1)."</a> ";  
					}
				}		
			}
		}
		if($chk_page>=4 && $chk_page<$lt_page){
			$st_page=$chk_page-3;
			for($i=1;$i<=5;$i++){
				$nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";
			
				if($gid!="") {					
							echo "<a $nClass href='?".$name."=$gid&page=".intval($st_page+$i)."'>".intval($st_page+$i+1)."</a> ";    
					} else {
							echo "<a $nClass href='?".$name."=$gid&page=".intval($st_page+$i)."'>".intval($st_page+$i+1)."</a> ";   
					}	
			}
			for($i=0;$i<$total_p;$i++){  
				if($i==$total_p-1 ){ 
				$nClass=($chk_page==$i)?"class='selectPage'":"";				
					if($gid!="") {					
							echo "<a class='SpaceC'>. . .</a><a $nClass href='?".$name."=$gid&page=$i'>".intval($i+1)."</a> ";    
					} else {
							echo "<a class='SpaceC'>. . .</a><a $nClass href='?".$name."=$gid&page=$i'>".intval($i+1)."</a> ";   
					}	
				}		
			}									
		}	
		if($chk_page>=$lt_page){
			for($i=0;$i<=4;$i++){
				$nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";			
					if($gid!="") {					
						echo "<a $nClass href='?".$name."=$gid&page=".intval($lt_page+$i-1)."'>".intval($lt_page+$i)."</a> ";   
					} else {
						echo "<a $nClass href='?".$name."=$gid&page=".intval($lt_page+$i-1)."'>".intval($lt_page+$i)."</a> ";    
					}	
			}
		}		 
	}else{
		for($i=0;$i<$total_p;$i++){  
			$nClass=($chk_page==$i)?"class='selectPage'":"";
			
				if($gid!="") {					
						echo "<a href='?".$name."=$gid&page=$i' $nClass  >".intval($i+1)."</a> ";   
					} else {
						echo "<a href='?".$name."=$gid&page=$i' $nClass  >".intval($i+1)."</a> ";   
					}	
		}		
	} 	
	if($chk_page<$total_p-1){				
				if($gid!="") {							
						echo "<a href='?".$name."=$gid&page=$pNext'  class='naviPN'>ถัดไป</a>";
					} else {
						echo "<a href='?".$name."=$gid&page=$pNext'  class='naviPN'>ถัดไป</a>";  
					}	
	}
}   
?>