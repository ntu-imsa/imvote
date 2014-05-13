<?php
require './lib/facebook.php';
require './lib/library.php';

$linkActive = 1;
$linkActiveS = 2;
include './lib/header.php';
?>
<table>
	<tr>

<?php for($i=0; $i<4; $i++){ ?>
<td>
<div class="candidate-box">
<div class="candidate-name">B02 涂靖雯</div>
<img class="img-circle" height="150" width="150" src="http://graph.facebook.com/jingwen.tu/picture?type=large">
<a role="button" class="btn btn-danger vote-btn active"><i class="icon-ok-sign icon-white"></i> 投給她</a>
</div>
</td>
<?php } ?>
</tr>
</table>
<?php
include './lib/footer.php';
?>
