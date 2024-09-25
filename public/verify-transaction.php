<?php
$secretKey = 'pk_test_451256ee3fdd45ea7923be5df1bbb2e06a4afb57';
// include 'configs.php';
if(isset($_GET['reference'])){
    $referenceId = $_GET['reference'];
    if($referenceId == ''){
        header("Location: index.php");
    }else{
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "URL",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $secretKey",
                "Cache-control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if($err){
            echo "cURL Error #:".$err;
        }else{
            $data = json_decode($response);
            if($data->status == true){
                echo $transaction_message = $data->message."<br>";
                echo $paid_reference = $data->reference."<br>";
                echo $message = $data->data->message."<br>";
                echo $gateway_message = $data->data->gateway_response."<br>";
                echo $receipt_number = $data->data->receipt_number."<br>";
            }else{
                echo $transaction_message = $data->message;
            }
        }
    };
}
?>