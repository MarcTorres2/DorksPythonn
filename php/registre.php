<?php
  require('conectar.php');
  $be=false;
  if($_SERVER["REQUEST_METHOD"] == 'POST') //comprovem la informacio que ens envian per pantalla
  {
      if($_POST["password"]==$_POST["confirm_password"])
      {
        $nom=filter_input(INPUT_POST,'first_name');
        $cognom=filter_input(INPUT_POST,'last_name');
        $username=filter_input(INPUT_POST,'username');
        $email=filter_input(INPUT_POST,'email');
        $pass=filter_input(INPUT_POST,'password');
        $be=true;
      }
  }
if($be){
        $db->beginTransaction();
        $select='SELECT * FROM users WHERE mail=:mail OR username=:user';
        $pas = $db->prepare($select);
        $pas->execute(array(':mail' => $email,':user' => $username));
        $malament=false;
        if(($pas->rowCount())>0)$malament=true;
            if($malament==false)
            {
                $hash=password_hash($pass,PASSWORD_DEFAULT);
                $sql= "INSERT INTO users(mail,username,passHash,userFirstName,userLastName) 
                VALUES(:mail,:username,:passHash,:userFirstName,:userLastName)";
                $insert = $db->prepare($sql);
                $insert -> execute(array(':mail'=>$email,':username'=>$username,':passHash'=>$hash,':userFirstName'=>$nom,':userLastName'=>$cognom));
                //$insert = $db->query($sql);
                $db->commit();
                header("Location: login.php");
            }
            else {
              $db->rollback();
              echo "Alguna cosa ha fallat";
          }
        }
        else
        {
            $malament=true;
        } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Bootstrap Simple Registration Form</title>
    <link rel="stylesheet" href="../css/registre.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</header>
<body>
    <div class="signup-form">
        <form action="registre.php" method="post">
            <h2>Cinetics</h2>
            <p class="hint-text">Create una cuenta para registrarte en Cinetics</p>
            <div class="form-group">
                <input type="Username" class="form-control" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="first_name" placeholder="First Name" required="optional">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" required="optional">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
            </div>
            <div class="form-group">
                <label class="form-check-label">
                    <input type="checkbox" required="required"> I accept the
                    <a href="#">Terms of Use</a> &amp;
                    <a href="#">Privacy Policy</a>
                </label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
            </div>
        </form>
        <a href="index.php" style="color: rgb(0, 0, 0)" >Already have an account?</a>
        </div>
    </div>
</body>