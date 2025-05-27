<?php
    include "heder.php";
    $connection = mysqli_connect("localhost", "root", "P@ssw0rd123!", "myschool");

    $success = false;

    // گرفتن اطلاعات اولیه محصول
    if (isset($_GET['id'])) {
        $id      = $_GET['id'];
        $query   = "SELECT * FROM product WHERE id='$id'";
        $result  = mysqli_query($connection, $query);
        $product = mysqli_fetch_array($result);
    }

    // اگر فرم ارسال شد
    if (isset($_POST['update'])) {
        $id     = $_POST['id'];
        $pname  = $_POST['pname'];
        $pprop  = $_POST['pprop'];
        $pprice = $_POST['pprice'];
        $pcount = $_POST['pcount'];

        // عکس
        if ($_FILES['ppic']['name'] != '') {
            $imgName = $_FILES['ppic']['name'];
            $tmpName = $_FILES['ppic']['tmp_name'];
            $path    = "uploads/" . time() . "_" . $imgName;

            move_uploaded_file($tmpName, $path);
        } else {
            $path = $_POST['oldpic'];
        }

        // آپدیت در دیتابیس
        $updateQuery = "UPDATE product SET
        pname='$pname',
        pprop='$pprop',
        pprice='$pprice',
        pcount='$pcount',
        ppic='$path'
        WHERE id='$id'";

        if (mysqli_query($connection, $updateQuery)) {
            $success = true;

            // به‌روزرسانی متغیر $product برای نمایش جدید
            $product = [
                'id'     => $id,
                'pname'  => $pname,
                'pprop'  => $pprop,
                'pprice' => $pprice,
                'pcount' => $pcount,
                'ppic'   => $path,
            ];
        }
    }
?>
 <!-- htmlمیگه اگه اینابود بیا ادیت رو نمایش بده و ویرایشش کن -->
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ویرایش محصول</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6 font-sans">
    <style>
        body{
            margin-top: 150px;
        }
    </style>
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-center">ویرایش محصول</h2>

        <?php if ($success): ?>
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4 text-center">
                تغییرات با موفقیت ذخیره شد.
            </div>
            <script>
    window.location.href="admin_product.php"
</script>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" class="space-y-4">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <input type="hidden" name="oldpic" value="<?php echo $product['ppic']; ?>">

            <div>
                <label>نام محصول:</label>
                <input type="text" name="pname" value="<?php echo $product['pname']; ?>" class="w-full border rounded p-2">
            </div>

            <div>
                <label>توضیحات:</label>
                <textarea name="pprop" class="w-full border rounded p-2"><?php echo $product['pprop']; ?></textarea>
            </div>

            <div>
                <label>قیمت:</label>
                <input type="text" name="pprice" value="<?php echo $product['pprice']; ?>" class="w-full border rounded p-2">
            </div>

            <div>
                <label>تعداد:</label>
                <input type="text" name="pcount" value="<?php echo $product['pcount']; ?>" class="w-full border rounded p-2">
            </div>

            <div>
                <label>عکس فعلی:</label><br>
                <img src="<?php echo $product['ppic']; ?>" class="h-32 mb-2 rounded">
            </div>

            <div>
                <label>تغییر عکس:</label>
                <input type="file" name="ppic" class="w-full border rounded p-2">
            </div>

            <div>
                <button type="submit" name="update" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    ذخیره تغییرات
                </button>
            </div>
        </form>
    </div>
</body>
</html>

