<?php
$students = [
    ["Alex", "220401", "0812345678"],
    ["Bianca", "220402", "0812345678"],
    ["Candice", "220403", "0812345665"]
];

function tampilkanData($data) {
    echo "students = (<br>";
    foreach ($data as $siswa) {
        echo '("' . implode('", "', $siswa) . '"),<br>';
    }
    echo ")<br>";
}

echo "Data awal:<br>";
tampilkanData($students);

$students[] = ["Daniel", "220404", "0812345611"];
$students[] = ["Elena", "220405", "0812345622"];
$students[] = ["Fiona", "220406", "0812345633"];
$students[] = ["Gabe", "220407", "0812345644"];
$students[] = ["Hannah", "220408", "0812345655"];

echo "<br>Data setelah ditambah 5 data lain:<br>";
tampilkanData($students);

echo "<br>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>";
echo "<th>Name</th>";
echo "<th>NIM</th>";
echo "<th>Mobile</th>";
echo "</tr>";

foreach ($students as $siswa) {
    echo "<tr>";
    echo "<td>" . $siswa[0] . "</td>";
    echo "<td>" . $siswa[1] . "</td>";
    echo "<td>" . $siswa[2] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>