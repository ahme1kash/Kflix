<?php
require_once("PayPal-PHP-SDK/autoload.php");
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AXi_o3skvw95Zf_XfZtQ0oqV9aEIEGvuPwQNtJiMVBDr7l1KGosOV7sFod84CQBt6J1actyGZVsQMEHB',     // ClientID
        'EFBWAFOEeBxCXy_sl96ArLlVlP4zQl5xRirE-ghRlAIiHomQksl_ImeW_QefkjXzU0DXmFVvkLzwAAEK'      // ClientSecret
    )
);
?>