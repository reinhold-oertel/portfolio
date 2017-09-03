<?php

namespace App\Content;

use App\Core\AbstractController;

class ContentController extends AbstractController
{

  public function __construct(ContentRepository $ContentRepository)
  {
      $this->ContentRepository = $ContentRepository;                                                                // innerhalb einer Klassendefinition ist das zulässig
  }

  public function index()
  {
      $Content = $this->ContentRepository->all();

      $this->render("Content/index", [
        'Content' => $Content
      ]);
  }

  public function show()
  {
      $id = $_GET['id'];
      if (isset($_POST['content'])) {
          $content = $_POST['content'];
          $this->commentsRepository->insertForPost($id, $content);
      }

      $post = $this->postsRepository->find($id);
      $comments = $this->commentsRepository->allByPost($id);

      $this->render("post/show", [
        'post' => $post,
        'comments' => $comments 
      ]);
  }
}

 ?>
