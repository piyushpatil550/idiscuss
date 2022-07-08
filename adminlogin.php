<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CODDING DISSCUSSION</title>
    <link href="css/style.css" rel="stylesheet">
  <style>
     #login{
        margin: auto;
    width: 21%;
    text-align: center;
    font-size: 24px;
color: black;
}

body{
  
  background-color: rgba(17, 7, 165, 0.781);
}
</style>

  </head>

<body>
    <?php include 'adminpanal/databconnect.php'; ?>
<h1 class="text-center" style="
 color: white;   margin-top: 4%;
    margin-bottom: 82px;
">ADMIN SIGNIN</h1>
    <div class="container" id="login">
<form action="/forum/adminpanal/handleloginadmin.php" method="post">
    <img class="mb-4" src="" alt="" width="72" height="57">
  
    <div class="form-floating py-2">
      <input type="email" class="form-control" name="adminemail" id="floatingInput" placeholder="ENTER EMAIL">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating py-2">
      <input type="password" class="form-control" name="adminpassword" id="floatingPassword" placeholder="ENTER PASSWORD">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3 py-2">
      <label>
    <a href="index.php" style="text-decoration: none; color: black;">go to main home</a>  
    </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">© 2022–2023</p>
  </form>


</div>  


</body>

</html>