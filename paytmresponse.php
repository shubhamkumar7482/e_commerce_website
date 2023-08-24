<?php
    session_start();
    require('DB/connection.php');
    require('functions.php');
	//print_r($_REQUEST); 
    if(!isset($_POST['STATUS'])  ||  !isset($_REQUEST['t'])){
        header('Location:/'); die();
    }
    $status = $_REQUEST['STATUS'];
    $token = base64_decode($_REQUEST['t']);
    $ordid =  $_SESSION['ordid'][$token];
    if($status!='TXN_FAILURE'){
        $sql = "UPDATE `orders` SET `is_paid` = '".$_REQUEST['BANKTXNID']."', `payment_time` = '".$_REQUEST['TXNDATE']."' WHERE `order_id` = ".$ordid ;
    }else{
        $sql = "UPDATE `orders` SET `is_paid` = '-1', order_status = 3 WHERE `order_id` = ".$ordid ; 
    }
    $stmtorder = $conn->prepare($sql);
    $res1 = $stmtorder->execute();
    unset($_SESSION["shopping_cart"]);
    unset($_SESSION["ordid"]);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html style="-moz-osx-font-smoothing: grayscale; -webkit-font-smoothing: antialiased; background-color: #464646; margin: 0; padding: 0;">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="format-detection" content="telephone=no"> 
        
    </head>
    <body bgcolor="#d7d7d7" class="generic-template" style="-moz-osx-font-smoothing: grayscale; -webkit-font-smoothing: antialiased; background-color: #d7d7d7; margin: 0; padding: 0; height: 100vh;"> 

        <!-- Content Start -->
        <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center" style="max-width: 600px;">
            <tr bgcolor="#d7d7d7">
                <td height="50" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
            </tr>

            <!-- This encapsulation is required to ensure correct rendering on Windows 10 Mail app. -->
            <tr bgcolor="#d7d7d7">
                <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                    <!-- Seperator Start -->
                    <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center" style="max-width: 600px; width: 100%;">
                        <tr bgcolor="#d7d7d7">
                            <td height="30" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                        </tr>
                    </table>
                    <!-- Seperator End -->

 <!-- Generic Pod Left Aligned with Price breakdown Start -->
                    <table align="center" cellpadding="0" cellspacing="0" cols="3" bgcolor="white" class="bordered-left-right" style="border-left: 10px solid #d7d7d7; border-right: 10px solid #d7d7d7; max-width: 600px; width: 100%;">
                        <tr height="50"><td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td></tr>
                        <tr align="center">
                            <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                            <td class="text-primary" style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                <img src="<?php echo $status=='TXN_FAILURE' ? 'https://icon-library.com/images/fail-icon/fail-icon-14.jpg'  : 'http://dgtlmrktng.s3.amazonaws.com/go/emails/generic-email-template/tick.png' ; ?>" alt="GO" width="50" style="border: 0; font-size: 0; margin: 0; max-width: 100%; padding: 0;">
                            </td>
                            <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                        </tr>
                        <tr height="17"><td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td></tr>
                        <tr align="center">
                            <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                            <td class="text-primary" style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                <h1 style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 30px; font-weight: 700; line-height: 34px; margin-bottom: 0; margin-top: 0;"><?php echo $status=='TXN_FAILURE' ? 'Payment Failed.'  : 'Payment received' ; ?></h1>
                            </td>
                            <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                        </tr>
                        <tr height="30"><td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td></tr>
                        <?php if($status!='TXN_FAILURE'){ ?>
                        <tr align="left">
                            <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                            <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;"> 
                                </p>
                            </td>
                            <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                        </tr>
                        <tr height="10"><td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td></tr>
                        <tr align="left">
                            <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                            <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">Your transaction was successful!</p>
                                <br>
                                <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0; "><strong>Payment Details:</strong><br/>

Amount: <?php echo $_REQUEST['CURRENCY']." ".$_REQUEST['TXNAMOUNT']  ?> <br/>
Transaction Id: <?php echo $_REQUEST['BANKTXNID']; ?><br/></p>
                                    <br>
                                <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">We advise to keep this email for future reference.&nbsp;&nbsp;&nbsp;&nbsp;<br/></p>
                            </td>
                            <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                        </tr>
                        <tr height="30">
                            <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                            <td style="border-bottom: 1px solid #D3D1D1; color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                            <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                        </tr>
                        <tr height="30"><td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td></tr>
                        <tr align="center">
                            <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                            <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;"><strong>Transaction reference: <?php echo $_REQUEST['TXNID']; ?></strong></p>
                                <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">Order date: <?php echo date("d/m/Y h:i A", strtotime($_REQUEST['TXNDATE'])) ?></p>
                                <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;"></p>
                            </td>
                            <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                        </tr>
                    <?php } else {?>
                        <tr align="center">
                            <td width="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;" colspan="3">
                                
                                <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 18px; line-height: auto; margin: 0;"><b>Unfortunately payment was rejected</b></p>
                                <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 30px; padding:0px 15px 10px 15px; white-space: nowrap;">Your transaction has failed due to some techincal error/wrong information. Please try Again</p>
                                
                            </td>
                        </tr>

                        <tr height="50">
                            <td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top; text-align: center;"><a href="/checkout.php" class="myButton">Try Again</a></td>
                        </tr>


                        <style type="text/css">
                            .myButton {
                                box-shadow:inset 0px 1px 0px 0px #fff6af;
                                background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
                                background-color:#ffec64;
                                border-radius:6px;
                                border:1px solid #ffaa22;
                                display:inline-block;
                                cursor:pointer;
                                color:#333333;
                                font-family:Trebuchet MS;
                                font-size:22px;
                                font-weight:bold;
                                padding:11px 26px;
                                text-decoration:none;
                                text-shadow:0px 1px 0px #ffee66;
                            }
                            .myButton:hover {
                                background:linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
                                background-color:#ffab23;
                            }
                            .myButton:active {
                                position:relative;
                                top:1px;
                            }
                        </style>

        
                    <?php } ?>
                        <tr height="50">
                            <td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                        </tr>

                    </table>
                    <!-- Generic Pod Left Aligned with Price breakdown End -->

                    <!-- Seperator Start -->
                    <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center" style="max-width: 600px; width: 100%;">
                        <tr bgcolor="#d7d7d7">
                            <td height="50" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                        </tr>
                    </table>
                    <!-- Seperator End -->

                </td>
            </tr>
        </table>
        <!-- Content End --> 
    </body>
</html>