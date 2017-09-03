<?php
namespace App\Content;

use App\Core\AbstractRepository;

class ContentRepository extends AbstractRepository
{

  public function getTableName()
  {
    return "contactData";
  }

  public function getModelName()
  {
    return "App\\Content\\ContentModel";
  }

  public function update(ContentModel $model)
  {
    $table = $this->getTableName();

    // zum Schutz vor SQL-Injections werden die Parameter nicht einfach als php Variablen ins SQL-Statement 
    // geschrieben, sondern explizit als Parameter ausgewiesen und beim ausführen des Statements in einem 
    // entsprechenden array übergeben. 
    // Wird eine solche Variable (z.B. weil sie in einer URL übergeben wird) manipuliert, wird der übergebene 
    // Inhalt nun nicht mehr als sql-statement, sondern eben lediglich als Variable/Parameter interpretiert und 
    // die Ausführung schlägt einfach fehl, weil es die Variable/den Parameter nicht gibt.

    $stmt = $this->pdo->prepare("UPDATE `{$table}` 
      SET `headline` = :headline, 
          `contactPerson` = :contactPerson,
          `role` = :role, 
          `phoneNumber1` = :phoneNumber1,
          `phoneNumber2` = :phoneNumber2,
          `email` = :email,
          `address` = :address
      WHERE `id` = :id");

    $stmt->execute([
      'id' => $model->id,
      'headline' => $model->headline,
      'contactPerson' => $model->contactPerson,
      'role' => $model->role,
      'phoneNumber1' => $model->phoneNumber1,
      'phoneNumber2' => $model->phoneNumber2,
      'email' => $model->email,
      'address' => $model->address
    ]);
  }
}

?>
