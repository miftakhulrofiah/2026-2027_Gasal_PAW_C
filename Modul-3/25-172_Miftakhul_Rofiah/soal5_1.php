<?php
$mahasiswa = [
    ["Name" => "Alex",    "NIM" => "2204010812345678", "Mobile" => "0812345678"],
    ["Name" => "Bianca",  "NIM" => "2204020812345687", "Mobile" => "0812345687"],
    ["Name" => "Candice", "NIM" => "2204030812345665", "Mobile" => "0812345665"],
    ["Name" => "Diana",   "NIM" => "2204040812345601", "Mobile" => "0812345601"],
    ["Name" => "Ethan",   "NIM" => "2204050812345602", "Mobile" => "0812345602"],
    ["Name" => "Fiona",   "NIM" => "2204060812345603", "Mobile" => "0812345603"],
    ["Name" => "George",  "NIM" => "2204070812345604", "Mobile" => "0812345604"],
    ["Name" => "Hannah",  "NIM" => "2204080812345605", "Mobile" => "0812345605"],
];
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Name</th><th>NIM</th><th>Mobile</th></tr>";
foreach ($mahasiswa as $m) {
    echo "<tr>";
    echo "<td>" . $m["Name"] . "</td>";
    echo "<td>" . $m["NIM"] . "</td>";
    echo "<td>" . $m["Mobile"] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>