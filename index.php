<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<meta name="viewport"
content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>
.wrap {
width: 100%;
max-width: 400px;
margin: 40px auto;
}
</style>
</head>
<body class="text-center">
  <div class="wrap">
  <h1 class="h3 mb-3">Login</h1>
  <?php if (isset($_GET['registered'])): ?>
    <div class="alert alert-success">
      Account created. Please login.
    </div>
  <?php endif ?>

  <?php if (isset($_GET['suspended'])): ?>
    <div class="alert alert-danger">
      Your account is suspended.
    </div>
  <?php endif ?>

  <?php if ( isset($_GET['incorrect']) ) : ?>
    <div class="alert alert-warning">
      Incorrect Email or Password
    </div>
  <?php endif ?>

  <form action="actions/login.php" method="post">
    <input
    type="email" name="email"
    class="form-control mb-2"
    placeholder="Email" required
    >
    <input
    type="password" name="password"
    class="form-control mb-2"
    placeholder="Password" required
    >
    <button type="submit" class="w-100 btn btn-lg btn-primary">Login</button>
  </form>
  <br>
  <a href="register.php">Register</a>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>