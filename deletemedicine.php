<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
   $medicineid=$_POST['medicineid'];

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

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <?php
    include('includes/navbar.php');
    ?>
    <form class="p-5 w-50 mx-auto my-3" method="post" action="deletemedicine.php">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">medicine id</label>
        <input type="text" name="medicineid" class="form-control" id="exampleFormControlInput1" placeholder="Enter medicine id">
      </div>
     
         <button class="btn btn-lg btn-info"> delete medicine </button>

    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>