<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CODDING DISSCUSSION</title>
 <style>
     #main{
         min-height: 100vh;
     }
 </style>


  </head>

<body >
    <?php include 'partials/header.php'; ?>
    <?php include 'partials/dbconnect.php'; ?>
<!-- search result -->
<div class="container my-3" id="main">
    <h1>search results for <?php echo $_GET['search']?> </h1>
    <?php
    $query = $_GET['search'];
     $sql = "select * from threads where match (thread_title,thread_desc) against ('$query')";
     $result = mysqli_query($conn,$sql);
     $noresult= true;
     while($row = mysqli_fetch_assoc($result)){
       $noresult= false;
       
             $id = $row['thread_id'];
             $title = $row['thread_title'];
             $desc = $row['thread_desc'];
             $url = "thread.php?threadid=".$id;
     echo  '<div class="result">
             <h3><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
    <p>'.$desc.'</p>
</div>';
     }
     if($noresult){
       echo '<div class="jumbotron jumbotron-fluid">
       <div class="container" style="background-color: grey; color: white;","text-align: left">
       <h1 class="display-4">NO Result Found</h1>
       <p class="lead">
       Suggestions:
       <ul>
       <li>Make sure that all words are spelled correctly.</li>
       <li>Try different keywords.</li>
       <li>Try more general keywords.</li>
       <li>Try fewer keywords.</li>
       </ul>
       </p>
       </div>
       </div>';
     }
     ?>
</div>

    <?php include 'partials/footer.php';?>
    
    
    
    <!-- Optional JavaScript; choose one of the two! -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!--
   ~~ <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </div>
</body>

</html>