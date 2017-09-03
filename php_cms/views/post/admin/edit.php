<?php require(__DIR__ . "/../../layout/header.php"); ?>


<h3>Kontaktdaten verwalten</h3>
<a href="dashboard"> zurück zum Dashboard</a>

<br /> <br />

<form method="POST" action="posts-edit?id=<?php echo e($entry->id); ?>" class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-md-3">
      Überschrift
    </label>
    <div class="col-md-6">
      <input type="text" name="headline" value="<?php echo e($entry->headline); ?>" class="form-control" />
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">
      Kontaktperson
    </label>
    <div class="col-md-6">
      <input type="text" name="contactPerson" value="<?php echo e($entry->contactPerson); ?>" class="form-control" />
    </div>
  </div><div class="form-group">
  <label class="control-label col-md-3">
    Funktion
  </label>
  <div class="col-md-6">
    <input type="text" name="role" value="<?php echo e($entry->role); ?>" class="form-control" />
  </div>
</div><div class="form-group">
<label class="control-label col-md-3">
  1. Telefonnummer
</label>
<div class="col-md-6">
  <input type="text" name="phoneNumber1" value="<?php echo e($entry->phoneNumber1); ?>" class="form-control" />
</div>
</div><div class="form-group">
<label class="control-label col-md-3">
  2. Telefonnummer
</label>
<div class="col-md-6">
  <input type="text" name="phoneNumber2" value="<?php echo e($entry->phoneNumber2); ?>" class="form-control" />
</div>
</div><div class="form-group">
<label class="control-label col-md-3">
  email
</label>
<div class="col-md-6">
  <input type="text" name="email" value="<?php echo e($entry->email); ?>" class="form-control" />
</div>
</div>
<div class="form-group">
  <label class="control-label col-md-3">
    Adresse
  </label>
  <div class="col-md-6">
    <textarea name="address" class="form-control" rows="5"><?php echo e($entry->address); ?></textarea>
  </div>
</div>

<input type="submit" value="Inhalte speichern!" class="btn btn-primary" />
</form>

<br />
<?php if(!empty($savedSuccess)): ?>
  <p>Die Website wurde erfolgreich aktualisiert</p>
<?php else: ?> <p>Mindestens eine Tel. Nummer und alle verbleibenden Felder müssen ausgefüllt sein.</p>
<?php endif; ?>

<?php require(__DIR__ . "/../../layout/footer.php"); ?>
