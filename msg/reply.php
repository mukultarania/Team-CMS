<?php session_start(); ?>
<?php include "../includes/db.php"; ?>
<?php include "../includes/functions.php"; ?>
<?php if(isset($_SESSION['email'])){ ?>
<?php
if(isset($_POST['submit'])){
    if(isset($_GET['to'])){
      global $connection;
      $to= mysqli_real_escape_string($connection, $_GET['to']);
      $email = mysqli_real_escape_string($connection, $_SESSION['email']);
      $content = mysqli_real_escape_string($connection, $_POST['content']);
      sendmsg($to, $email, $content);
    } else if(isset($_POST['too'])){
      global $connection;
      $to= mysqli_real_escape_string($connection, $_POST['too']);
      $email = mysqli_real_escape_string($connection, $_SESSION['email']);
      $content = mysqli_real_escape_string($connection, $_POST['content']);
      sendmsg($to, $email, $content);
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=B612&display=swap" rel="stylesheet">
  <link href="../css/mycss.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="topnav sticky-top">
    <a class="active" href="../dashboard.php?select=main">Home</a>
    <a href="../profile.php">Profile</a>
    <!-- <a href="#contact">Contact</a> -->
    <div class="topnav-right">
      <a href="../dashboard.php?select=request" data-toggle="tooltip" title="Join Request"><img src="https://img.icons8.com/ios/16/000000/invite.png"></a>
      <a href="../message.php"  data-toggle="tooltip" title="Messages"><img src="https://img.icons8.com/small/16/000000/sms.png"></a>
      <a href="../includes/logout.php" data-toggle="tooltip" title="Logout"><img src="https://img.icons8.com/small/16/000000/logout-rounded-up.png"></a>
    </div>
  </div>
<div class="container-fluid">
  <div class="row">
    <div class="col-2">
      <div class="w3-sidebar w3-bar-block w3-light-grey w3-xlarge sidebar sticky-left">
        <a href="../dashboard.php?select=team" class="w3-bar-item w3-button">Team</a>
        <a href="../updates.php" class="w3-bar-item w3-button">Updates</a>
        <a href="../task.php" class="w3-bar-item w3-button">Tasks</a>
        <a href="../dashboard.php?select=members" class="w3-bar-item w3-button">Members</a>
      </div>
    </div>
  </div>
</div>
<br>
<h2 id="main-header">SEND MESSAGE</h2>
<hr>
<div class="container-fluid contain">
  <div class="row">
    <div class="col-11">
      <form action="#" method="post">
        <div class="form-group">
          <label for="first-name">To</label>
          <input type="text" name="too" class="form-control" value="<?php if(isset($_GET['to'])){ echo $_GET['to'];}?>">
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea rows="6" class="form-control" placeholder="Your Message" name="content"></textarea>
        </div>
        <div class="form-group">
          <input class="btn btn-secondary" type="submit" class="form-control" value="Send" name="submit">
        </div>
      </form>

    </div>
  </div>
</div>
<div class="sticky-bottom" id="main-footer">
  <footer>
  		<p>Copyright &copy; 2017 My Website</p>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<?php
  } else {
  echo "<script>location.href = 'index.php'</script>";
} ?>
