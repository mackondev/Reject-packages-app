<?php
$link = "error.wav"; 
$audio = "<embed src='".$link."'>"; 
 $data = filter_input(INPUT_POST, 'date');
 $id_kontrolujacego = filter_input(INPUT_POST, 'controller');
 $zmiana = filter_input(INPUT_POST, 'shift');
 $nr_paczki = filter_input(INPUT_POST, 'packNumber');
 $id_pakujacego = filter_input(INPUT_POST, 'packer');
 $status = filter_input(INPUT_POST, 'status');
 $kategoria_bledu = filter_input(INPUT_POST, 'categoryList');
 $rodzaj_bledu = filter_input(INPUT_POST, 'errorList');
 if (!empty($nr_paczki)){
if (!empty($status)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "paczki";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO paczki (data, id_kontrolujacego, zmiana, nr_paczki, id_pakujacego, status, kategoria_bledu, rodzaj_bledu)
values ('$data','$id_kontrolujacego','$zmiana','$nr_paczki','$id_pakujacego','$status','$kategoria_bledu','$rodzaj_bledu')";
if ($conn->query($sql)){
echo "Rekord zostal dodany do bazy danych";
header("Location: index.html");
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{

echo "<h1>Status nie moze byc pusty</h1>";
echo $audio;
header("refresh:1; url=index.html");
exit;
}
}
else{
echo "<h1> Numer paczki nie moze byc pusty</h1>";
echo $audio;

header("refresh:1; url=index.html");
exit;
}
?>
<html>
<head>
    <style>
                   body{
                background-color: #eee;
            }
        input[type=button]{
            height: 30%;
            width: 25%;
        }

        </style>
</head>
<body>
    <br>
    <form>
<input type="button" value="DODAJ NASTEPNY REKORD" onclick="window.location.href='index.html'" />
</form>
</body>
</html>