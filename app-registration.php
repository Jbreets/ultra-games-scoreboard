<?php include("includes/header.php"); ?>
<div>
  <h2 class="subhead">Sign Up</h2>
</div>
<form class="form" action="registration.php" method="post">
  <section>
    <label for="inv" class="label">Invite Code</label>
    <br>
    <input class="Tname" type="text" name="inv" value="" align="center" required>
  </section>
  <br>
  <section>
    <div>
      <label for="fname" class="label">First name</label>
      <br>
      <input class="Tname" type="text" name="fname" value="" align="center" required>
    </div>
  </section>
  <br>
  <section>
    <div>
      <label for="lname" class="label">Last Name</label>
      <br>
      <input class="Tname" type="text" name="lname" value="" align="center" required>
    </div>
  </section>
  <section>
    <div>
      <label for="email" class="label">Email</label>
      <br>
      <input type="text" name="email" value="" class="Tname" align="center" required>
    </div>
  </section>
  <br>
  <section>
    <div>
      <label for="password" class="label">Password</label>
      <br>
      <input type="text" name="password" value="" class="Tname" align="center" required>
    </div>
  </section>
  <br>
  <section>
    <div>
      <label for="submit" class="label"></label>
      <input type="submit" name="submit" value="REGISTER" class="submit">
    </div>
  </section>
</form>
<?php include("includes/footer.php"); ?>
