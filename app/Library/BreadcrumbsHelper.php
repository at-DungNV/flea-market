<?php
  /**
   *
   */
  class BreadcrumbsHelper
  {
    const PARENTS_CATEGORIES = array('posts', 'users');
    const HOME_CATEGORY = '/';
    const LIMIT_STRING_SIZE = 50;
    const DEFAULT_INDEX = 'tất cả danh mục';
    const DASHBOARD = 'dashboard';

    public function getCrumbs($uri)
    {
      $crumbs = array('home');
      // xử lý khi uri là tù trang home
      if($uri == self::HOME_CATEGORY) {
        return $crumbs;
      }
      // xử lý khi uri là tù khác trang home
      $tem = explode('/',  $uri);
      foreach($tem as $crumb){
        if ($crumb != self::DASHBOARD) {
          array_push($crumbs, str_replace(array('.php','_'),array('',' '), $crumb));
        }
      }

      // limit size of the last element
      $lastScrumbsIndex = count($crumbs)-1;
      if (strlen($crumbs[$lastScrumbsIndex]) > self::LIMIT_STRING_SIZE) {
        $crumbs[$lastScrumbsIndex] = substr($crumbs[$lastScrumbsIndex], 0, self::LIMIT_STRING_SIZE). '...';
      }

      // add default value if index page
      if (in_array(trim(end($crumbs), ' '), self::PARENTS_CATEGORIES)) {
        array_push($crumbs, self::DEFAULT_INDEX);
      }
      return $crumbs;
    }
  }

?>
