<?php

// if the request isn't POST
if (!$_POST)
  die("Invalid request");

$data = json_decode(file_get_contents('php://input'), true);

// if the data isn't an object
if (!is_object($data))
  die("Invalid request");

$reference = $data['reference']; // get the reference 

if (empty($reference))
  die('No reference supplied');

$curlHeader = [
  "accept: application/json",
  "authorization: Bearer " . getenv('TEST_SECRET'),
  "cache-control: no-cache"
];

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => $header,
));

$response = curl_exec($curl);
$err = curl_error($curl);

if ($err)
  // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);

$tranx = json_decode($response);

if (!$tranx->status)
  // there was an error from the API
  die('API returned error: ' . $tranx->message);

if ('success' == $tranx->data->status) {
  // transaction was successful...
  // please check other things like whether you already gave value for this ref
  // and if the email matches the customer who owns the product etc
  // then Give value

  header("Location: success.html");
  die();
}
