<?php
session_start();
$temp=$_SESSION['temp'];
$city=$_SESSION['name'].$temp;
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.trello.com/1/lists?name=$city&idBoard=5c72c557398e136726a121b4&key=96b514184e55bcf2097b905bd52306ea&token=cd4c2c3f8326f7fd441e27b78b57ff092c959197e044842b89d28db5244fcca3",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
}
else{
    echo "Posted Successfully"."<br>";
}
