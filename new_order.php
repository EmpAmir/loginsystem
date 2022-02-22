<?php session_start();
require_once('../includes/config.php');
//Code for Registration 
if (isset($_POST['submit'])) {
    $usdt_rate = $_POST['usdt_rate'];
    $usdt_total = $_POST['usdt_total'];
    $inr_total = $_POST['inr_total'];
    $msg = mysqli_query($con, "insert into orders(usdt_rate,usdt_total,inr_total) values('$usdt_rate','$usdt_total','$inr_total')");
    if ($msg) {
        echo "<script>alert('Order Create successfully');</script>";
        echo "<script type='text/javascript'> document.location = 'manage-orders.php'; </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>User Create Order</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>


</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h2 text-align="center">Create New Order</h2>
                                    <hr />
                                    <h3 class="text-center font-weight-light my-4">Create Order</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" name="signup">
                                        <div class="row mb-3">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected>Select Buyer</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3 ">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="usdt_rate" name="usdt_rate" type="text" placeholder="Enter USDT Rate" value="" required />
                                                    <label for="inputRate">USDT Rate</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <input class="form-control" id="usdt_total" name="usdt_total" type="text" placeholder="Enter USDT Total" value="" required />
                                                    <label for="inputUSDT">USDT Total</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <input class="form-control" id="inr_total" name="inr_total" type="text" placeholder="INR Total" value="" required readonly />
                                                    <label for="inputINR">INR Total</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" class="btn btn-primary" name="submit">Create New Order</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="manage-orders.php">Back to Home</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <?php include_once('../includes/footer.php'); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script>
        $('#usdt_rate, #usdt_total').on('input', function() {
            var usdt_rate = parseFloat($('#usdt_rate').val()) || 0;
            var usdt_total = parseFloat($('#usdt_total').val()) || 0;

            $('#inr_total').val(usdt_rate * usdt_total);
        });
    </script>
</body>

</html>