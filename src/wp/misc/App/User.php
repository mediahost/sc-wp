<?php

namespace App;

use Majkl578\NetteAddons\Doctrine2Identity\Security\FakeIdentity;

class User {

  /**
   * @return int|null
   */
  public static function getId () {
    /** @var FakeIdentity $identity */
    $identity = self::getIdentity();

    if(!$identity) {
      return null;
    }

    return (int) $identity->getId()['id'];
  }

  /**
   * @return null
   */
  private static function getIdentity () {
    if(!empty($_SESSION['__NF']['DATA']["Nette.Http.UserStorage/"]['authenticated'])) {
      return $_SESSION['__NF']['DATA']["Nette.Http.UserStorage/"]["identity"];
    }

    return null;
  }

}
