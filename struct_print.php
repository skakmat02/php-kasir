<?php
error_reporting(0);
$id = $_GET['id'];
include 'config.php';   //  echo $_SESSION['username']; exit();
include 'function.php';

$queryRowOrders = mysql_query("SELECT *
FROM
    `product`
    INNER JOIN `orders_detail` 
        ON (`product`.`product_id` = `orders_detail`.`product_id`)
    INNER JOIN `orders` 
        ON (`orders`.`id_orders` = `orders_detail`.`id_orders`) WHERE orders.id_orders= '" . $id . "'");
        
?>
<!--body wrapper start-->
 <div id="struk">
                <!-- struk -->
                <div style="width:327px; 
                padding:0 10px 20px 10px; 
                margin:0 auto; 
                background:#ffffff; color:#4d4d4d;
                 font:13px /1.5 Tahoma; border:4px double #dddddd;">


                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>

                        <tr>
                            <td valign="top"
                                style="width:100px; padding:10px 0; border-bottom:4px double #dddddd;text-align: center;">
                                <img src="assets/images/logo-struk.png" style="margin:0 auto; width:75px; border:0;">
                            </td>


                            <td colspan="2" valign="top"
                                style="width:180px; padding:10px 0; border-bottom:4px double #dddddd; text-align:center; font-size:11px; line-height:16px;    padding-top: 20px;">
                                Kasir<br>
                                Jl. Jalan<br>
                                TLP. 02685345859<br>
                                NPWP : 09.000.000.000.00.9-888.00
                            </td>
                        </tr>

                       

                        <?php

                        //exit();
                        $CetakNota = mysql_query("SELECT * FROM orders_detail,product 
                                     WHERE orders_detail.product_id=product.product_id 
                                     AND id_orders='$id'");
                        $totalcetak = 0;
                        $itemcetak = 0;
                        while ($datacetak = mysql_fetch_array($CetakNota)) {
							$cashs = $datacetak['cash'];
                            $subtotalcetak = +$datacetak['jumlah'] * $datacetak['product_price'];
                            $totalcetak += $subtotalcetak;
                            $itemcetak += $datacetak['jumlah'];
                            ?>
                             <tr>
                            <td valign="top" style="width:100px; padding:10px 0 0 0; font-size:11px; ">
                                Nota : <?php echo $id_orders; ?> </td>
                            <td colspan="2" valign="top" style="width:100px; padding:10px 0 0 0;font-size:11px; "> KASA
                                : 01 <?php echo $_SESSION['username']; ?>
                            </td>
                        </tr>
                            <tr>
                                <td valign="top"
                                    style="width:100px; padding:10px 0 0 0; font-size:11px; "><?php echo $datacetak['product_id']; ?></td>
                                <td valign="top" style="width:100px; padding:10px 0 0 0;font-size:11px; ">
                                    <?php echo $datacetak['product_name']; ?>
                                </td>
                                <td style="font-size:11px; text-align: right;">
                                    Rp. <?php echo number_format($subtotalcetak, 0, ',', '.'); ?></td>
                            </tr>
                            </tr>
                            <?php
                        }
                        ?>

                        <tr>
                            <td></td>
                            <td valign="top" style="width:100px; padding:10px 0 0 0;font-size:11px; ">Netto</td>
                            <td valign="top" style="width:100px; padding:10px 0 0 0;font-size:11px;text-align: right; ">
                                Rp. <?php echo number_format($totalcetak, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px; ">CASH</td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px;text-align: right; ">
                                Rp. <?php echo number_format(str_replace(".", "",$cashs), 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px; ">Kembali</td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px;text-align: right;">
                                <?php
                                $kembali = str_replace(".", "",$cashs) - $totalcetak;
                                echo number_format($kembali, 0, ',', '.');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px; ">Items</td>
                            <td valign="top"
                                style="width:100px; padding:3px 0 0 0;font-size:11px;text-align: right; "><?php echo $itemcetak; ?></td>
                        </tr>

                        <tr>
                            <td colspan="3" valign="top"
                                style="text-align: center;width:100px; padding:10px 0 0 0;font-size:11px; ">
                                ***************<?php echo date("Y-m-d") . "-" . date("H:i:s"); ?>**************
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: center;font-size:11px; ">BARANG YANG SUDAH DIBELI</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: center;font-size:11px; ">TIDAK DAPAT
                                DITUKAR/DIKEMBALIKAN
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
<!--body wrapper end-->
<script type="text/javascript">
function printDiv(elementId) {
 var a = document.getElementById('struk').value;
 var b = document.getElementById(elementId).innerHTML;
 window.frames["struk"].document.title = document.title;
 window.frames["struk"].document.body.innerHTML = '<style>' + a + '</style>' + b;
 window.frames["struk"].window.focus();
 window.frames["struk"].window.print();
}
</script>
