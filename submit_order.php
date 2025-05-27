<?php

    include "heder.php";
?>

<!-- کسی که بخواد محصول خریداری کنه از اینجا کم میشه و در دیتابیس اپدیت میشه -->
<body>
    <style>
        body{
            margin: 150px;
            text-align: center;
        }
    </style>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pid = $_POST['pid'];
        $qty = intval($_POST['qty']);

        $conn = mysqli_connect("localhost", "root", "P@ssw0rd123!", "myschool");
        if (! $conn) {
            die("اتصال به دیتابیس ناموفق بود.");
        }

        // خواندن موجودی فعلی
        $query         = "SELECT pcount FROM product WHERE id='$pid'";
        $result        = mysqli_query($conn, $query);
        $row           = mysqli_fetch_assoc($result);
        $current_stock = intval($row['pcount']);

        if ($qty <= 0) {
            echo "❌ مقدار سفارش باید بیشتر از صفر باشد.";
        } elseif ($qty > $current_stock) {
            echo "❌ موجودی کافی نیست. فقط $current_stock عدد در انبار موجود است.";
        } else {
            // بروزرسانی موجودی
            $new_stock    = $current_stock - $qty;
            $update_query = "UPDATE product SET pcount='$new_stock' WHERE id='$pid'";
            if (mysqli_query($conn, $update_query)) {
                echo "✅ سفارش با موفقیت ثبت شد. موجودی جدید: $new_stock عدد.";
            } else {
                echo "❌ خطا در بروزرسانی موجودی.";
            }
        }

        mysqli_close($conn);
    } else {
        echo "درخواست نامعتبر.";
    }
?>
</body>