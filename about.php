<?php
require './lib/facebook.php';
require './lib/library.php';

$linkActive=2;
include './lib/header.php';
?>
<h3>活動負責人</h3>

<div class="row-fluid">
    <div class="span2">
      <img class="img-circle" width="100px" src="https://graph.facebook.com/hsuanjung.chou/picture?type=large&width=100&height=100" alt="">
    </div>
    <div class="span4">
            <h4>周晅容</h4>
      <p>2014 資管好爸媽 負責人</p>

    </div>
</div>
<br>
<div class="row-fluid">
    <div class="span2">
      <img class="img-circle" width="100px" src="https://graph.facebook.com/100000230048556/picture?type=large&width=100&height=100" alt="">
    </div>
    <div class="span4">
            <h4>陳劭恩</h4>
      <p>2014 資管好爸媽 負責人</p>

    </div>
</div>

<h3>友情贊助</h3>

<div class="row-fluid">
    <div class="span2">
      <img class="img-circle" width="100px" src="https://graph.facebook.com/lolicon.fish/picture?type=large&width=100&height=100" alt="">
    </div>
    <div class="span4">
            <h4>虞翔皓</h4>
      <p>2014 資管好爸媽 網站製作</p>

    </div>
</div>

<?php
//echo '<pre>'; var_dump($_SESSION); echo '</pre>';
include './lib/footer.php';
?>
