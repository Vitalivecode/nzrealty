<?php
// Replace these variables with your actual credentials and parameters
$pxPayUserId = 'RentalListingsLimited_DEV';
$pxPayKey = '246a51e5247b05767477ab17680094c54a3a0510bdaa4b88f64ed98f7a17f0bc';
$amount = 100.00;
$currency = 'NZD';
$merchantReference = 'order123';

// Windcave PxPay API endpoint
$apiEndpoint = 'https://uat.windcave.com/pxaccess/pxpay.aspx';

// Prepare the request data
$requestData = array(
    'UserId' => $pxPayUserId,
    'AmountInput' => $amount,
    'CurrencyInput' => $currency,
    'MerchantReference' => $merchantReference,
    // Add other required parameters as needed
);

// Convert the request data to a query string
$requestQueryString = http_build_query($requestData);

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $apiEndpoint);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $requestQueryString);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL session and get the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    // Process the response (parse and handle)
    // Refer to Windcave PxPay documentation for details on handling the response
    echo $response;
}

// Close cURL session
curl_close($ch);
?>
