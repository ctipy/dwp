<?php
// conexion
require 'conexion/conexion.php';
require 'funciones/funciones.php';

if (isset($_POST)){

    $name = (isset($_POST['name'])) ? $_POST['name'] : NULL;
    $lastname = (isset($_POST['lastname'])) ? $_POST['lastname'] : NULL;
    $email = (isset($_POST['email'])) ? $_POST['email'] : NULL;
    $whatsapp = (isset($_POST['whatsapp'])) ? $_POST['whatsapp'] : NULL;
    $subjet = (isset($_POST['subjet'])) ? $_POST['subjet'] : NULL;
    $message = (isset($_POST['message'])) ? $_POST['message'] : NULL;
    $ip = getRealIP();
    $created_at = date('Y-m-d H:i:s');

    if ($name != NULL AND $lastname != NULL AND $email != NULL AND $whatsapp != NULL AND $subjet != NULL AND $message != NULL)
    {
        echo 0;
    }
    else
    {
        $sql = $connection->prepare('INSERT INTO mensajes (`name`, `lastname`, `email`, `whatsapp`, `subjet`, `message`, `ip`, `created_at`) VALUES (:name, :lastname, :email, :whatsapp, :subjet, :message, :ip, :created_at)');
        $data = array(
            ':name' => $name,
            ':lastname' => $lastname,
            ':email' => $email,
            ':whatsapp' => $whatsapp,
            ':subjet' => $subjet,
            ':message' => $message,
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
