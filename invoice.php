<?php
session_start();
require("DB/connection.php");
require('functions.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/logo.png" rel="icon" />
    <title>General Invoice - Shubhda Enterprises</title>

    <!-- Web Fonts
======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

    <!-- Stylesheet
======================= -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" type="text/css" href="invoice/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="invoice/vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="invoice/css/stylesheet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Container -->
    <div class="container-fluid invoice-container" id="invoice">
        <!-- Header -->
        <header>
            <div class="row align-items-center">
                <div class="col-sm-7 text-center text-sm-start mb-3 mb-sm-0">
                    <img id="logo" src="images/logo-new.png" title="Shubhda Enterprises" alt="Shubhda Enterprises"  />
                </div>
                <div class="col-sm-5 text-center text-sm-end">
                    <h4 class="text-7 mb-0">Invoice</h4>
                </div>
            </div>
            <hr>
        </header>

        <!-- Main Content -->
        <main>
            <?php
            if (isset($_GET['invoice_id'])) {
                $invoice_id = $_GET['invoice_id'];
                $sql = "SELECT * FROM orders INNER JOIN address_book ON orders.address_id = address_book.address_id INNER JOIN users ON users.users_id = orders.users_id  WHERE orders.invoice_id = '$invoice_id'";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute();
                $count = $stmt->rowCount();
                $row = $stmt->fetchAll();
                foreach ($row as $rows) {
                   $useridd= $rows['users_id'];
                ?>
                    <div class="row">

                        <div class="col-sm-6"><strong>Date:</strong> <?php echo $rows['order_time'] ?></div>
                        <div class="col-sm-6 text-sm-end"> <strong>Invoice No:</strong> #<?php echo $rows['invoice_id'] ?><br />
                        Order Id :- <strong>#<?php echo $rows['order_id'] ?></strong> 
                        <?php echo $rows['address'] ?>
                        </div>
                        <input type="hidden" id="input-invoice" value="<?php echo $rows['invoice_id'] ?>">
                        
                    </div>
                      <?php } } ?>
                    <hr>
                    <?php

                
                $sql = "SELECT * FROM address_book WHERE users_id='$useridd'";
            
                   $stmt = $conn->prepare($sql);
                $result = $stmt->execute();
                $count = $stmt->rowCount();
                $row = $stmt->fetchAll();
                foreach ($row as $rows) { ?>
                    <div class="row">
                        <div class="col-sm-6 text-sm-end order-sm-1"> <strong>Invoice To:</strong>
                        <address>
                                
                              <b> Name</b> <?php echo $rows['full_name'] ?><br />
                              <b> Delivery AT</b>: <?php echo $rows['address_type'] ?><br />
                              <b> Email</b>: <?php echo $rows['email'] ?><br />
                              <b>Phone</b>: +91 <?php echo $rows['phone'] ?><br />
                               <b>Delivery Address</b>: <?php echo $rows['address'] ?> ,
                                <?php echo $rows['state'] ?> 
                               &nbsp;<?php echo $rows['city'] ?>
                                -<?php echo $rows['pincode'] ?>
                            </address>
                            
                        </div>
                        <div class="col-sm-6 order-sm-0"> <strong>Invoice From:</strong>
                            <address>
                                 <b>Shubhda Enterprises</b> <br />
                                <b>Address: F-23, DHOLA BHATA UIT COLONY, AJMER, Ajmer, Rajasthan, 305001</b><br/> 
                                <b>GSTIN/UIN : 08ANSPB0400G1ZH</b><br />
                            </address>
                        </div>
                    </div>


<?php }
// $address.='</div>';
// $data = array(
// // 	'address'		=>	$address,
// );	
// echo json_encode($data);
                    ?>
                    
          


            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="card-header">
                                <tr>
                                    <td class="col-2"><strong>Images</strong></td>
                                    <td class="col-4"><strong>Products</strong></td>
                                    <td class="col-2 text-center"><strong>Rate</strong></td>
                                    <td class="col-2 text-center"><strong>IGST</strong></td>
                                    <td class="col-1 text-center"><strong>QTY</strong></td>
                                    <td class="col-3 text-end" style="min-width: 100px;"><strong>Amount</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['invoice_id'])) {
                                    $invoice_id = $_GET['invoice_id'];
                                    $sql = "SELECT * FROM orders INNER JOIN order_products ON orders.invoice_id = order_products.invoice_id WHERE orders.invoice_id = '$invoice_id'";
                                    $stmt = $conn->prepare($sql);
                                    $result = $stmt->execute();
                                    $count = $stmt->rowCount();
                                    $row = $stmt->fetchAll();
                                    $subtotal = 0;
                                    foreach ($row as $rows) {  
                                        $total_pay = $rows['total_pay']; 
                                        $total_tax = $rows['total_tax'];
                                        $subtotal =  $subtotal+$rows['total_price']; 
                                        
                                        if(!empty($rows['pdid'])){
                                            $tax = "&#x20b9; ".gettaxprice($conn, $rows['pdid']);     
                                        }else{
                                            $tax = 'NA';
                                        }
                                        
                                        ?>
                                        <tr>
                                            <td class="">
                                                <img src="product-images/<?php echo $rows['p_image'] ?>" alt="{{ $item->p_name }}" srcset="" style="max-width: 100px;height:80px">
                                            </td>
                                            <td class="text-1"><?php echo $rows['p_name']."<br/>Size: <b>".$rows['p_size']."</b>"."<br/>Color: <b>".$rows['p_color']."</b>"; ?></td>
                                            <td class="text-center">&#x20b9; <?php echo number_format($rows['p_price'],2)  ?></td>
                                            <td class="text-center"> <?php echo $tax  ?></td>
                                            <td class="text-center"><?php echo $rows['p_qty'] ?></td>
                                            <td class="text-end">&#x20b9; <?php echo number_format($rows['total_price'],2)  ?></td>
                                        </tr>
                                <?php }
                                }

                                ?>
                            </tbody>
                            <!-- @foreach ($order_summary as $item) -->
                            <tfoot class="card-footer">
                                <tr>
                                    <td colspan="5" class="text-end"><strong>Sub Total:</strong></td>
                                    <td class="text-end">&#x20b9; <?php echo number_format($subtotal,2); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-end"><strong>Discounted:</strong></td>
                                    <td class="text-end">&#x20b9; - 00.00</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-end"><strong>Tax:</strong></td>
                                    <td class="text-end">&#x20b9; <?php echo $total_tax; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-end border-bottom-0"><strong>Total:</strong></td>
                                    <td class="text-end border-bottom-0">&#x20b9; <?php echo number_format($total_pay,2); ?></td>
                                </tr>
                            </tfoot>
                            <!-- @endforeach -->
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer -->
        <footer class="text-center mt-4">
            <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical
                signature.</p>
            <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a> <a href="javascript:void(0)" id="download" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-download"></i> Download</a> </div>
        </footer>

    </div>
    <script>
        window.onload = function() {
            let order_id = this.document.getElementById("input-invoice").value;
            var opt = {
                margin: 0.2,
                filename: 'Invoice_' + order_id + '.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };
            document.getElementById("download").addEventListener("click", () => {
                let invoice = this.document.getElementById("invoice");
                html2pdf(invoice, opt).save();
            })
        }
    </script>

</body>

</html>