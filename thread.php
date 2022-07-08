<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">

<style>
  #ques{
    min-height: 200px;
   }
  .jumbotron{
    color: black;
    background-color: whitesmoke;
    padding: 40px;
    }
    #footer{
      margin-top: 110px;
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
    
    background-color: rgb(214, 221, 226);
    height: 100%;
    width: 100%;
    position: relative;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 1;
  } */
</style>
    <title>programming discussion</title>
</head>

<body>
  <?php include 'partials/header.php'; ?>
  <div class="bg">

    <?php include 'partials/dbconnect.php'; ?>
  <?php
  
  $id = $_GET['threadid'];
  
    $sql = "SELECT * FROM `threads` WHERE thread_id= $id";
    $result = mysqli_query($conn,$sql);
    $noresult= true;
    while($row = mysqli_fetch_assoc($result)){
      $noresult= false;
  
      $title = $row['thread_title'];
      $desc = $row['thread_desc'];
      $thread_user_id = $row['thread_user_id'];
     


      //its help we can take user name which currently login
$sql2 = "SELECT username FROM `users` WHERE sno ='$thread_user_id'";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);
$postedby = $row2['username'];
    
}
    
 
 
 
    
  ?>
    <?php
    $showalert = false;
    $method= $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
    $comment= $_POST['comment'];
    $comment= str_replace("<","&lt;",$comment);
    $comment= str_replace(">","&gt",$comment);



    $sno= $_POST['sno'];

    $sql="INSERT INTO `comment` (`comment_content`, `thread_id`,`comment_by`, `comment_time`) VALUES ('$comment', '$id','$sno' ,current_timestamp())";
    $result= mysqli_query($conn,$sql);
    $showalert = true;
    if($showalert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>your thread has been added successfully! please wait community respond</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    }
  }
    
    ?>
  
      <div class="container-fluid my-4" >
      <div class="jumbotron">
            <b><h1><?php echo $title;?></h1></b>
            <p><?php echo $desc;?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p>
            <p>
    
  </p>
            <p><b><?php echo "post by:- $postedby"; ?></b></p>
        </div>
    </div>

    
    <div class="container-fluid" id="ques">
      <h1>post a comment</h1>

  <?php
// session_start();  
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
 
 echo '
    <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
 
    <div class="form-group my-3">
    <label for="exampleFormControlTextarea1">Type your comment</label>
    <textarea class="form-control " id="comment" name="comment" rows="3"></textarea>
    <input type = "hidden" name = "sno" value = "'.$_SESSION["sno"].'">
    </div>
  
  <button type="submit" class="btn btn-primary " >post a comment</button>
</form>';
}
else{
   echo '<div class="alert alert-danger mt-2" role="alert">
   you are not login! please go and login.
 </div>';
   
}

?>
    </div>  

    <div class="container-fluid my-4"  id="ques">
      <h1>discussion</h1>
      <?php
  
  $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comment` WHERE thread_id = $id";
    $result = mysqli_query($conn,$sql);
    $noresult= true;
    while($row = mysqli_fetch_assoc($result)){
    $noresult= false;

      
      $id = $row['comment_id'];
      $content = $row['comment_content'];
      $commenttime = $row['comment_time'];
      $commentby = $row['comment_by'];

      $sql2 = "SELECT username FROM `users` WHERE sno = 
      '$commentby'";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);
 
 
echo     ' <div class="media my-3">
      <img src="img/user.png" width="50px" class="mr-3" alt="...">  
  
      <div class="media-body">
      <h4 class=" font-weight-bcold mt-0">'.$row2[ 'username'].' at '.$commenttime.'</h4>
  <p> '.$content.'</p>
  </div>
  </div>';
}
// echo var_dump($noresult);
if($noresult){
  echo '<div class="jumbotron jumbotron-fluid">
  <div class="container text-center">
  <h1 class="display-4">NO Result Found</h1>
  <p class="lead">Be the first user to ask a question</p>
  </div>
  </div>';
}
?>
    </div>
    
    <?php include 'partials/footer.php';?>
    
    
    


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
     <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bo/otstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </div>
</body>

</html>  