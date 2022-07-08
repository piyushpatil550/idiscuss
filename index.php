<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    
    <title>PROGRAMMING DISSCUSSION</title> 
    <style>

.btn{
    
    background: linear-gradient(to bottom, pink 21%,pink 100%);
    cursor: pointer;
    border-radius: 5px;
    color: darkmagenta;
    font-weight: bold;
    border-radius: 17px;
}
    .card {
    text-align: center;
     
    background: linear-gradient(to bottom, white 0%,rgb(143, 55, 216) 100%);
    transition-property: all;
    transition-duration: 1s;
    transition-timing-function: ease-in;
    transition-delay: 0s;
    width: 400px;
    border-radius: 25px;
    font-weight: bold;
    font-size: 19px;
  margin-top: 50px;
  transform: scale(1);
  padding: 10px;


}
h2{
 color: red;
    font-size: 52px;}

.card:hover{
    /* background-color: yellow;
    height: 400px;
    width: 283px;
border-radius: 23px; */
text-align: center;
width: 400px;

background: linear-gradient(to bottom, blue 0%,red 100%);
    color: white;
    padding: 10px;
    border-radius: 20px;
    margin-top: 10px;
    transition: .7s;
    visibility: visible;
    transform: scale(1);
    /* will-change: transform;
    transform: perspective(900px) rotateX(15.06deg) rotateY(-5.53deg) scale3d(1, 1, 1); */
    font-weight: bold;
    font-size: 23px;

}




</style>
  </head>

<body >
    <?php include 'partials/header.php'; ?>
    <?php include 'partials/dbconnect.php'; ?>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://source.unsplash.com/1600x400/?coding,c" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/1600x400/?programmer,php" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/1600x400/?coding,database" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- <div class="background-image"> -->

  <!-- Category container starts here -->
  <div class="container my-4" id="ques">
        <h2 class="text-center my-4">PROGRAMMING DISSCUSSION - BROWSE CATEGORY</h2>
        <div class="row my-4">
          <!-- Fetch all the categories and /use a loop to iterate through categories -->
      
      <?php
      $sql = "SELECT * FROM `categories`";
      $result = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_assoc($result)){
        $id = $row['category_id'];
        $cat = $row['category_name'];
        $desc = $row['category_description'];

   echo '<div class="col-md-4 my-2">
   <div class="card" style="width: 25rem;">
   <div class="cursur">
   <img src="https://source.unsplash.com/1600x1000/?'. $cat .',coding" class="card-img-top" alt="image for this category">
   <div class="card-body">
        <h3 class="card-title"><a href="threads.php?catid=' . $id . '">' . $cat . '</a></h3>
        <p class="card-text">'.substr($desc,0,90).'....</p>
       
        <a href="threads.php?catid=' . $id . '" class="btn btn-primary">View Threads</a>
    </div>
</div>
</div>
</div>';
      }
      ?>
                          

      

 
        </div>
    </div>
    
  </div>
    <?php include 'partials/footer.php';?>
    
    
    
    <!-- Optional JavaScript; choose one of the two! -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!--
   ~~ <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>