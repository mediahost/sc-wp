<?php

namespace App;

class HtmlBlock {

  const BASE_URL = 'https://source-code.com/api/wp-support';

  /**
   * @param $userId
   * @param $postId
   *
   * @return string
   */
  public static function loadApplyButton ($userId, $postId, $redirectUrl, $template) {
    return self::loadContent(
      '/apply-buttons',
      [
        'userId' => $userId,
        'postId' => $postId,
        'redirectUrl' => $redirectUrl,
        'template' => $template,
      ]
    );
  }

  /**
   * @param $path
   * @param $params
   *
   * @return string
   */
  private static function loadContent ($path, $params) {
    $url = self::BASE_URL . $path . "?" . http_build_query($params);

    $content = @file_get_contents($url);

    if(empty($content)) {
      var_dump($url);
      return;
    }

    return $content;
  }
}
