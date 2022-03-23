<?php 
include("vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;

$table = new UsersTable(new MySQL());
$all = $table->getAll();
$auth = Auth::check();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
  <div class="container">
    <div style="float:right">
      <a href="profile.php">Profile</a>
      <a href="actions/logout.php">Logout</a>
    </div>

    <h1 class="mt-5 mb-5">
      Mange users
      <span class="badge bg-danger text-white">
        <?= count($all) ?>
      </span>
    </h1>

    <table class="table table-striped table-bordered">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Actions</th>
      </tr>
      <?php foreach($all as $user) : ?>
      <tr>
        <td><?= $user->id ?></td>
        <td><?= $user->name ?></td>
        <td><?= $user->email ?></td>
        <td><?= $user->phone ?></td>
        <td>
          <?php if($user->value === 1): ?>
          <span class="badge bg-secondary">
            <?= $user->role ?>
          </span>
          <?php elseif($user->value === 2): ?>
          <span class="badge bg-primary">
            <?= $user->role ?>
          </span>
          <?php else: ?>
          <span class="badge bg-success">
            <?= $user->role ?>
          </span>
          <?php endif ?>
        </td>
        <td>
          <?php if($auth->value > 1): ?>
            <div class="btn-group dropdown">
              <a href="#" class="btn btn-sm btn-outline-primary dropdown-toggle"
              data-bs-toggle="dropdown">
              Change Role
              </a>
              <div class="dropdown-menu dropdown-menu-dark">
                <a href="actions/role.php?id=<?= $user->id ?>&role=1"
                class="dropdown-item">User</a>
                <a href="actions/role.php?id=<?= $user->id ?>&role=2"
                class="dropdown-item">Manager</a>
                <a href="actions/role.php?id=<?= $user->id ?>&role=3"
                class="dropdown-item">Admin</a>
              </div>
              <?php if($user->suspended): ?>
                <a href="actions/unsuspend.php?id=<?= $user->id ?>"
                class="btn btn-sm btn-danger">Suspended</a>
              <?php else: ?>
                <a href="actions/suspend.php?id=<?= $user->id ?>"
                class="btn btn-sm btn-outline-success">Active</a>
              <?php endif ?>
              <?php if($user->id !== $auth->id): ?>
              <a href="actions/delete.php?id=<?= $user->id ?>"
              class="btn btn-sm btn-outline-danger"
              onClick="return confirm('Are you sure?')">Delete</a>
              <?php endif ?>

            </div>
            <?php else: ?>
              ###
            <?php endif ?>
        </td>
      </tr>
      <?php endforeach ?>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>