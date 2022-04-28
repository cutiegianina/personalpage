<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/index.css">

      <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<title>Login</title>
</head>
<body style="background-color: #292b2c;max-height: 100vh;" >

<style>
	.container-sm {
		padding: 20px;
 		box-shadow:
       inset 0 0 0.5em rgba(255,255,255),
             0 0 0.5em rgba(255,255,255),
             0 0 0.5em rgba(255,255,255),
             0 0 0.5em rgba(255,255,255);
	}

	#login-content {
		margin-top: 20px;
		margin-left: auto;
		max-width: 300px;
		width: 300px;
		position: relative;
	}

</style>
<div class="container-sm" style="border-style: solid; color: white; height: 300px; width: 450px; border-radius: 15px;margin-top: 20vh;">
	<h2 style="margin: auto; width: 25%; margin-top: 10px;"><B>Login</B></h2>

	<form action="login.php" method="POST" id="login-content">
		<div class="edit-profile-group">
          <input type="text" name="username" placeholder="Username" id="edit-profile-input"/>
        </div>
        <div class="edit-profile-group">
          <input type="password" name="password" placeholder="Password" id="edit-profile-input"/>
        </div>
        <label style="margin-top: 5px;margin-left: 30px;"><a href="#" style="text-decoration: none;" data-toggle="modal" data-target="#register">Sign up</a></label>
        <button type="submit" name="submit" class="btn btn-primary" style="float: right; margin-right: 105px;">Log in</button>
	</form>

</div>



<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id ="modal-style" style="color: white;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b> Sign Up</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="register.php" method="POST">
	      <div class="modal-body">
	        <div class="edit-profile-group">
	          <input type="text" name="first_name" placeholder="First Name" id="edit-profile-input"/>
	        </div>
	        <div class="edit-profile-group">
	          <input type="text" name="last_name" placeholder="Last Name" id="edit-profile-input"/>
	        </div>
	        <div class="edit-profile-group">
	          <input type="text" name="username" placeholder="Username" id="edit-profile-input"/>
	        </div>
	        <div class="edit-profile-group">
	          <input type="password" name="password" placeholder="Password" id="edit-profile-input"/>
	        </div>
	        <div class="edit-profile-group">
	          <label>Birth date:</label><br>
	          <input type="date" name="birth_date"/>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="submit" class="btn btn-primary">Register</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<script>
	$(document).ready(function() {
 	 $(".modal").on("hidden.bs.modal", function() {
	    $(".edit-profile-group").html("");
	  });
	});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="sidebars.js"></script>
</body>
</html>