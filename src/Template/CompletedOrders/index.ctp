<!DOCTYPE html>
<html>
<head>
<title>Order Completed</title>
<link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
</head>
<body style="background: url(http://localhost/shivam_plaza_github/img/bg3.jpg);">
    <div style="margin: auto;width: 70%">
        <div style="text-align: center;">
            <?php echo $this->Html->Image('/img/Dosa-Plaza-Logo.jpeg',['style' => 'height: 90px;']); ?>
        </div>
        <div style="font-size: 26px; color: #FFF; text-align: center;">YOUR ORDER IS READY.</div>
        <table width="100%" cellspacing="20px">
            <tr>
                <td width="50%">
                    <div style="height: 200px;background-color: #FFF;text-align: center;">
                        <br><br><br><span style="font-size: 70px;color: #323233;">
                            <?php 
                            if($completedOrders->toArray()[0]->bill_no){
                                echo str_pad($completedOrders->toArray()[0]->bill_no, 4, "0", STR_PAD_LEFT);
                            }
                            ?>
                        </span>
                    </div>
                </td>
                <td width="50%">
                    <div style="height: 200px;background-color: #FFF;text-align: center;">
                        <br><br><br><span style="font-size: 70px;color: #323233;">
                            <?php 
                            if($completedOrders->toArray()[1]->bill_no){
                                echo str_pad($completedOrders->toArray()[1]->bill_no, 4, "0", STR_PAD_LEFT);
                            }
                            ?>
                        </span>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="50%">
                    <div style="height: 200px;background-color: #FFF;text-align: center;">
                        <br><br><br><span style="font-size: 70px;color: #323233;">
                            <?php 
                            if($completedOrders->toArray()[2]->bill_no){
                                echo str_pad($completedOrders->toArray()[2]->bill_no, 4, "0", STR_PAD_LEFT);
                            }
                            ?>
                        </span>
                    </div>
                </td>
                <td width="50%">
                    <div style="height: 200px;background-color: #FFF;text-align: center;">
                        <br><br><br><span style="font-size: 70px;color: #323233;">
                            <?php 
                            if($completedOrders->toArray()[3]->bill_no){
                                echo str_pad($completedOrders->toArray()[3]->bill_no, 4, "0", STR_PAD_LEFT);
                            }
                            ?>
                        </span>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
<script type="text/javascript">
    setInterval(function(){ location.reload(); }, 5000);
</script>