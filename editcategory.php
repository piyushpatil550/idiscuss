
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

//if($_SERVER['REQUEST_METHOD']=='POST'){
    //     $title = $_POST['cattitle'];      
    //     $desc = $_POST['catdesc'];      
    
    
    
    // $update = "UPDATE `categories` SET `category_name` = `$title` `category_description`=`$desc` WHERE `categories`.`category_id` = $id;"; 
    // $updateresult = mysqli_query($conn,$update);
    
    $id = $_GET['edit'];

    
    
    $sql = "SELECT * FROM `categories` where category_id= {$id}"; 
        $catresult = mysqli_query($conn,$sql);
        
        
        
        if(mysqli_num_rows($catresult)>0){
while($row= mysqli_fetch_assoc($catresult)){
//echo $row['category_description'];
    
    ?>

<div class="container-fluid my-4">

  <form action="adminpanal/updatedata.php" method="post">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">category title</label>
    <input type="hidden" class="form-control" value="<?php echo $row['category_id'];?>" name="catid" aria-describedby="emailHelp">
    <input type="text" class="form-control" value="<?php echo $row['category_name'];?>" id="exampleInputEmail1" name="cattitle" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">category description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1"  name="catdesc" rows="3" value=><?php echo $row['category_description'];?></textarea>
  </div>
<input type="submit" class="submit my-2"  value="update"> 
</form>
</div>

<?php
}

        }
?>
     <!-- Optional JavaScript; choose one of the two! -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!--
   ~~ <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </div>
</body>

</html>