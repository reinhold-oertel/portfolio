<?php require __DIR__ . "/../layout/header.php"; ?>

<br />
<br />

<?php if (!empty($error)): ?>
  <p>
    Bitte ein Passwort angeben.
  </p>
<?php endif; ?>

<form method="POST" action="perform-setup" class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-md-6">
      Administrator Passwort des lokalen mySQL-Servers:
    </label>
    <div class="col-md-6">
      <input type="password" name="password" class="form-control" />
    </div>
  </div>

  <input type="submit" value="Datenbank anlegen" class="btn btn-primary" />
</form>

<?php require __DIR__ . "/../layout/footer.php"; ?>
