<?php
    $gapok = $_POST['gapok'];
    $tunjangan = $_POST['tunjangan'];
    $potongan = $_POST['potongan'];

    function hitungGaji() {
        $gapok = $_POST['gapok'];
        $tunjangan = $_POST['tunjangan'];
        $potongan = $_POST['potongan'];

        $gajiBruto = $gapok + $tunjangan;
        $pajakPenghasilan = $gajiBruto * 0.1;
        $asuransiKesehatan = $gajiBruto * 0.05;
        $gajiBersih = $gajiBruto - ($pajakPenghasilan + $asuransiKesehatan);

        echo "<h2>" . "Hasil Perhitungan Gaji" . "</h2>";
        echo "Gaji Bruto: " . $gajiBruto . "<br>";
        echo "Gaji Bruto: " . $gajiBruto . "<br>";
        echo "Pajak Penghasilan: " . $pajakPenghasilan . "<br>";
        echo "Asuransi Kesehatan: " . $asuransiKesehatan . "<br>";
        echo "Gaji Bersih: " . $gajiBersih;
    }

    if (is_numeric($gapok) && is_numeric($tunjangan) && is_numeric($potongan) && $gapok >= 0 && $tunjangan >= 0 && $potongan >= 0) {
        hitungGaji();
    } else {
        echo "Invalid";
    }

?>