<?php
session_start();


$e=False;
$login=False;
include("/con.php");
$con = "select FROM `dash`";
$result = "mysqli_query";

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = $_POST["user"];
  $pass = $_POST['pass'];

  $log = "Select * FROM `dash` where user='".$user."' AND pass='".$pass."'";
  $result = mysqli_query($conn, $log);
  $num = mysqli_num_rows($result);
  $row = mysqli_fetch_assoc($result);
  if ($num == 1) {
    if ($row["pass"] = $pass) {
      if ($row["user"] = $user) {
        header("location: /dash/index.php");
        $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['user'] = $username;
      } else {
        $e=TRUE;
        $err="Wrong <i>Username</i>";
      }
    } else {
      $e=TRUE;
      $err="Wrong <i>password</i>";
    }



  } else {
    $e=TRUE;
    $err="Wrong <i>Username </i> or <i> Password</i>";
  }}
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
if ($e==1) {
  echo' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $err.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
} 

?>
  <h1>Hello, world!</h1>

  <form method="post" action="connect.php">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Username</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user">
      <div id="emailHelp" class="form-text">
        We'll never share your email with anyone else.
      </div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

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