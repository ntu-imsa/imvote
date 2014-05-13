<?php
require './lib/facebook.php';
require './lib/library.php';

$type = 'mom';
$linkActiveS = 2;

if(!isset($_GET['type'])||$_GET['type']!='mom'){
	$type = 'dad';
	$linkActiveS = 1;
}
$linkActive = 1;
include './lib/header.php';
?>

<?php
$voted = voted($type, $user);
$query = "SELECT * from candidate WHERE type='".$type."'";
$result = qMysql($query);
while($row = mysql_fetch_assoc($result)){ ?>
<div class="candidate-box">
<div class="candidate-name"><?php
	echo substr($row['sid'],0,3);
	echo ' ';
	echo $row['name'];
?></div>
<img class="img-circle" height="150" width="150" src="<?php echo $row['picture']; ?>">
<a role="button" class="btn <?php
if($voted == $row['cid']){
	echo 'active ';
}
if($voted == $row['cid'] || $voted== 0){
	if($type=='dad'){
		echo 'btn-primary ';
	}else{
		echo 'btn-danger ';
	}
}
if($voted != 0){
		echo 'disabled ';
}
?>vote-btn" onclick="voteConfirm('<?php echo $row['cid']."','".$row['name']; ?>')"><i class="icon-ok-sign icon-white"></i> 投給她</a>
</div>
<?php } ?>
<?php
include './lib/footer.php';
?>
