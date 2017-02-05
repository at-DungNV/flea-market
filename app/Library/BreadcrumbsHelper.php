<?php
  /**
   *
   */
  class BreadcrumbsHelper
  {
    const PARENTS_CATEGORIES = array('posts', 'users');
    const HOME_CATEGORY = '/';

    public function getCrumbs($uri)
    {
      $crumbs = array('home');
      // xử lý khi uri là tù trang home
      if($uri == self::HOME_CATEGORY) {
        return $crumbs;
      }
      // xử lý khi uri là tù khác trang home
      $tem = explode("/",  $uri);
      foreach($tem as $crumb){
        array_push($crumbs, str_replace(array(".php","_"),array(""," "), $crumb));
      }
      if (in_array(trim(end($crumbs), ' '), self::PARENTS_CATEGORIES)) {
        array_push($crumbs, "tất cả danh mục");
      }
      return $crumbs;
    }
  }

?>
