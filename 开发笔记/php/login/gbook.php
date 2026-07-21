
<?php
include 'con.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$user = isset($_POST['username']) ? $_POST['username'] : '';
$pass = isset($_POST['password']) ? $_POST['password'] : '';
$sql="select * from gbook where username='$user' and password='$pass';";
$data=mysqli_query($con,$sql);
if(mysqli_num_rows($data)>0){
    setcookie('username',$user,time()+3600,'/');
    setcookie('password',$pass,time()+3600,'/');
    echo "登录成功";
    header("Location:index.php");
    exit();
}else{
    echo "<script>alert('登录失败');window.location.href='gbook.php';</script>";
}
}

?>



<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录页面</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", sans-serif;
        }

        body {
            background: linear-gradient(135deg, #4158D0, #8C60E8);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background: #fff;
            width: 100%;
            max-width: 420px;
            padding: 40px 35px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            animation: fadeIn 0.5s ease forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-weight: 600;
        }

        .input-box {
            margin-bottom: 20px;
        }

        .input-box label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-size: 14px;
        }

        .input-box input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            transition: border 0.3s;
        }

        .input-box input:focus {
            border-color: #5B69E1;
        }

        .btn {
            width: 100%;
            padding: 13px;
            background: #5B69E1;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
        }

        .btn:hover {
            background: #4A57D1;
        }

        .bottom-text {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }

        .bottom-text a {
            color: #5B69E1;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>用户登录</h2>
        <form method="post">
            <div class="input-box">
                <label>用户名</label>
                <input type="text" name="username" placeholder="请输入用户名" required>
            </div>
            <div class="input-box">
                <label>密码</label>
                <input type="password" name="password" placeholder="请输入密码" required>
            </div>
            <button type="submit" class="btn">登录</button>
        </form>
        <div class="bottom-text">
            还没有账号？<a href=" ">立即注册</a >
        </div>
    </div>

</body>
</html>
