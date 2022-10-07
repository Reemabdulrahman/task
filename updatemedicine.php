<?php
$medicineid="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
   $medicineid=$_POST['medicineid'];
   
 

   
}
if(isset($_GET['medicineid']))
  {
    $medicineid=$_GET['medicineid'];

  }
 if($_SERVER['REQUEST_METHOD']=='POST'||isset($_GET['medicineid'])) 
 {
  include('includes/conn.php');

  $conn=$pdo->open();
   $sql="SELECT * FROM `medicines` WHERE medicine_id=:medicineid";
   $stmt = $conn->prepare($sql);
   $stmt->bindParam(':medicineid', $medicineid);

   $stmt->execute();
   $medicine=$stmt->fetch();
 

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
      if(isset($_GET['medicineid'])):
      $medicineid=$_GET['medicineid'];
    

    ?>
    <form class="p-5 w-50 mx-auto my-3" method="post" action="updatemedicine.php">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">medicine id</label>
        <input type="text"  name="medicineid" class="form-control" id="exampleFormControlInput1" placeholder="Enter medicine id" disabled value="<?php echo $medicineid?>">
      </div>


         <button class="btn btn-lg btn-info"> Select medicine </button>

    </form>
    <?php
    else:

    ?>
     <form class="p-5 w-50 mx-auto my-3" method="post" action="updatemedicine.php">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">medicine id</label>
        <input type="text" name="medicineid" class="form-control" id="exampleFormControlInput1" placeholder="Enter medicine id">
      </div>


         <button class="btn btn-lg btn-info"> Select medicine </button>

    </form>
    <?php
    endif;
    ?>

    <?php
 if($_SERVER['REQUEST_METHOD']=='POST'||isset($_GET['medicineid'])) :
 if($medicine):


    ?>
    <form class="p-5 w-50 mx-auto my-3" method="post" action="update.php">
      <div class="mb-3">
        <input type="hidden" name="medicineid" class="form-control" id="exampleFormControlInput1" placeholder="Enter medicine id" value="<?php  echo $medicine['medicine_id']?>">
      </div>
      <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">medicine name</label>
            <input type="text" name="medicinename" class="form-control" id="exampleFormControlInput1" placeholder="Enter medicine name" value="<?php  echo $medicine['medicine_name']?>">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">medicine family</label>
            <input type="text" name="medicinefamily" class="form-control" id="exampleFormControlInput1" placeholder="Enter medicine family" value="<?php  echo $medicine['medicine_family']?>">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">medicine price</label>
            <input type="text" name="medicineprice" class="form-control" id="exampleFormControlInput1" placeholder="Enter medicine price" value="<?php  echo $medicine['medicine_price']?>">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">store id</label>
            <input type="text" name="storeid" class="form-control" id="exampleFormControlInput1" placeholder="Enter store id" value="<?php  echo $medicine['store_id']?>">
          </div>
         


         <button class="btn btn-lg btn-info"> update medicine </button>

    </form>


    <?php
    else:


    ?>
    <div class="container">
      <p> no medicine with this id </p>
    </div>
        <?php
   endif;
  endif;


    ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>