<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "paczki";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, data, id_kontrolujacego, zmiana, nr_paczki, id_pakujacego, status, kategoria_bledu, rodzaj_bledu FROM paczki ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Data</th><th>ID kontrolujacego</th><th>Zmiana</th><th>Nr paczki</th><th>ID pakujacego</th><th>Status</th><th>Kategoria bledu</th><th>Rodzaj bledu</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["data"]."</td><td>".$row["id_kontrolujacego"]."</td><td>".$row["zmiana"]."</td><td>".$row["nr_paczki"]."</td><td>".$row["id_pakujacego"]."</td><td>".$row["status"]."</td><td>".$row["kategoria_bledu"]."</td><td>".$row["rodzaj_bledu"]."</td><td>";
        echo "<td><a id='deleteBtn' href='delete.php?id=".$row["id"]."'>Usun</a></td><tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
<html>
<head>
    <script type="text/javascript">
    document.onkeydown = function(evt) {
    evt = evt || window.event;
    if (evt.keyCode == 27) {
        window.location.href="index.html";
    }
};
    </script>
    <style>
                   body{
                background-color: #eee;
            }
        #deleteBtn{
            color: #ffffff;
            padding: 1px 6px;
            margin: 3px;
            border: 1px solid crimson;
            background-color: crimson;
            border-radius: 4px;
            text-decoration: none;
        }
        button{
            position: absolute;
            top: 0px;
            right: 0px;
            height: 70px;
            width: 11%
        }
        input[type=submit]{
            position: absolute;
            right: 0%;
            top: 20%;
            height: 5em;
            width: 11em;
        }
    </style>
</head>
<body>
    <form action="export.php" method="post">
        <input type="submit" name="export" value="ZAPISZ DO EXCELA"/>
    </form>
    <button type="button" onclick="window.location.href='index.html'">MENU GLOWNE</button>
</body>
</head>