<!DOCTYPE html>
<html>
<head>
    <title>Transaction Form</title>
    <style>
        body { font-family: Arial; background:#f2f2f2; }
        .container {
            width: 400px;
            margin: 60px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, button {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
        }
        button {
            background: #007BFF;
            color: white;
            border: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Transaction Form</h2>

    <form method="POST" action="process.php">
        <label>Item Name:</label>
        <input type="text" name="item_name" required>

        <label>Price:</label>
        <input type="number" name="price" step="0.01" required>

        <label>Quantity:</label>
        <input type="number" name="quantity" required>

        <button type="submit">Process Transaction</button>
    </form>
</div>

</body>
</html>