<?php
    $nilai = $_POST['nilai'];

    if ($nilai >= 85 && $nilai <= 100) {
        echo "A";
    } elseif ($nilai >= 75 && $nilai < 85) {
        echo "B";
    } elseif ($nilai >= 60 && $nilai < 75) {
        echo "C";
    } elseif ($nilai >= 50 && $nilai < 60) {
        echo "D";
    } elseif ($nilai < 50) {
        echo "E";
    } else{
        echo "Invalid Input!";
    }
?>