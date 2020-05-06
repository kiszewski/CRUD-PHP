<?php
if (isset($_GET['userId'])) {
    $id = $_GET['userId'];
    $resultado = User::deletar($id);
 
   header('Location: users.php');
}