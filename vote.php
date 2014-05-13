<?php
$message = "";
$target = "";
if(isset($_GET['cid'])){
	$cid = abs($_GET['cid']);
	require './lib/facebook.php';
	require './lib/library.php';
	if(!eventEnded()){
		if(registered($user)){
			$type = typeof($cid);
			if(voted($type, $user)==0){
					$query = "SELECT cid, type, votes FROM candidate WHERE cid = '".$cid."'";
					$row = mysql_fetch_assoc(qMysql($query));
					if($row['cid']==$cid){
						$newVotes = $row['votes'] + 1;
						$query = "UPDATE candidate SET votes = ".$newVotes." WHERE cid = ".$cid;
						qMysql($query);
						$query = "UPDATE register SET voted_".$type." = ".$cid;
						qMysql($query);
						$message = '投票成功!';
						$target = 'candidate.php?type='.$type;
					}
			}else{
				// candidate does not exist
				$message = '發生錯誤噢~';
				$target = 'candidate.php';
			}
		}else{
			$message = '請登入後領票再投喔 ><';
			$target = 'join.php';
		}
	}else{
	$message = '活動時間結束囉 ><';
	$target = 'join.php';
	}
}else{
	$message = '請選擇要投誰噢 ><';
	$target = 'candidate.php';
}
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<script type="text/javascript">
		alert('<?php echo $message; ?>');
		document.location.href = '<?php echo $target; ?>';
	</script>
</head>
</html>
