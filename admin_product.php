<?php

    include "heder.php";
    if (isset($_SESSION['login']) && $_SESSION['login'] == "admin") {
    ?>
    <!-- این میگه اگه لاگین == با ادمین بود وارد بشه -->



<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>فرم افزودن کالا</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-tr from-purple-400 via-pink-300 to-blue-400 min-h-screen font-sans">
    <style>
        body{
            margin-top:150px;
        }
    </style>

  <div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-2xl shadow-xl">
    <h2 class="text-3xl font-bold text-center text-gray-700 mb-6">افزودن کالا</h2>

    <form class="space-y-5" action="action_reg.php" method="post" enctype="multipart/form-data">
      <div>
        <label class="block text-gray-700 mb-1">کد کالا *</label>
        <input type="text" name="shomare" placeholder="مثلاً: 12345"
               class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required />
      </div>

      <div>
        <label class="block text-gray-700 mb-1">نام کالا *</label>
        <input type="text" name="esm" placeholder="مثلاً: لباس "
               class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required />
      </div>

      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 mb-1">موجودی کالا *</label>
          <input type="number"  name="pcount" placeholder="مثلاً: 10"
                 class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required />
        </div>
        <div>
          <label class="block text-gray-700 mb-1">قیمت کالا (ریال) *</label>
          <input type="number" name="pprice" placeholder="مثلاً: 25000000"
                 class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required />
        </div>
      </div>

      <div>
        <label class="block text-gray-700 mb-1">آپلود تصویر کالا *</label>
        <input type="file" name="pimg" class="w-full text-gray-700" required />
      </div>

      <div>
        <label class="block text-gray-700 mb-1">توضیحات تکمیلی کالا *</label>
        <textarea rows="4" name="prop" placeholder="توضیحات کامل در مورد کالا..."
                  class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
      </div>

      <div class="flex justify-between mt-6">
        <button type="reset"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded-xl">
          جدید
        </button>
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-xl">
     افزودن کالا
        </button>
      </div>
    </form>
    <?php
    // اتصال به دیتا بیس
        $etesal = mysqli_connect("localhost", "root", "P@ssw0rd123!", "myschool");
            $dastor = "SELECT * FROM product";
            $result = mysqli_query($etesal, $dastor);
        ?>

  </div>
  <div class="max-w-7xl mx-auto">
    <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">لیست محصولات</h1>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
      <table class="min-w-full border text-sm text-right">
        <thead class="bg-gray-200 text-gray-700">
          <tr>
            <th class="py-3 px-4 border">کد کالا</th>
            <th class="py-3 px-4 border">نام کالا</th>
            <th class="py-3 px-4 border">قیمت کالا</th>
            <th class="py-3 px-4 border">موجودی کالا</th>
            <th class="py-3 px-4 border">تصویر کالا</th>
            <th class="py-3 px-4 border">ابزار مدیریت</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_array($result)) {?>
          <tr class="hover:bg-gray-50">
            <td class="py-2 px-4 border"><?php echo $row['id']; ?></td>
            <td class="py-2 px-4 border"><?php echo $row['pname']; ?></td>
            <td class="py-2 px-4 border"><?php echo number_format($row['pprice']); ?> ریال</td>
            <td class="py-2 px-4 border"><?php echo $row['pcount']; ?></td>
            <td class="py-2 px-4 border">
              <img src="image/<?php echo $row['ppic']; ?>" class="w-16 h-16 object-cover rounded border" alt="تصویر">
            </td>
            <td class="py-2 px-4 border space-x-2 space-x-reverse">
              <a href="dalet.php?id=<?php echo $row['id']; ?>" class="text-red-600 hover:underline">حذف</a> |
              <a href="edit.php?id=<?php echo $row['id']; ?>" class="text-blue-600 hover:underline">ویرایش</a>
            </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>

<?php
    } else {
    ?>
  <script>
window.location="index.php";
</script>
 <?php }?>
<!-- پایان  اون if که ادمین بود وارد بشع -->