<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <title>i discuss</title>
<style>

  .container{
min-height: 80vh;
  }
  </style>
  </head>

<body>
    <?php include 'partials/dbconnect.php'; ?>
    <?php include 'partials/header.php'; ?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $name= $_POST['name'];
      $phone = $_POST['phone'];
      $message = $_POST['message'];

      $sql = "INSERT INTO `contact` (`name`, `phone`, `message`, `time`) VALUES ('$name', '$phone', '$message', current_timestamp());";
     $result = mysqli_query($conn,$sql);
     
    }
?>
    <div class="container my-4">

    <h1>Lets talk about everything!</h1>
    
  <b>  Feel free to ask us anything! </b>
    <form action="contact.php" method="post">
  <div class="form-group my-4">
    <label for="exampleFormControlInput1">name</label>
    <input type="text" class="form-control" id="name" name="name" >
  </div>
  <div class="form-group my-2">
    <label for="pnonenumber">phone number</label>
    <input type="tel" class="form-control" id="phone" name= "phone">
  </div>
  <div class="form-group my-3">
    <label for="exampleFormControlTextarea3">message me</label>
    <textarea class="form-control" id="message" name= "message" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>



    <?php include 'partials/footer.php';?>
    


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>