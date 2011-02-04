<?php
/**************************
 * /|/ Code by Stephen
 * /|/ "Rixius" Middleton
 * 
 * Index demonstrating the code in Rix/
 */
require_once 'Rix/lib.php';
require_once 'Rix/is.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Rix Test</title>
</head>
<body>
<?php
echo "\"asd\" is a: ";
echo \rix\is("asd") . "\n";

echo \rix\lib\dump(
  "this is a String",
  array(
    "key"   => 1337,
    "key2"  => array(0,1,2,3,4)
  ),
  true,
  new stdClass
);
?>
</body>
</html>