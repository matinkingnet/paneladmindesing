
<?php

    $link = mysqli_connect("localhost", "root", "P@ssw0rd123!", "myschool");

    if (mysqli_connect_errno()) {
        exit("erorr " . mysqli_connect_error());
    }

    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $guery = "INSERT INTO `singup`(`name`, `emil`, `password`) VALUES ('$name','$email','$password')";
    if (mysqli_query($link, $guery) === true) {
        echo("<p style='color:red;'><b>" . $realname .
            "گرامی عوضیت  شما با نام کاربری " . $username .
            "در فروشگاه با موفقیت انحام شد" . "</b></p>");

    } else {
        echo("<p style='color:blue;'><b>عغویت شما در فروشگاه انجام نشد" . "</b></p>");
}
// برای  ثبت نامه اگه کسی ثبت نام کنه از طریق این کد در دیتا بیس ثبت میشه ثبت نامش