<?php
require './lib/facebook.php';
require './lib/library.php';

$linkActive=0;
include './lib/header.php';
?>
<div class="hero-unit">
            <h1>資管好爸媽 ❤</h1>
            <p class="lead"><br>還記得小時候是誰為你念床邊故事嗎？<br>
還記得念書念到趴在桌上睡，是誰進房幫你關燈、蓋外套？<br>
上大學了，是誰在你喊肚子餓時從背包裡拿出小零嘴給你果腹？<br>
是誰在你忘記要交作業時拿出他的作業給你抄？<br>
溫馨的資管家庭，誰是你的好爸爸、好媽媽？<br>
蔚藍的天被染紅，殷紅的鮮血灑滿了整地。<br>
星期四(5/15)~星期一(5/19)，資管好爸媽，溫馨開跑 ❤</p>
            <a class="btn btn-large btn-primary" href=<?php
            if($user){
              echo '"master.php">照顧我的小主人';
            }else{
              echo '"'.$loginUrl.'">登入 Facebook';
            }
            ?></a>
        </div>
<?php
include './lib/footer.php';
?>
