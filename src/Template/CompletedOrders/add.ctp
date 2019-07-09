<br>
<div style="width: 50%;margin: auto;">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">ENTER KOT NO</h3>
        </div>
        <div class="panel-body">
            <form method="POST">
            <table width="100%">
                <tr>
                    <td width="15%"></td>
                    <td>
                        <input type="text" name="kot_no" placeholder="Kot No" class="form-control">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-danger">Show to the customer</button>
                    </td>
                    <td width="15%"></td>
                </tr>
            </table>
            </form>
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
    </div>
</div>



    <div style="text-align: center;">
        
    </div>
</div>