<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
   $medicineid=$_POST['medicineid'];
   $medicinename=$_POST['medicinename'];
   $medicinefamily=$_POST['medicinefamily'];
   $medicineprice=$_POST['medicineprice'];
   $medicineid=$_POST['medicineid'];
  

   include('includes/conn.php');

   $conn=$pdo->open();
    
    
 
    $sql = "UPDATE `medicines` SET `medicine_name`=:medicinename,`medicine_family`=:medicinefamily,`medicine_price`=:medicineprice,`store_id`=:storeid WHERE `medicine_id`=:medicineid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':medicineid', $medicineid);
    $stmt->bindParam(':medicinename', $medicinename);
    $stmt->bindParam(':medicinefamily', $medicinefamily);
    $stmt->bindParam(':medicineprice', $medicineprice);
    $stmt->bindParam(':storeid', $storeid);
    


    $stmt->execute();


    $conn=$pdo->close();
    header('Location:viewmedicine.php');
   

    

    }

?>