<?php
$berat = ["Andy" => "70", "Barry" => "65", "Charlie" => "75"];
echo "weight = (";
foreach ($berat as $nama => $nilai) echo '"' . $nama . '"=>"' . $nilai . '", ';
echo ")<br>";
$kunci = array_keys($berat);
echo "Data kedua: " . $berat[$kunci[1]];
?>