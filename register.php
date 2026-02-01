<?php
require "db.php";

if($_SERVER["REQUEST_METHOD"]=== "POST"){

	$username=$_POST["username"];
	$email=$_POST["email"];
	$password=password_hash($_POST["password"], PASSWORD_DEFAULT);

	$stmt= $pdo->prepare("INSERT INTO users (username, email, password) VALUES(?,?,?)");
	$stmt->execute([$username, $email, $password]);

	header("Location: login.php");
					}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إنشاء حساب</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>إنشاء حساب</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="اسم المستخدم" required>
        <input type="email" name="email" placeholder="البريد الإلكتروني" required>
        <input type="password" name="password" placeholder="كلمة المرور" required>
        <button type="submit">تسجيل</button>
    </form>

    <div class="link">
        <a href="login.php">لديك حساب؟ تسجيل الدخول</a>
    </div>
</div>

</body>
</html>
