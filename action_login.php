<?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $username = $_POST['email'];
    $password = $_POST['password'];
    $etesal   = mysqli_connect("localhost", "root", "P@ssw0rd123!", "myschool");

    $dastor = "SELECT * FROM singup WHERE name='$username'";
    $result = mysqli_query($etesal, $dastor);

    while ($row = mysqli_fetch_array($result)) {
        if ($row['name'] == "admin") {
            $_SESSION['login'] = "admin";
        ?>
                <script>
                window.location="admindesing.php";
                </script>


      <?php } else {

                  $_SESSION['login'] = "public";
              ?>

            <script>
            window.location="index.php";
            </script>

            <?php

                    }
                }
            ?>

