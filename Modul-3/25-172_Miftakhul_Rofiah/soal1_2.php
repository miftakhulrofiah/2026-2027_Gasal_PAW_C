<?php
$buah = ["Avocado", "Blueberry", "Cherry"];
$buah[] = "Durian";
$buah[] = "Elderberry";
$buah[] = "Fig";
$buah[] = "Grape";
$buah[] = "Honeydew";
unset($buah[1]);
$buah = array_values($buah);
echo "Data Blueberry dihapus.<br>";
echo "fruits = (";
foreach ($buah as $i => $b) {
    echo '"' . $b . '"';
    if ($i < count($buah) - 1) echo ", ";
}
echo ")<br>";
echo "Nilai dengan indeks tertinggi: " . $buah[count($buah) - 1];
?>