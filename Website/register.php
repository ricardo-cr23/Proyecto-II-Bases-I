<?php include'header.php';?>
<!-- banner -->
<script src=JavaScript/registerUser.js></script>
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="#">Home</a> / Register</span>
    <h2>Register</h2>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="spacer">
    <div class="row register">
      <div class="col-lg-6">
        <input id="register" type="text" class="form-control" placeholder="Username" name="form_name" maxlength="45">
        <input id="register" type="password" class="form-control" placeholder="Password" name="form_phone" maxlength="45">
        <input id="register" type="password" class="form-control" placeholder="Confirm Password" name="form_phone" maxlength="45">
        <legend>Are you an expert or a normal user?</legend>
          <input type="radio" id="regular_user" name="animal" value="regular user" checked style="height: 20px">
          <label>Normal User</label> <br />
          <input type="radio" id="expert" name="animal" value="expert" style="height: 20px">
          <label>Expert</label> <br />
      </div>
		<div class="col-lg-6">
			<input id="register" type="text" class="form-control" placeholder="First Name" name="form_name" maxlength="45">
			<input id="register" type="text" class="form-control" placeholder="Last Name" name="form_name" maxlength="45">
			<input id="register" type="text" class="form-control" placeholder="Enter Email" name="form_email" maxlength="45">
		</div>
    </div>
    <div class="row register">
      <div class="pull-right">
        <button id="Submit_User" type="button" class="btn btn-success" name="Submit">Register</button>
      </div>
    </div>
  </div>
</div>
<?php include'footer.php';?>