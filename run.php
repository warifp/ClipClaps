<?php
$uuid = 'd790ab7c-' . rand(1000,9999) . '-' . rand(1000,9999) . '-' . rand(1000,9999) . '-5641fab44281';

echo 'Country Number : '; 
$areaCode = trim(fgets(STDIN));

echo 'Enter Phone Number : '; 
$no = trim(fgets(STDIN)); 

$otp = file_get_contents('https://putrisunda.com/api/otp.php?no=' . $no . '&id=' . $uuid . '&areacode=' . $areaCode)."\n";

if(preg_match('/Success/i', $otp)){
    echo 'Enter OTP : '; 
    $otpSMS = trim(fgets(STDIN));

    echo 'Enter REFF : '; 
    $reff = trim(fgets(STDIN));
    
    $redeem = file_get_contents('https://putrisunda.com/api/redeem.php?no=' . $no . '&otp=' . $otpSMS . '&uuid=' . $uuid . '&areacode=' . $areaCode . '&reff=' . $reff)."\n";
    echo $redeem;
} else if (preg_match('/Sever is busy, please try again later./i', $otp)){
    echo "Sever is busy, please try again later.";
    exit;
} else {
    echo "Gagal";
    exit;
}
?>