<?php
include 'DBController.php';
$db_handle = new DBController();
$productResult = $db_handle->runQuery("select * from paczki");

if (isset($_POST["export"])) {
    $filename = "Rejestracja-paczek-".date('m-d-Y').'.xls';
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $isPrintHeader = false;
    if (! empty($productResult)) {
        foreach ($productResult as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    }
    exit();
}
?>