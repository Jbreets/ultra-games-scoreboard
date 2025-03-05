<?php include("includes/header.php"); ?>
<div>
  <h2 class="subhead">Enter Code</h2>
</div>
<form class="form" action="functions/code_authenticate.php" method="post">
  <section>
    <label for="newpass" class="label"></label>
    <br>
    <input class="Tname" type="text" name="code" value="">
  </section>
  <br>
  <section>
    <div>
      <label class="label" for="submit"></label >
      <input class="submit" type="submit" value="ENTER TEAM" name="submit">
    </div>
  </section>
</form>
<?php include("includes/footer.php"); ?>
