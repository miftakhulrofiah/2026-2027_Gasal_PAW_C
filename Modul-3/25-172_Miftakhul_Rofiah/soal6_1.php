<?php
$data = ["A"];
array_push($data, "B");
echo "Array awal: (A)<br>";
echo "Hasil array_push: ";
foreach ($data as $d) echo "$d ";
echo "<br><br>";

$gabung = array_merge(["A", "B"], ["C"]);
echo "Array awal: (A, B) digabung dengan (C)<br>";
echo "Hasil array_merge: ";
foreach ($gabung as $g) echo "$g ";
echo "<br><br>";

$nilai = array_values(["x" => 1, "y" => 2]);
echo "Array awal: (x => 1, y => 2)<br>";
echo "Hasil array_values: ";
foreach ($nilai as $n) echo "$n ";
echo "<br><br>";

$hasil = array_search("B", ["A", "B", "C"]);
echo "Mencari B pada array: (A, B, C)<br>";
echo "Hasil array_search: $hasil<br><br>";

$saring = array_filter([0, 1, false, 2, " ", 3, "array"]);
echo "Array awal: (0, 1, false, 2, spasi, 3, array)<br>";
echo "Hasil array_filter: ";
foreach ($saring as $s) echo "$s ";
echo "<br><br>";

$angka = [3, 1, 2];
echo "Array awal: (3, 1, 2)<br>";
sort($angka);
echo "Hasil sort: ";
foreach ($angka as $a) echo "$a ";
echo "<br>";
rsort($angka);
echo "Hasil rsort: ";
foreach ($angka as $a) echo "$a ";
echo "<br><br>";

$umur = ["Peter" => 35, "Ben" => 37, "Joe" => 43];
echo "Array awal: (Peter=>35, Ben=>37, Joe=>43)<br>";
asort($umur);
echo "Hasil asort: ";
foreach ($umur as $nama => $nilai) echo "$nama=> $nilai, ";
echo "<br>";
ksort($umur);
echo "Hasil ksort: ";
foreach ($umur as $nama => $nilai) echo "$nama=> $nilai, ";
echo "<br>";
arsort($umur);
echo "Hasil arsort: ";
foreach ($umur as $nama => $nilai) echo "$nama=> $nilai, ";
echo "<br>";
krsort($umur);
echo "Hasil krsort: ";
foreach ($umur as $nama => $nilai) echo "$nama=> $nilai, ";
echo "<br>";
?>