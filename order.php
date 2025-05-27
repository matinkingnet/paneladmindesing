
<?php

    include "heder.php";

?>


<?php
    $iddp   = $_GET['pid'];
    $etesal = mysqli_connect("localhost", "root", "P@ssw0rd123!", "myschool");
    $dastor = "SELECT * FROM product WHERE id='$iddp'";
    $result = mysqli_query($etesal, $dastor);
    $row    = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>جزئیات محصول</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6 flex items-center justify-center min-h-screen">
    <style>
        body{
            margin-top: 150px;
        }
    </style>
<!-- پنل ادمین هست -->
    <div class="bg-white rounded-2xl shadow-lg max-w-xl w-full overflow-hidden">
        <img src="image/<?php echo $row['ppic'] ?>" alt="عکس محصول" class="w-full h-64 object-cover">

        <div class="p-6">
            <h2 class="text-2xl font-bold mb-2 text-gray-800"><?php echo $row['pname']; ?></h2>

            <div class="grid grid-cols-2 gap-4 text-gray-700 text-sm mb-4">
                <div>
                    <span class="font-semibold">قیمت:</span>
                    <?php echo number_format($row['pprice']); ?> تومان
                </div>
                <div>
                    <span class="font-semibold">موجودی انبار:</span>
                    <?php echo $row['pcount']; ?>
                </div>
            </div>

            <form action="<?php     if (isset($_SESSION['login']) ) {?> submit_order.php<?php } else{ echo "login.php";}?>" method="POST" class="space-y-4">
                <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">

                <div>
                    <label for="qty" class="block text-sm font-medium text-gray-700 mb-1">مقدار سفارش:</label>
                    <input type="number" id="qty" name="qty" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <div>
                    <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">ثبت سفارش</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>

