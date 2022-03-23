<?php
  include("vendor/autoload.php");
  use Helpers\Auth;

  $auth = Auth::check();
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>

<div class="container mt-5">
<h1 class="mt-5 mb-5">
<?= $auth->name ?>
<span class="fw-normal text-muted">
(<?= $auth->role ?>)
</span>
</h1>

<?php if(isset($_GET['error'])) { ?>
  <div class="alert alert-warning">
    Cannot upload file
  </div>
<?php } ?>

<?php if($auth->photo): ?>
  <img
  class="img-thumbnail mb-3"
  src="actions/<?= $auth->photo ?>"
  alt="Profile Photo" width="200">
<?php endif ?>

<form action="actions/upload.php" method="post" enctype="multipart/form-data" >
  <div class="input-group mb-3">
    <input type="file" name="photo" class="form-control">
    <button  type="submit" class="btn btn-secondary">Send</button>
  </div>
</form>

<ul class="list-group">
<li class="list-group-item">
<b>Email:</b> <?= $auth->email ?>
</li>
<li class="list-group-item">
<b>Phone:</b> <?= $auth->phone ?>
</li>
<li class="list-group-item">
<b>Address:</b> <?= $auth->address ?>
</li>
</ul>
<br>
<a href="admin.php">Manage Users</a>
<a href="actions/logout.php">Logout</a>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>