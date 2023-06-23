<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<?php 
// Include the configuration file  
require_once 'config.php'; 
 
// Include the database connection file  
require_once 'dbConnect.php'; 
 
$payment_ref_id = $statusMsg = ''; 
$status = 'error'; 
 
// Check whether the payment ID is not empty 
if(!empty($_GET['pid'])){ 
    $payment_txn_id  = base64_decode($_GET['pid']); 
     
    // Fetch transaction data from the database 
    $sqlQ = "SELECT id,txn_id,paid_amount,paid_amount_currency,payment_status,customer_name,customer_email FROM transactions WHERE txn_id = ?"; 
    $stmt = $db->prepare($sqlQ);  
    $stmt->bind_param("s", $payment_txn_id); 
    $stmt->execute(); 
    $stmt->store_result(); 
 
    if($stmt->num_rows > 0){ 
        // Get transaction details 
        $stmt->bind_result($payment_ref_id, $txn_id, $paid_amount, $paid_amount_currency, $payment_status, $customer_name, $customer_email); 
        $stmt->fetch(); 
         
        $status = 'success'; 
        $statusMsg = 'Your Payment has been Successful!'; 
    }else{ 
        $statusMsg = "Transaction has been failed!"; 
    } 
}else{ 
    header("Location: index.php"); 
    exit; 
} 
?>
<div class="row mt-5">
    <div class="col-4"></div>
    <div class="col-4">
        <div class="card shadow">
            <div class="card-body text-center">
                <?php if(!empty($payment_ref_id)){ ?>
                    <h1 class="display-4 <?php echo $status; ?>"><?php echo $statusMsg; ?></h1>

                    <h4 class="mt-4">Payment Information</h4>
                    <p class="mb-2"><b>Reference Number:</b> <?php echo $payment_ref_id; ?></p>
                    <p class="mb-2"><b>Transaction ID:</b> <?php echo $txn_id; ?></p>
                    <p class="mb-2"><b>Paid Amount:</b> <?php echo $paid_amount.' '.$paid_amount_currency; ?></p>
                    <p class="mb-4"><b>Payment Status:</b> <?php echo $payment_status; ?></p>

                    <h4 class="mt-4">Customer Information</h4>
                    <p class="mb-2"><b>Name:</b> <?php echo $customer_name; ?></p>
                    <p class="mb-4"><b>Email:</b> <?php echo $customer_email; ?></p>

                    <h4 class="mt-4">Product Information</h4>
                    <p class="mb-2"><b>Name:</b> <?php echo $itemName; ?></p>
                    <p class="mb-4"><b>Price:</b> <?php echo $itemPrice.' '.$currency; ?></p>
                <?php }else{ ?>
                    <h1 class="display-4 error">Your Payment has failed!</h1>
                    <p class="error"><?php echo $statusMsg; ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

