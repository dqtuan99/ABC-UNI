$arr = explode('&&', '?location=home&&kythi_id=3&&modify=add');

print_r($arr);

echo '<br>';

$html = "";
for ($i = 0; $i < count($arr); ++$i){
  if ($i == 0){
    $html .= $arr[$i];
  }
  else {
      if (strpos($arr[$i], 'modify') === false) {
          $html .= '&&' . $arr[$i];
      }
  }  
}
echo $html;