<!-- // poin 3.1 // -->
<?php
$tinggi = ["Andy" => "176", "Barry" => "165", "Charlie" => "170"];
$tinggi["David"]  = "180";
$tinggi["Ethan"]  = "172";
$tinggi["Frank"]  = "168";
$tinggi["George"] = "175";
$tinggi["Harry"]  = "182";
echo "height = (";
foreach ($tinggi as $nama => $nilai) echo '"' . $nama . '"=>"' . $nilai . '", ';
echo ")<br>";
end($tinggi);
echo "Nilai dengan indeks terakhir: " . current($tinggi) . "<br><br>";
unset($tinggi["Barry"]);
echo "height = (";
foreach ($tinggi as $nama => $nilai) echo '"' . $nama . '"=>"' . $nilai . '", ';
echo ")<br>";
end($tinggi);
echo "Nilai dengan indeks terakhir setelah dihapus: " . current($tinggi);
echo "<br>";
echo "<br>";
?>

<!-- // poin 3.2 // -->
<?php
$berat = ["Andy" => "70", "Barry" => "65", "Charlie" => "75"];
echo "weight = (";
foreach ($berat as $nama => $nilai) echo '"' . $nama . '"=>"' . $nilai . '", ';
echo ")<br>";
$kunci = array_keys($berat);
echo "Data kedua: " . $berat[$kunci[1]];
?>