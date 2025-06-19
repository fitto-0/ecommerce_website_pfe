<?php
// process_payment.php
include('../includes/connect.php');
session_start();

// Simple flag to track result
$status = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = isset($_POST['order_id']) ? intval($_POST['order_id']) : 0;
    $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;
    $payment_method = $_POST['payment_method'] ?? '';
    $transaction_id = $_POST['transaction_id'] ?? '';
    $username = $_SESSION['username'] ?? 'guest';

    if ($order_id && $amount && $payment_method && $transaction_id) {
        $stmt = $con->prepare("INSERT INTO payments (order_id, username, amount, payment_method, transaction_id, payment_date) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param('isdss', $order_id, $username, $amount, $payment_method, $transaction_id);

        if ($stmt->execute()) {
            $con->query("UPDATE orders SET status='Paid' WHERE order_id=$order_id");
            $status = 'success';
            $message = '✅ Payment processed successfully!';
        } else {
            $status = 'danger';
            $message = '❌ Failed to process payment. Please try again.';
        }
        $stmt->close();
    } else {
        $status = 'warning';
        $message = '⚠️ Missing required payment information.';
    }
} else {
    $status = 'danger';
    $message = '🚫 Invalid request.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Payment Status</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #fceff9, #e6d9f3);
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
    }

    .status-box {
      background: #fff;
      padding: 2.5rem 3rem;
      border-radius: 1rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      animation: fadeIn 1s ease-in-out, slideUp 0.8s ease-out;
      text-align: center;
      max-width: 400px;
      width: 90%;
    }

    .status-box h2 {
      font-weight: 600;
      color: #6e1a79;
      margin-bottom: 1rem;
    }

    .alert {
      font-size: 1.1rem;
      padding: 1rem;
      margin-top: 1rem;
      border-radius: 0.75rem;
    }

    .btn-back {
      margin-top: 1.5rem;
      background-color: #6e1a79;
      color: white;
      padding: 0.7rem 1.5rem;
      border: none;
      border-radius: 0.5rem;
      transition: background 0.3s;
    }

    .btn-back:hover {
      background-color: #3f0d4f;
    }

    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity: 1;}
    }

    @keyframes slideUp {
      from {transform: translateY(50px);}
      to {transform: translateY(0);}
    }
  </style>
</head>
<body>

  <div class="status-box">
    <h2>Payment Status</h2>
    <div class="alert alert-<?php echo $status; ?>">
      <?php echo $message; ?>
    </div>
    <a href="../users_area/checkout.php" class="btn btn-back mt-3">← Go Back</a>
  </div>

</body>
</html>
