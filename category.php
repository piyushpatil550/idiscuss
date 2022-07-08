




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>admin panal</title>
 


  </head>

<body >
    <?php include 'adminpanal/adminheader.php'; ?>
    <?php include 'adminpanal/databconnect.php'; ?>
    <?php
  // session_start();
 if(!isset($_SESSION['loggedin'])){
  header("location: adminlogin.php");
  exit;
}
?>
    <?php    


if($_SERVER['REQUEST_METHOD'] == "POST"){




  
  $title = $_POST['cattitle'];    
  $desc = $_POST['catdesc'];  
  
  
  $sql= "INSERT INTO `categories` ( `category_name`, `category_description`, `created`) VALUES ('$title', '$desc', current_timestamp())";
  $result = mysqli_query($conn,$sql);  
  
  //check wheater this email exists
//   $sql2 = "SELECT * FROM `categories`"; 
//   $catresult = mysqli_query($conn,$sql2);
//$numrows = mysqli_num_rows($catresult);

}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    //$mysqli->query("DELETE FROM categories where id= $id") or die($mysqli->error());

    $delete = "DELETE FROM `categories` WHERE `categories`.`category_id` = $id"; 
    $deleteresult = mysqli_query($conn,$delete);
 
    
}

?>

<div class="container-fluid">

  <form action="<?php $_php_self ?>" method="post" style="margin-top: 20px;">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">category title</label>
    <input type="text" class="form-control"  id="exampleInputEmail1" name="cattitle" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">category description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1"  name="catdesc" rows="3"></textarea>
  </div>
 
  <button type="submit" class="btn btn-primary" style="margin-top: 23px;">Submit</button>
</form>
</div>

<div class="row justify-content-center"></div>
<table class="table" style="margin-top: 30px;">
    <thead>
        <tr>
            <th>cat title</th>
            <th>cat desc</th>
            <th colspan="2">ACTION</th>
        </tr>    
    </thead>    
    <?php

$sql2 = "SELECT * FROM `categories`"; 
    $catresult = mysqli_query($conn,$sql2);
    
//     if($_SERVER['REQUEST_METHOD']=='POST'){
//     if(isset($_GET['edit'])){
//         $id = $_GET['edit'];
//    $title = $_POST['cattitle'];      
//    $desc = $_POST['catdesc'];      
   
// $update = "UPDATE `categories` SET `category_name` = `$title` `category_description`=`$desc` WHERE `categories`.`category_id` = $id;"; 
// $updateresult = mysqli_query($conn,$update);
   
     
// }

// }
   // while($row = $catresult->fetch_assoc()):
  while($row = mysqli_fetch_assoc($catresult)){  
    echo "<tr>
        <td> ".$row['category_name']."</td>
        <td> ".$row['category_description']."</td>
        
        <td>
           <a href='editcategory.php?edit=".$row['category_id']."' class='btn btn-info'>EDIT</a>
     <a href='category.php?delete=".$row['category_id']."'  class='btn btn-danger'>DELETE</a>
     </td> 
        
        </tr>";
    }
    ?>
  
</table>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!--
   ~~ <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </div>
</body>

</html>

