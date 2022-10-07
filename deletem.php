<?php

if(isset($_GET['medicineid']))
{
   $medicineid=$_GET['medicineid'];

   include('includes/conn.php');

   $conn=$pdo->open();

    $sql="DELETE FROM `medicines` WHERE `medicine_id`=:medicineid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':medicineid', $medicineid);

    $stmt->execute();
    
    header('Location:viewmedicine.php');

    $pdo->close();
    }

?>