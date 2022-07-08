<html lang="en">
  <!doctype html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <title>CODDING DISSCUSSION</title>

<style>
  #ques{
    min-height: 135px;
    margin-left: 10px;
  }
h4{
  font-weight: bold;
}


  .media-body{
    
    font-family: 'Roboto', sans-serif;
    font-size: 15px;
  font-weight: bold;
    
}

p{
  font-family: 'Roboto', sans-serif;
  font-weight: bold;
  font-size: 21px;

}
h1{
  font-weight: 9 00; 
  font-size: 60px;
  color: red;
}


    /* .bg{
    
    background-color: rgb(200, 245, 200);
     height: 100%; 
    width: 100%;
white    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 0.9;
  } */
  </style>
   
</head>

<body>
  <?php include 'partials/header.php'; ?>
  <div class="bg">

    <?php include 'partials/dbconnect.php'; ?>
    <?php
  $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id= $id";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
      $catname = $row['category_name'];
      $catdesc = $row['category_description'];
    }
  ?>
  <?php
 $method= $_SERVER['REQUEST_METHOD'];
  if($method == 'POST'){
    //insert into a db
    $th_title= $_POST['title']; 
    $th_desc= $_POST['desc'];
    $thread_user_id= $_POST['sno'];
   // $id = $_GET['catid'];
$sql="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$id', '   $thread_user_id', current_timestamp())";
$result = mysqli_query($conn,$sql);
$showalert = true;
if($showalert){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>your thread is added successfully!</strong> wait communit respond.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

}
 ?>
  <div class="container-fluid">

    <div class="container-fluid my-4">
      <div class="jumbotron">
      <div class="container-fluid my-2">
            
      <h1 class="py-2" >welcome to <?php echo $catname;?> discussion</h1>
            <p style="
    font-family: 'Poppins', sans-serif;
    font-size: 27px;"><?php echo $catdesc;?></p>
            <p style="
    font-family: 'Poppins', sans-serif;
    font-size: 27px;"> full information than go this</p><a href="https://www.w3schools.com/">click here</a>
            <hr class="my-4">
            <h5 class="py-2">FORUM RULE:-</h5>
            <p style="
    font-family: 'Poppins', sans-serif;
    font-size: 27px;">This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p>
           
      </div>
        </div>
    </div>
  </div>
    <div class="container-fluid" id="ques">
      <h1>Start a discussion</h1>

      <?php
//session_start();      

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  
  echo '    <form action="'. $_SERVER["REQUEST_URI"] . '" method="post">
  <div class="form-group my-3">
    <label for="Input">problem title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">keep your title as short and crisp as possible</small>
    <div class="form-group my-3">
    <label for="exampleFormControlTextarea1">ellabourate your concern</label>
    <textarea class="form-control " id="desc" name="desc" rows="3"></textarea>
    <input type = "hidden" name = "sno" value = "'.$_SESSION["sno"].'">
  </div>
  </div>
 
  
  <button type="submit" class="btn btn-primary my-3" >Submit</button>
  </form>
  </div>';
}
else{
  echo '<div class="alert alert-danger" role="alert">
  you are not login! please go and login.
</div>';
    
}
 
?>

    </div>


<hr>
    <div class="container-fluid" id="ques">
      <h1>Browse Question</h1>

<?php
  $id = $_GET['catid'];
    $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id";
    $result = mysqli_query($conn,$sql);
    $noresult= true;
    while($row = mysqli_fetch_assoc($result)){
      $noresult= false;
      
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_time = $row['timestamp'];
            $thread_user_id = $row['thread_user_id'];
            $sql2 = "SELECT username FROM `users` WHERE sno = 
            '$thread_user_id'";
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($result2);
       

 
echo     

'<u1 class="list-group">
<li class="list-group-item">
<div class="media my-3">
<img src="img/user.png" width="54px" class="mr-3" alt="...">
<div class="media-body">'.
'<h4 class="mt-0 "> <a class="text-dark " href="thread.php?threadid=' . $id. '">'. $title . ' </a></h4>
<p class="para">'. $desc . '</p> </div>'
.'<b><div class="font-weight-bold my-0"> Asked by: '. $row2[ 'username']. ' at '. $thread_time. '</div></b>'.
'</div>
</li>
</ul>'; 


}
   //echo var_dump($noresult);
if($noresult){
  echo '<div class="alert alert-danger" role="alert">
  No thread found.
</div>';
}



?>
    
  </div>
    
    <!-- Optional JavaScript; choose one of the two! -->
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bo/otstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
      -->
    
    <?php include 'partials/footer.php';?>
  </body>

</html>  