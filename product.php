<?php
    include "heder.php";
?>
<!-- نمایش دادن محصول هات در بخش مهم -->
<?php
    $etesal = mysqli_connect("localhost", "root", "P@ssw0rd123!", "myschool");
    $dastor = "SELECT * FROM product";
    $result = mysqli_query($etesal, $dastor);
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>محصولات</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TailwindCSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- AlpineJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 p-6 font-sans">
    <style>
        body{
            margin-top: 150px;
        }
    </style>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto">

        <?php while ($row = mysqli_fetch_array($result)) {?>
        <div
            x-data="{ isWishlisted: false }"
            class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300"
        >
            <!-- Image -->
            <div class="relative">
                <!-- نمایش تصویر کالا -->
                <img src="image/<?php echo $row['ppic']; ?>" alt="تصویر<?php echo $row['pname']; ?>" class="h-60 w-full object-cover transition-transform duration-700 ease-in-out hover:scale-110">

                <!-- Badge -->
                <div class="absolute top-3 left-3 bg-green-600 text-white text-xs px-3 py-1 rounded uppercase font-bold">
                    جدید
                </div>

                <!-- Wishlist -->
                <button
                    @click="isWishlisted = !isWishlisted"
                    class="absolute top-3 right-3 w-9 h-9 bg-white rounded-full flex items-center justify-center shadow"
                    :class="{ 'text-red-500': isWishlisted, 'text-gray-400': !isWishlisted }"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5" viewBox="0 0 24 24">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                        2 6.42 3.42 5 5.5 5c1.54 0 3.04.99
                        3.57 2.36h1.87C13.46 5.99 14.96 5
                        16.5 5 18.58 5 20 6.42 20 8.5c0
                        3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                </button>
            </div>

            <!-- Info -->
            <div class="p-5">
                <h3 class="text-xl font-semibold text-gray-800 mb-2"><?php echo $row['pname']; ?></h3>
                <p class="text-sm text-gray-600 mb-3 line-clamp-2"><?php echo $row['pprop']; ?></p>

                <!-- Price -->
                <div class="flex items-center justify-between">
                    <span class="text-green-600 font-bold text-lg">
                        <?php echo number_format($row['pprice']); ?> تومان
                    </span>
                    <a href="order.php?pid=<?php echo $row['id']; ?>" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition text-sm">
                        سفارش
                    </a>
                </div>
            </div>
        </div>
        <?php }?>

    </div>

</body>
</html>
