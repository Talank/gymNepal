<!DOCTYPE html>
<html>
<head>
  <title>GymNepal</title>
  <link rel="shortcut icon" href="Images/bulls.png" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/signin.css">
</head>
<body>
    
    <div class="container">

      <form class="form-signin" method="POST" action="index.php/home">
        {{csrf_field()}}
        <h2 class="form-signin-heading">Please sign in</h2>
        <label>User Name</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="User Name" name="username" required autofocus>
        <label>Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
