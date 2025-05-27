<?php

    include "heder.php";
    if (isset($_SESSION['login']) && $_SESSION['login'] == "admin") {
        // اینجا میگه اگه ادمین بود وارد بشه
    ?>


</body>
</html>
<?php
    } else {
    ?>
  <script>
window.location="index.php";
</script>
 <?php }?>
<!-- پایان if -->]
 <!-- کد html`میگه که اگه با ادمین وارد شود همون خوش امدی ادمین رو نمایش میده همین -->