<?php
require './lib/facebook.php';
require './lib/library.php';

if (!$user) {
  header("Location: ".$loginUrl);
}

$linkActive = 1;
$linkActiveS = 0;
include './lib/header.php';

if(!isset($_POST['stuid'])){
    $str="SELECT * FROM register WHERE fbid='".$user."';";
    $result=qMysql($str);
    $record=mysql_fetch_array($result);
    if($record[0]==''){
      if(eventEnded()){
        echo '<h4>投票截止囉!詳情請洽負責人</h4>';
        die();
      }
?>
<script type="text/javascript">
function checkForm(){
var msg="";
if(document.join.stuid.value==''){
	msg+="記得填寫學號喔!\n";
	}
if(msg==""){
	document.join.submit();
	}else{
	alert(msg);
	}
}
</script>

        <form class="form-join" method="POST" action="join.php" name="join">
          <fieldset>
            <h4>2014 資管好爸媽 領票表單</h4>
        Facebook 帳號: <br>

        <div class="row-fluid">
          <div class="span2">
            <img class="thumbnail" src="https://graph.facebook.com/<?php echo $user; ?>/picture"><br>
          </div>
          <div class="span7">
          <input type="text" value="<?php echo htmlspecialchars($user_profile['name']);?>" readonly><br>
          </div>
        </div>
        <label>學號: <input name="stuid" type="text" class="input-block-level error" placeholder="Ex: B02705020"></label>
<br>
        <input type="button" onclick="checkForm();" class="btn btn-primary" value="領票">
      </fieldset>
        </form>
<?php
  }else{
?>
<h4>領票成功 :)</h4>
<p>快快去投票吧~~</p>
<a role="button" href="candidate.php?type=dad" class="btn btn-large btn-primary">好爸爸</a>
<a role="button" href="candidate.php?type=mom" class="btn btn-large btn-danger">好媽媽</a>
<br><br>
	Facebook 帳號:
        <div class="row-fluid">
          <div class="span2">
            <img class="thumbnail" src="http://graph.facebook.com/<?php echo $user; ?>/picture"><br>
          </div>
          <div class="span7">
          <input type="text" value="<?php echo $user_profile['name'];?>" readonly><br>
          </div>
        </div>
        <label>學號: <?php echo htmlspecialchars($record['stuid']);?></label>
      </fieldset>
<?php
  }
}else{
  if($_POST['stuid']!=''){
    $_POST['stuid']=filterString($_POST['stuid']);
    $_POST['stuid']=strtolower($_POST['stuid']);

    // check if user exists in database already
    $str="SELECT fbid FROM register WHERE fbid='".$user."';";
    $result=qMysql($str);
    $record=mysql_fetch_array($result);
    if($record[0]==''){
      $str="INSERT INTO `register`(`fbid`,`fbname`,`stuid`) VALUES('".$user."','".mysql_real_escape_string($user_profile['name'])."','".$_POST['stuid']."')";
      //echo $str;
      $result=qMysql($str);
    }
      echo '
                <h4>領票成功 :)</h4>
                    <p>快快去投票吧~~</p>';
  }else{
  echo '
                <h4>報名錯誤!</h4>
                    <p>請確定每個必填欄位都要填寫喔！<a href="./join.php">點這裡</a>重新嘗試。</p>';
  }
}

include './lib/footer.php';
?>
