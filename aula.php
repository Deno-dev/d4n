<?php
 
$w = 25;
$x = 19;
$y = 13;
$z = 32;
 
$v1 = $w > $z;
$v2 = $y < $x;
$v3 = $x > $z;
$v4 = $w < $y;
if ($v1 == true) {
	echo "V1 é Verdaeiro";
}else{
	echo "V1 é falso";
}
echo "<br>";
if ($v2 == true) {
	echo "V2 é Verdadeiro";
}else{
	echo "V2 é falso";
}
echo "<br>";
if ($v3 == true) {
	echo "V3 é verdadeiro";
}else{
	echo "V3 é falso";
}
echo "<br>";
if ($v4 == true) {
	echo "V4 é verdadeiro";
}else{
	echo "V4 é falso";
}
?>