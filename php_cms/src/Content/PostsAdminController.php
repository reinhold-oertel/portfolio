<?php

namespace App\Content;

use App\Core\AbstractController;
use App\User\LoginService;

class PostsAdminController extends AbstractController
{

  public function __construct(
    ContentRepository $contentRepository,
    LoginService $loginService
  )
  {
    $this->contentRepository = $contentRepository;
    $this->loginService = $loginService;
  }

  public function index()
  {
    $this->loginService->check();
    
    $all = $this->contentRepository->all();
    $this->render("post/admin/index", [
      'all' => $all
    ]);
  }

  public function edit()
  {
    $this->loginService->check();

    $id = $_GET['id'];
    $entry = $this->contentRepository->find($id);
    $savedSuccess = false;

      if ($this->checkAndTakeInputs($_POST, $entry)) {
        $this->contentRepository->update($entry);
        $savedSuccess = true;
      }

    $this->render("post/admin/edit", [
      'entry' => $entry,
      'savedSuccess' => $savedSuccess
    ]);
  }


  private function checkAndTakeInputs($inputs, &$entry){

    foreach ($inputs as $key => $value) {

      if ($key == "phoneNumber1" OR $key == "phoneNumber2" ) { continue; }

      if (!empty($value)) {

        $entry->$key = $value;
      } 
      else { return false; }
    }
    
     if (!empty($inputs['phoneNumber1']) OR !empty($inputs['phoneNumber2'])) {
      
      $entry->phoneNumber1 = $inputs['phoneNumber1'];
      $entry->phoneNumber2 = $inputs['phoneNumber2'];
     }
     else { return false; }

     return true;
 }

}
 ?>