<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment success</title>
</head>

<body>
    <?php if (!empty($payment)) { ?>
        <h1 class="success">Your Payment has been Successful!</h1>
        <h4>Payment Information</h4>
        <p><b>Reference Number:</b> #<?php echo $payment['id']; ?></p>
        <p><b>Transaction ID:</b> <?php echo $payment['txn_id']; ?></p>
        <p><b>Paid Amount:</b> <?php echo $payment['payment_gross'] . ' ' . $payment['currency_code']; ?></p>
        <p><b>Payment Status:</b> <?php echo $payment['status']; ?></p>

        <h4>Payer Information</h4>
        <p><b>Name:</b> <?php echo $payment['payer_name']; ?></p>
        <p><b>Email:</b> <?php echo $payment['payer_email']; ?></p>

        <h4>Product Information</h4>
        <p><b>Name:</b> <?php echo $product['name']; ?></p>
        <p><b>Price:</b> <?php echo $product['price'] . ' ' . $product['currency']; ?></p>
    <?php } else { ?>
        <h1 class="error">Transaction has been failed!</h1>
    <?php } ?>
</body>

</html>