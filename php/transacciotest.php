<?php
    require_once('conectar.php');
    try{
        $db->beginTransaction();
        $sql = "INSERT INTO `users`(iduser,mail,username,passHash,userFirstName,userLastName,creationDate,removeDate,lastSingIn,active) 
                VALUES('1','johndoe@educem.net','JohnDoe4488','527h4h5','John','Doe','20/10/2022',' ',' ',' ')";
        $insert = $db->query($sql);

        if(!$insert){
            echo '<p> Error: ';
            echo print_r($db->errorinfo());
            echo '</p>';
            $db->rollback();
            echo '<p>Transacció Anulada</p>';
        }else{
            $db->commit();
            echo "Les dades s'han inserit correctament";
        }
        
    }catch(PDOException $e){
        echo 'Error amb la BDs: ' . $e->getMessage();
    }
    