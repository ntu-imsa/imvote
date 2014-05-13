<!doctype html>
<html>
  <head>
    <title>資管好爸媽 ❤</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--    <link href="http://bootswatch.com/cyborg/bootstrap.min.css" rel="stylesheet" media="screen"> -->
    <link href="./css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="./css/angel.css" rel="stylesheet" media="screen">
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
