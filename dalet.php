<?php

    $idd = $_GET['id'];

    $etesal = mysqli_connect("localhost", "root", "P@ssw0rd123!", "myschool");
    $dastor = "DELETE FROM `product` WHERE id='$idd'";
    Mysqli_query($etesal, $dastor);

?>
<script>

window.location="admin_product.php";

</script>
<!-- کد دلیت  -->