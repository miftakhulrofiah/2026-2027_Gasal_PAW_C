<?php
$berat = ["Andy" => "70", "Barry" => "65", "Charlie" => "75"];
echo "weight = (";
foreach ($berat as $nama => $nilai) echo '"' . $nama . '"=>"' . $nilai . '", ';
echo ")<br><br>";
$kunci = array_keys($berat);
$panjang = count($berat);
for ($i = 0; $i < $panjang; $i++) {
    $nama = $kunci[$i];
    echo "$nama is " . $berat[$nama] . " kg.<br>";
}
?>