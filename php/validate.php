<?php
    require_once ('conectar.php');

    if(isset($_POST['login'])) {
        $email  = $_POST['email'];
        $pass   = $_POST['password'];
        $sql = 'SELECT mail, passHash, username FROM `users`';
        $usuaris = $db->query($sql);
        if($usuaris){
            foreach ($usuaris as $fila) {
        
              if($email==$fila['mail'] || $email==$fila['username']){
                if(password_verify($pass,$fila['passHash'])){
                    if(isset($_POST['remember'])){
                        setcookie('email', $email, time()+60*60*7);
                        setcookie('pass', $pass, time()+60*60*7);   
                    }
                    session_start();
                    $email=$fila['username'];
                    $_SESSION['email'] = $email;
                    header("location: welcome.php");
                } else{
                    echo "Email o Contrasenya incorrectes<br> clik aquí per tornar a intentar <a href='login.php'>AQUÍ</a>'";
                }
              } else{
                echo "Email o Contrasenya incorrectes<br> clik aquí per tornar a intentar <a href='login.php'>AQUÍ</a>'";
            }
            }
        }
        /*$consulta = "SELECT mail FROM `users` WHERE mail = {$email} AND passHash = {$pass}";
        $consulta2 = "SELECT passHash FROM `users` WHERE mail = {$email} AND passHash = {$pass}";
        //$usuaris = $db->query($sql);
        if($email == $consulta and $pass == $consulta2){
            if(isset($_POST['remember'])){
                setcookie('email', $email, time()+60*60*7);
                setcookie('pass', $pass, time()+60*60*7);
            }
            session_start();
            $_SESSION['email'] = $email;
            header("location: welcome.php");
        } else{
            echo "Email o Contrasenya incorrectes<br> clik aquí per tornar a intentar <a href='login.php'>AQUÍ</a>'";
        }*/
    } else {
        header("location: login.php");
    }
?>