<?php
include 'bd.php';
if (empty($_POST['login']) == empty($_POST['email']) && empty($_POST['email'])) {
    $login = htmlentities($_POST["login_email"]);
    $password = htmlentities($_POST["password"]);
    $stmt = $pdo->query('SELECT * FROM data_fields')->fetchAll(PDO::FETCH_ASSOC);
    foreach ($stmt as $value) {



        for ($i = 0; $i < count($stmt); $i++) {


            if ($login == $stmt[$i]['login'] || $login == $stmt[$i]['email']) {
                echo $stmt[$i]['password'];
                if (md5($password) == $stmt[$i]['password']) {
                    setcookie('login', $stmt[$i]['login']);


                }

            }

        }



    }
}

?>

<html>
<head>

</head>
<body>
<a href="register.php">Регистрация</a>
<?= $_COOKIE['login']; ?>
<form action="index.php" method="post" >
<p> <input type="login" name="login_email"></p>
<p><input type="password" name="password"></p>
<p> <input type="submit" value="Отправить"></p>
</form>
</body>
</html>
