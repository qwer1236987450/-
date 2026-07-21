<?php
include 'con.php';
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    $user=$_COOKIE['username'];
    $pass=$_COOKIE['password'];
    $sql="select * from gbook where username='$user' and password='$pass';";
$data=mysqli_query($con,$sql);
    if($_COOKIE['username']==$user && $_COOKIE['password']==$pass){
        echo '登录成功';
    }
}else{
    header("Location:gbook.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录成功</title>
</head>
<body>
    <h1>欢迎来到首页！<?php echo $_COOKIE['username']; ?></h1>
    <p>这是一个简单的登录成功页面。</p>
    <a href="logino-out.php">退出登录</a>
</body>
</html>