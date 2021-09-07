<?php
include 'bd.php';

if(empty($_POST['login']) == empty($_POST['email']) && empty($_POST['password']))
    {
        $login = htmlentities($_POST["login"]);
        $email = htmlentities($_POST["email"]);
        $password = htmlentities($_POST["password"]);

        $stmt = $pdo->query('SELECT * FROM data_fields')->fetchAll(PDO::FETCH_ASSOC);
            foreach ($stmt as $value)
                {
                    if($login !== $stmt['login'] && $login !== end($stmt[array_key_last($stmt)]['login'])
                        && $email !== $stmt['email'] && $email !== end($stmt[array_key_last($stmt)]['email'])) {
                        $stmt1 = $pdo->prepare("INSERT INTO data_fields (login,email,password) 
                        VALUE (?,?,?)");

                        $stmt1->execute([$login,$email,md5($password)]);
                    }







                }

    }




?>

<html>
<head>

</head>
<body>
<div style="border:  solid aqua;height: 125px;width: 250px">
<form action="register.php" method="post">
<p>Логин <input type="text" name="login"> </p>
<p>Эмаил <input type="email" name="email"> </p>
<p>Пароль <input type="password" name="password"> </p>
<p> <input type="submit" value="Отправить"></p>
</div>
</form>
</body>
</html>
