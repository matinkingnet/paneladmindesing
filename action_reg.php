<?php
// اتصال به دیتابیس
$shomare = $_POST['shomare'];
$esm     = $_POST['esm'];
$prop    = $_POST['prop'];
$pprice  = $_POST['pprice'];
$pcount  = $_POST['pcount'];

if ($_FILES["pimg"]["error"] != UPLOAD_ERR_OK) {
    // بررسی خطای آپلود
    echo "خطا در آپلود فایل. کد خطا: " . $_FILES["pimg"]["error"];
} else {
    // مسیر ذخیره‌سازی تصویر
    $direct = "/var/www/html/school/image/" . basename($_FILES["pimg"]["name"]);

    // انتقال فایل به پوشه مقصد
    if (move_uploaded_file($_FILES["pimg"]["tmp_name"], $direct)) {
        echo "فایل با موفقیت آپلود شد.";
    } else {
        echo "❌ خطا در انتقال فایل به پوشه مقصد.";
    }

    // اتصال به دیتابیس
    $etesal = mysqli_connect("localhost", "root", "P@ssw0rd123!", "myschool");

    // دستور SQL برای درج اطلاعات محصول
    $dastor = "INSERT INTO `product`(`id`, `pname`, `pprop`,`pprice`,`pcount`, `ppic`) VALUES ('$shomare','$esm','$prop','$pprice','$pcount','" . basename($_FILES["pimg"]["name"]) . "')";

    // اجرای دستور SQL
    if (mysqli_query($etesal, $dastor)) {
        echo "محصول با موفقیت در بانک ذخیره شد.";
    } else {
        echo "خطا در ذخیره اطلاعات در بانک: " . mysqli_error($etesal);
    }

    // بستن اتصال به دیتابیس
    mysqli_close($etesal);
}
