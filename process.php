<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve POST data
    $itemName = strtoupper($_POST['item_name']); // Built-in: strtoupper
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // -------- USER-DEFINED FUNCTIONS --------

    // 1. Compute Subtotal
    function computeSubtotal($price, $quantity) {
        return $price * $quantity;
    }

    // 2. Compute Discount (10% if subtotal > 1000)
    function computeDiscount($subtotal) {
        if ($subtotal > 1000) {
            return $subtotal * 0.10;
        }
        return 0;
    }

    // 3. Compute Tax (12% VAT)
    function computeTax($amount) {
        return $amount * 0.12;
    }

    // 4. Compute Final Amount
    function computeFinalAmount($subtotal, $discount, $tax) {
        return $subtotal - $discount + $tax;
    }

    // 5. Format Currency
    function formatCurrency($amount) {
        return "₱" . number_format(round($amount, 2), 2); // Built-in: number_format, round
    }

    // Processing
    $subtotal = computeSubtotal($price, $quantity);
    $discount = computeDiscount($subtotal);
    $tax = computeTax($subtotal - $discount);
    $finalAmount = computeFinalAmount($subtotal, $discount, $tax);

    // Built-in example: strlen
    $nameLength = strlen($itemName);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaction Summary</title>
    <style>
        body { font-family: Arial; background:#f2f2f2; }
        .container {
            width: 450px;
            margin: 60px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        p { margin: 8px 0; }
        h2 { text-align: center; }
        a { display: block; text-align: center; margin-top: 15px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Transaction Summary</h2>

    <p><strong>Item Name:</strong> <?php echo $itemName; ?> (<?php echo $nameLength; ?> characters)</p>
    <p><strong>Price:</strong> <?php echo formatCurrency($price); ?></p>
    <p><strong>Quantity:</strong> <?php echo $quantity; ?></p>
    <hr>
    <p><strong>Subtotal:</strong> <?php echo formatCurrency($subtotal); ?></p>
    <p><strong>Discount:</strong> <?php echo formatCurrency($discount); ?></p>
    <p><strong>Tax (12%):</strong> <?php echo formatCurrency($tax); ?></p>
    <hr>
    <p><strong>Final Amount to Pay:</strong> <?php echo formatCurrency($finalAmount); ?></p>

    <a href="index.php">New Transaction</a>
</div>

</body>
</html>