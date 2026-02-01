<?php
session_start();
require "db.php";

if ($_SERVER["REQUEST_METHOD"]=== "POST"){

	$stmt= $pdo->prepare("select * from users where username = ?");
	$stmt->execute([$_POST["username"]]);
	$user= $stmt->fetch();


	if($user && password_verify($_POST["password"],$user["password"])){
		  $_SESSION["user_id"] = $user["id"];
  		  header("Location: home.php");				 }
	else {
        	echo "بيانات الدخول غير صحيحة";
    	}
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>تسجيل الدخول</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="اسم المستخدم" required>
        <input type="password" name="password" placeholder="كلمة المرور" required>
        <button type="submit">دخول</button>
    </form>

    <div class="link">
        <a href="register.php">إنشاء حساب جديد</a>
    </div>
</div>

</body>
</html>
