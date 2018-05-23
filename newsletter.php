<?php
    // conexion
    require 'conexion/conexion.php';
    require 'funciones/funciones.php';

    if (isset($_POST['email'])){
        $email = (isset($_POST['email'])) ? $_POST['email'] : NULL;
        $ip = getRealIP();
        $created_at = date('Y-m-d H:i:s');

        if (v_email_newsletters($email) > 0)
        {
            echo 0;
        }
        else
        {
            $sql = $connection->prepare('INSERT INTO newsletters (email, ip, created_at) VALUES (:email, :ip, :created_at)');
            $data = array(
                ':email' => $email,
                ':ip' => $ip,
                ':created_at' => $created_at
            );
            try
            {
                $sql->execute($data);
                echo 1;
            }

            catch (PDOException $e)
            {
                $e->getMessage();
            }
        }
    } else {
        echo '<h1 style="text-align: center;">Quién eres tú? <br> <small>Sal de aquí o voy a infectar tu ordenador :/</small></h1>';
    }

?>
