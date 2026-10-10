<!-- // poin 4.1 // -->
<?php
$tinggi = ["Andy" => "176", "Barry" => "165", "Charlie" => "170"];

$tinggi["David"]  = "180";
$tinggi["Ethan"]  = "172";
$tinggi["Frank"]  = "168";
$tinggi["George"] = "175";
$tinggi["Harry"]  = "182";

echo "height = (";
foreach ($tinggi as $nama => $nilai) {
    echo '"' . $nama . '"=>"' . $nilai . '", ';
}
echo ")<br><br>";

foreach ($tinggi as $nama => $nilai) {
    echo "$nama is $nilai cm tall.<br>";
}
echo "<br>";
echo "<br>";
?>

<!-- // poin 4.2 // -->
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