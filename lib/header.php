<!doctype html>
<html>
  <head>
    <title>資管好爸媽 ❤</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--    <link href="http://bootswatch.com/cyborg/bootstrap.min.css" rel="stylesheet" media="screen"> -->
    <link href="./css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="./css/angel.css" rel="stylesheet" media="screen">
    <?php
     if(isset($linkActive)&&$linkActive==1){
    ?>
    <script type="text/javascript">
    function voteConfirm(cid, name){
      if(window.confirm('你確定要投給 ' + name + ' 嗎?')){
        document.location.href='vote.php?cid='+cid;
      }else{
        return false;
      }
    }
    </script>
    <?php
     }
    ?>
  </head>
  <body>
  <div class="container-narrow">

        <div class="masthead">
            <ul class="nav nav-pills pull-right">
              <?php
              $linkName=array("首頁","投票","關於",$loginText);
              $linkHref=array("./","join.php","about.php",$loginUrl);
              for($i=0;$i<sizeof($linkName);$i++){
                echo '<li';
                if(isset($linkActive)&&$i==$linkActive){
                  echo ' class="active"';
                }
                echo '><a href="'.$linkHref[$i].'">'.$linkName[$i].'</a></li>';
              }
              ?>
            </ul>
            <h3 class="muted">資管好爸媽 ❤</h3>
        </div>

        <hr>
<?php
if(isset($linkActiveS)){
?>
<ul class="nav nav-tabs">
<?php
$linkName=array("領票","好爸爸","好媽媽");
$linkHref=array("join.php","candidate.php?type=dad","candidate.php?type=mom");
for($i=0;$i<sizeof($linkName);$i++){
  echo '<li';
  if(isset($linkActiveS)&&$i==$linkActiveS){
    echo ' class="active"';
  }
  echo '><a href="'.$linkHref[$i].'">'.$linkName[$i].'</a></li>';
}

  if($eventEnded){
    echo '<li><a href="result.php">結果</a></li>';
  }
  ?>
</ul>
<?php
}
?>
