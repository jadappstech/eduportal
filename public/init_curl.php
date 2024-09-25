<?php

//post to api

$headers = [
    "User-Agent: Example of REST A PI CLIENT",
    "Authorization: token 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"
];
$ch = curl_init();

// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt_array($ch, [
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_RETURNTRANSFER => true
]);

return $ch;