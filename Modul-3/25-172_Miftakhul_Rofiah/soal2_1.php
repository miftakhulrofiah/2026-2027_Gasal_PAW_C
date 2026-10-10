<?php
$buah = ["Avocado", "Blueberry", "Cherry"];
$buah[] = "Buah Tambahan 1";
$buah[] = "Buah Tambahan 2";
$buah[] = "Buah Tambahan 3";
$buah[] = "Buah Tambahan 4";
$buah[] = "Buah Tambahan 5";
$panjang = count($buah);
echo "Panjang array saat ini: $panjang<br>";
for ($i = 0; $i < $panjang; $i++) {
    echo $buah[$i] . "<br>";
}
?>