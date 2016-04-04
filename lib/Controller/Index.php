<?php


class Index extends Controller {

  public function run() {
    if (!$this->isLoggedIn()) {
      // login
      header('Location: ' . SITE_URL . '/top.php');
      exit;
    }

    // get users info
  }

}
