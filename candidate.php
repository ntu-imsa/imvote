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

<?php for($i=0; $i<4; $i++){ ?>
<div class="candidate-box">
<div class="candidate-name">B02 涂靖雯</div>
<img class="img-circle" height="150" width="150" src="http://graph.facebook.com/jingwen.tu/picture?type=large">
<a role="button" class="btn btn-danger vote-btn active"><i class="icon-ok-sign icon-white"></i> 投給她</a>
</div>
<?php } ?>
<?php
include './lib/footer.php';
?>
