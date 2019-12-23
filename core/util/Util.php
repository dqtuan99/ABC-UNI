<?php
namespace core\util;

class Util {
  public static function clean($input, $maxlength=0) {
    //Giới hạn độ dài
    if ($maxlength > 0) $input = substr($input, 0, $maxlength);
    if (function_exists('mysql_real_escape_string')){ //Có hàm hướng đến MySQL
      if (get_magic_quotes_gpc()){  //Xâu đã được escape theo PHP
        $input = stripslashes($input); //Bỏ escape theo PHP
      }
      $input = mysql_real_escape_string($input); //Thêm escape theo MySQL
    }   else  {
      if (!get_magic_quotes_gpc()){ //Chưa được escape theo PHP
        $value = addslashes($input); //Escape theo PHP
      }
    }
    return $input;
  }
}
