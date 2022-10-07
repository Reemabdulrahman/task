<?php

$message="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
   $medicinename=$_POST['medicinename'];
   $medicinefamily=$_POST['medicinefamily'];
   $medicineprice=$_POST['medicineprice'];
   $storeid=$_POST['storeid'];
   

   include('includes/conn.php');

   $conn=$pdo->open();
    
    

    $sql = "INSERT INTO medicines (medicine_name,medicine_family,medicine_price,store_id) VALUES (:medicinename,:medicinefamily,:medicineprice,:storeid)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':medicinename', $medicinename);
    $stmt->bindParam(':medicinefamily', $medicinefamily);
    $stmt->bindParam(':medicineprice', $medicineprice);
    $stmt->bindParam(':storeid', $storeid);
    


    $stmt->execute();
    
    $message="<br> New record created successfully  ";
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
    

    <?php
    if($message!=""):

   
    ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <?php
    echo $message;

    ?>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
else:

?>

<form class="p-5 w-50 mx-auto my-3" method="post" action="addmedicine.php">


 
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">medicine name</label>
    <input type="text" name="medicinename" class="form-control" id="exampleFormControlInput1" placeholder="Enter medicine name">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">medicine family</label>
    <input type="text" name="medicinefamily" class="form-control" id="exampleFormControlInput1" placeholder="Enter medicine duration">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">medicine price</label>
    <input type="text" name="medicineprice" class="form-control" id="exampleFormControlInput1" placeholder="Enter medicine price">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">store id</label>
    <input type="text" name="storeid" class="form-control" id="exampleFormControlInput1" placeholder="Enter store id">
  </div>
  
 <button class="btn btn-lg btn-info"> Add medicine </button>

</form>


<?php
endif;

?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>