<style type="text/css">
.read-more-target {
  opacity: 0;
  max-height: 0;
  font-size: 0;
  transition: .25s ease;

}

.read-more-state:checked ~ .read-more-wrap .read-more-target {
  opacity: 1;
  max-height: 999em;
}

input#bg, #price2, #price3, #price4, #price5, #price6, #price7, #price8, #price9, #price10, #quantity1, #quantity2, #quantity3, #quantity4, #quantity5, #quantity6, #quantity7, #quantity8, #quantity9, #quantity10 {
  background-color: #e9ecef;
}
</style>
<?php include '../auth/auth.php'; ?>
<?php include '_css.php'; ?>
  <body onload="startTime();">
    <div class="container-scroller">
    <?php include '_horizontal-navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="container">
            <div class="row mt-4">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3 class="text-dark font-weight-bold mb-2">
                      Liquidation <em class="text-danger">(Reminder: this liquidation form is sample only, it depends to your liquidation form used.)</em>
                    </h3><br/>
                    <div class="table-responsive">
                      <?php 

                      include '../auth/connection.php';

                        if (isset($_POST['btn_purchase'])) {

                          $_SESSION['success'] = $_POST['status'].". The Liquidation sent to finance for cash voucher";

                          $requestor = $_POST['requestor'];
                          $dateTime = $_POST['date']." ".$_POST['time'];
                          $transaction_no = $_POST['transaction_no'];
                          $availability_status = $_POST['availability_status'];
                          $status = $_POST['status'];
                          $project_no = $_POST['project_no'];
                          $material_requested1 = isset($_POST['material_requested1']) ? $_POST['material_requested1'] : '';
                          $material_requested2 = isset($_POST['material_requested2']) ? $_POST['material_requested2'] : '';
                          $material_requested3 = isset($_POST['material_requested3']) ? $_POST['material_requested3'] : '';
                          $material_requested4 = isset($_POST['material_requested4']) ? $_POST['material_requested4'] : '';
                          $material_requested5 = isset($_POST['material_requested5']) ? $_POST['material_requested5'] : '';
                          $material_requested6 = isset($_POST['material_requested6']) ? $_POST['material_requested6'] : '';
                          $material_requested7 = isset($_POST['material_requested7']) ? $_POST['material_requested7'] : '';
                          $material_requested8 = isset($_POST['material_requested8']) ? $_POST['material_requested8'] : '';
                          $material_requested9 = isset($_POST['material_requested9']) ? $_POST['material_requested9'] : '';
                          $material_requested10 = isset($_POST['material_requested10']) ? $_POST['material_requested10'] : '';
                          $quantity1 = isset($_POST['quantity1']) ? $_POST['quantity1'] : '';
                          $quantity2 = isset($_POST['quantity2']) ? $_POST['quantity2'] : '';
                          $quantity3 = isset($_POST['quantity3']) ? $_POST['quantity3'] : '';
                          $quantity4 = isset($_POST['quantity4']) ? $_POST['quantity4'] : '';
                          $quantity5 = isset($_POST['quantity5']) ? $_POST['quantity5'] : '';
                          $quantity6 = isset($_POST['quantity6']) ? $_POST['quantity6'] : '';
                          $quantity7 = isset($_POST['quantity7']) ? $_POST['quantity7'] : '';
                          $quantity8 = isset($_POST['quantity8']) ? $_POST['quantity8'] : '';
                          $quantity9 = isset($_POST['quantity9']) ? $_POST['quantity9'] : '';
                          $quantity10 = isset($_POST['quantity10']) ? $_POST['quantity10'] : '';
                          $price1 = isset($_POST['price1']) ? $_POST['price1'] : '';
                          $price2 = isset($_POST['price2']) ? $_POST['price2'] : '';
                          $price3 = isset($_POST['price3']) ? $_POST['price3'] : '';
                          $price4 = isset($_POST['price4']) ? $_POST['price4'] : '';
                          $price5 = isset($_POST['price5']) ? $_POST['price5'] : '';
                          $price6 = isset($_POST['price6']) ? $_POST['price6'] : '';
                          $price7 = isset($_POST['price7']) ? $_POST['price7'] : '';
                          $price8 = isset($_POST['price8']) ? $_POST['price8'] : '';
                          $price9 = isset($_POST['price9']) ? $_POST['price9'] : '';
                          $price10 = isset($_POST['price10']) ? $_POST['price10'] : '';
                          $amount1 = isset($_POST['amount1']) ? $_POST['amount1'] : '';
                          $amount2 = isset($_POST['amount2']) ? $_POST['amount2'] : '';
                          $amount3 = isset($_POST['amount3']) ? $_POST['amount3'] : '';
                          $amount4 = isset($_POST['amount4']) ? $_POST['amount4'] : '';
                          $amount5 = isset($_POST['amount5']) ? $_POST['amount5'] : '';
                          $amount6 = isset($_POST['amount6']) ? $_POST['amount6'] : '';
                          $amount7 = isset($_POST['amount7']) ? $_POST['amount7'] : '';
                          $amount8 = isset($_POST['amount8']) ? $_POST['amount8'] : '';
                          $amount9 = isset($_POST['amount9']) ? $_POST['amount9'] : '';
                          $amount10 = isset($_POST['amount10']) ? $_POST['amount10'] : '';
                          $check_status1 = isset($_POST['check_status1']) ? $_POST['check_status1'] : '';
                          $check_status2 = isset($_POST['check_status2']) ? $_POST['check_status2'] : '';
                          $check_status3 = isset($_POST['check_status3']) ? $_POST['check_status3'] : '';
                          $check_status4 = isset($_POST['check_status4']) ? $_POST['check_status4'] : '';
                          $check_status5 = isset($_POST['check_status5']) ? $_POST['check_status5'] : '';
                          $check_status6 = isset($_POST['check_status6']) ? $_POST['check_status6'] : '';
                          $check_status7 = isset($_POST['check_status7']) ? $_POST['check_status7'] : '';
                          $check_status8 = isset($_POST['check_status8']) ? $_POST['check_status8'] : '';
                          $check_status9 = isset($_POST['check_status9']) ? $_POST['check_status9'] : '';
                          $check_status10 = isset($_POST['check_status10']) ? $_POST['check_status10'] : '';
                          $cash_request = $_POST['cash_request'];
                          $location = $_POST['location'];
                          $sales_receipt = $_POST['sales_receipt'];
                          $purchaser = $_POST['purchaser'];
                          $id = $_POST['id'];

                          $query = mysqli_query($conn, "UPDATE request_material SET requestor = '$requestor', dateTime = '$dateTime', status = '$status', location = '$location' WHERE id = '$id' ");

                          $query_history = mysqli_query($conn, "INSERT INTO transaction_history (requestor, dateTime, transaction_no, material_requested1, material_requested2, material_requested3, material_requested4, material_requested5, material_requested6, material_requested7, material_requested8, material_requested9, material_requested10, quantity1, quantity2, quantity3, quantity4, quantity5, quantity6, quantity7, quantity8, quantity9, quantity10, status, availability_status, project_no, location) VALUES ('$requestor', '$dateTime', '$transaction_no', '$material_requested1', '$material_requested2', '$material_requested3', '$material_requested4', '$material_requested5', '$material_requested6', '$material_requested7', '$material_requested8', '$material_requested9', '$material_requested10', '$quantity1', '$quantity2', '$quantity3', '$quantity4', '$quantity5', '$quantity6', '$quantity7', '$quantity8', '$quantity9', '$quantity10', '$status', '$availability_status', '$project_no', '$location') ");

                          $query_liquidation = mysqli_query($conn, "INSERT INTO liquidation (requestor, dateTime, transaction_no, material_requested1, material_requested2, material_requested3, material_requested4, material_requested5, material_requested6, material_requested7, material_requested8, material_requested9, material_requested10, quantity1, quantity2, quantity3, quantity4, quantity5, quantity6, quantity7, quantity8, quantity9, quantity10, status, availability_status, project_no, price1, price2, price3, price4, price5, price6, price7, price8, price9, price10, amount1, amount2, amount3, amount4, amount5, amount6, amount7, amount8, amount9, amount10, cash_request, location, sales_receipt, purchaser, check_status1, check_status2, check_status3, check_status4, check_status5, check_status6, check_status7, check_status8, check_status9, check_status10) VALUES ('$requestor', '$dateTime', '$transaction_no', '$material_requested1', '$material_requested2', '$material_requested3', '$material_requested4', '$material_requested5', '$material_requested6', '$material_requested7', '$material_requested8', '$material_requested9', '$material_requested10', '$quantity1', '$quantity2', '$quantity3', '$quantity4', '$quantity5', '$quantity6', '$quantity7', '$quantity8', '$quantity9', '$quantity10', '$status', '$availability_status', '$project_no', '$price1', '$price2', '$price3', '$price4', '$price5', '$price6', '$price7', '$price8', '$price9', '$price10', '$amount1', '$amount2', '$amount3', '$amount4', '$amount5', '$amount6', '$amount7', '$amount8', '$amount9', '$amount10', '$cash_request', '$location', '$sales_receipt', '$purchaser', '$check_status1', '$check_status2', '$check_status3', '$check_status4', '$check_status5', '$check_status6', '$check_status7', '$check_status8', '$check_status9', '$check_status10') ");

                        }
                      mysqli_close($conn);
                      ?>
                      <?php if (isset($_SESSION['success'])) : ?>
                        <div class="success" id="message">
                          <h3 class="alert alert-warning">
                            <center>  
                              <?php 
                                echo $_SESSION['success']; 
                                unset($_SESSION['success']);
                              ?>
                             </center>
                          </h3>
                        </div>
                      <?php endif ?>
                      <form method="POST" action="">
                        <?php 

                        include '../auth/connection.php';
                        if (isset($_GET['id'])) {

                          $id = $_GET['id'];
                          $query = mysqli_query($conn, "SELECT * FROM request_material WHERE id = '$id' ");
                          $i = 1;
                          while ($row = mysqli_fetch_array($query)) {
                          ?>
                        <div class="row">
                          <div class="col-md-6">
                            <label>SALES RECEIPT</label>
                            <input type="text" class="form-control" name="sales_receipt" value="<?php echo $row['location']; ?> <?php echo $_SESSION['user']['name']; ?>" readonly>
                          </div>
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-6">
                                <label>Date</label>
                                <input type="text" class="form-control" id="frmDate" name="date" readonly>
                              </div>
                              <div class="col-md-6">
                                <label>Time</label>
                                <input type="text" class="form-control" id="frmTime" name="time" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-1">
                            <label>Quantity</label>
                            <?php if ($row['check_status1'] == "for purchase") {?>
                            <input type="text" id="quantity1" name="quantity1" class="form-control" value="<?php echo $row['quantity1']; ?>"  readonly>
                            <?php } ?>
                            <?php if ($row['check_status2'] == "for purchase") {?>
                            <input type="text" id="quantity2" name="quantity2" class="form-control" value="<?php echo $row['quantity2']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status3'] == "for purchase") {?>
                            <input type="text" id="quantity3" name="quantity3" class="form-control" value="<?php echo $row['quantity3']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status4'] == "for purchase") {?>
                            <input type="text" id="quantity4" name="quantity4" class="form-control" value="<?php echo $row['quantity4']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status5'] == "for purchase") {?>
                            <input type="text" id="quantity5" name="quantity5" class="form-control" value="<?php echo $row['quantity5']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status6'] == "for purchase") {?>
                            <input type="text" id="quantity6" name="quantity6" class="form-control" value="<?php echo $row['quantity6']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status7'] == "for purchase") {?>
                            <input type="text" id="quantity7" name="quantity7" class="form-control" value="<?php echo $row['quantity7']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status8'] == "for purchase") {?>
                            <input type="text" id="quantity8" name="quantity8" class="form-control" value="<?php echo $row['quantity8']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status9'] == "for purchase") {?>
                            <input type="text" id="quantity9" name="quantity9" class="form-control" value="<?php echo $row['quantity9']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status10'] == "for purchase") {?>
                            <input type="text" id="quantity10" name="quantity10" class="form-control" value="<?php echo $row['quantity10']; ?>" readonly>
                            <?php } ?>
                          </div>
                          <div class="col-md-5">
                            <label>Item Description</label>
                            <?php if ($row['check_status1'] == "for purchase") {?>
                            <input type="text" name="material_requested1" class="form-control" value="<?php echo $row['material_requested1']; ?>"  readonly>
                            <?php } ?>
                            <?php if ($row['check_status2'] == "for purchase") {?>
                            <input type="text" name="material_requested2" class="form-control" value="<?php echo $row['material_requested2']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status3'] == "for purchase") {?>
                            <input type="text" name="material_requested3" class="form-control" value="<?php echo $row['material_requested3']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status4'] == "for purchase") {?>
                            <input type="text" name="material_requested4" class="form-control" value="<?php echo $row['material_requested4']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status5'] == "for purchase") {?>
                            <input type="text" name="material_requested5" class="form-control" value="<?php echo $row['material_requested5']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status6'] == "for purchase") {?>
                            <input type="text" name="material_requested6" class="form-control" value="<?php echo $row['material_requested6']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status7'] == "for purchase") {?>
                            <input type="text" name="material_requested7" class="form-control" value="<?php echo $row['material_requested7']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status8'] == "for purchase") {?>
                            <input type="text" name="material_requested8" class="form-control" value="<?php echo $row['material_requested8']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status9'] == "for purchase") {?>
                            <input type="text" name="material_requested9" class="form-control" value="<?php echo $row['material_requested9']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status10'] == "for purchase") {?>
                            <input type="text" name="material_requested10" class="form-control" value="<?php echo $row['material_requested10']; ?>" readonly>
                            <?php } ?>
                          </div>
                          <div class="col-md-3">
                            <label>Price per piece:</label>
                            <?php if ($row['check_status1'] == "for purchase") {?>
                            <input type="text" id="price1" name="price1" class="form-control" value="<?php echo $row['price1']; ?>"  readonly>
                            <?php } ?>
                            <?php if ($row['check_status2'] == "for purchase") {?>
                            <input type="text" id="price2" name="price2" class="form-control" value="<?php echo $row['price2']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status3'] == "for purchase") {?>
                            <input type="text" id="price3" name="price3" class="form-control" value="<?php echo $row['price3']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status4'] == "for purchase") {?>
                            <input type="text" id="price4" name="price4" class="form-control" value="<?php echo $row['price4']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status5'] == "for purchase") {?>
                            <input type="text" id="price5" name="price5" class="form-control" value="<?php echo $row['price5']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status6'] == "for purchase") {?>
                            <input type="text" id="price6" name="price6" class="form-control" value="<?php echo $row['price6']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status7'] == "for purchase") {?>
                            <input type="text" id="price7" name="price7" class="form-control" value="<?php echo $row['price7']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status8'] == "for purchase") {?>
                            <input type="text" id="price8" name="price8" class="form-control" value="<?php echo $row['price8']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status9'] == "for purchase") {?>
                            <input type="text" id="price9" name="price9" class="form-control" value="<?php echo $row['price9']; ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status10'] == "for purchase") {?>
                            <input type="text" id="price10" name="price10" class="form-control" value="<?php echo $row['price10']; ?>" readonly>
                            <?php } ?>
                          </div>
                          <div class="col-md-3">
                            <label>Amount:</label>
                            <?php if ($row['check_status1'] == "for purchase") {?>
                            <input type="text" name="amount1" class="form-control" value="₱<?php echo ($row['price1'] * $row['quantity1']); ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status2'] == "for purchase") {?>
                            <input type="text" name="amount2" class="form-control" value="₱<?php echo ($row['price2'] * $row['quantity2']); ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status3'] == "for purchase") {?>
                            <input type="text" name="amount3" class="form-control" value="₱<?php echo ($row['price3'] * $row['quantity3']); ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status4'] == "for purchase") {?>
                            <input type="text" name="amount4" class="form-control" value="₱<?php echo ($row['price4'] * $row['quantity4']); ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status5'] == "for purchase") {?>
                            <input type="text" name="amount5" class="form-control" value="₱<?php echo ($row['price5'] * $row['quantity5']); ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status6'] == "for purchase") {?>
                            <input type="text" name="amount6" class="form-control" value="₱<?php echo ($row['price6'] * $row['quantity6']); ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status7'] == "for purchase") {?>
                            <input type="text" name="amount7" class="form-control" value="₱<?php echo ($row['price7'] * $row['quantity7']); ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status8'] == "for purchase") {?>
                            <input type="text" name="amount8" class="form-control" value="₱<?php echo ($row['price8'] * $row['quantity8']); ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status9'] == "for purchase") {?>
                            <input type="text" name="amount9" class="form-control" value="₱<?php echo ($row['price9'] * $row['quantity9']); ?>" readonly>
                            <?php } ?>
                            <?php if ($row['check_status10'] == "for purchase") {?>
                            <input type="text" name="amount10" class="form-control" value="₱<?php echo ($row['price10'] * $row['quantity10']); ?>" readonly>
                            <?php } ?>
                            <input type="text" name="cash_request" class="form-control" value="<?php echo $row['cash_request']; ?>" readonly>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <input type="submit" name="btn_purchase" class="form-control btn btn-success btn-lg" value="SUBMIT LIQUIDATION">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <input type="hidden" name="check_status1" value="<?php echo $row['check_status1']; ?>">
                              <input type="hidden" name="check_status2" value="<?php echo $row['check_status2']; ?>">
                              <input type="hidden" name="check_status3" value="<?php echo $row['check_status3']; ?>">
                              <input type="hidden" name="check_status4" value="<?php echo $row['check_status4']; ?>">
                              <input type="hidden" name="check_status5" value="<?php echo $row['check_status5']; ?>">
                              <input type="hidden" name="check_status6" value="<?php echo $row['check_status6']; ?>">
                              <input type="hidden" name="check_status7" value="<?php echo $row['check_status7']; ?>">
                              <input type="hidden" name="check_status8" value="<?php echo $row['check_status8']; ?>">
                              <input type="hidden" name="check_status9" value="<?php echo $row['check_status9']; ?>">
                              <input type="hidden" name="check_status10" value="<?php echo $row['check_status10']; ?>">
                              <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>" >
                              <input type="hidden" name="location" class="form-control" value="<?php echo $_SESSION['user']['group_str']; ?>" >
                              <input type="hidden" name="requestor" class="form-control" value="<?php echo $_SESSION['user']['name']; ?>" >
                              <input type="hidden" name="status" class="form-control" value="Purchasing Item" >
                              <input type="hidden" name="availability_status" class="form-control" value="<?php echo $row['availability_status']; ?>" >
                            </div>
                          </div>
                        </div>
                        <input type="checkbox" class="read-more-state" id="post-2"> VIEW ITEM DESCRIPTION<br/><br/>
                        <div class="form-group read-more-wrap">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="text-danger read-more-target">Project No.:</label>
                                    <input type="text" id="bg" name="project_no" class="form-control read-more-target" value="<?php echo $row['project_no']; ?>" >
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="text-danger read-more-target">Transaction No:</label>
                                    <input type="text" id="bg" name="transaction_no" class="form-control read-more-target" value="<?php echo $row['transaction_no']; ?>" >
                                  </div>
                                </div>
                                <div class="col-md-5">
                                  <div class="form-group">
                                    <label class="text-danger read-more-target">Date/Time Released:</label>
                                    <input type="text" id="bg" name="" class="form-control read-more-target" value="<?php echo $row['dateTime']; ?>" >
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="text-danger read-more-target">Purchaser</label>
                                    <input type="text" id="bg" name="purchaser" class="form-control read-more-target" value="<?php echo $row['purchaser']; ?>" >
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="text-danger read-more-target">Total Cash Released</label>
                                    <input type="text" id="bg" name="" class="form-control read-more-target" value="<?php echo $row['cash_request']; ?>" >
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="read-more-target">Item Description:</label>
                                    <?php if ($row['check_status1'] == "for purchase") {?>
                                    <input type="text" id="bg" name="" class="form-control read-more-target" value="<?php echo $row['material_requested1']; ?>" >
                                    <?php } ?>
                                    <?php if ($row['check_status2'] == "for purchase") {?>
                                    <input type="text" id="bg" name="" class="form-control read-more-target" value="<?php echo $row['material_requested2']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status3'] == "for purchase") {?>
                                    <input type="text" id="bg" name="" class="form-control read-more-target" value="<?php echo $row['material_requested3']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status4'] == "for purchase") {?>
                                    <input type="text" id="bg" name="" class="form-control read-more-target" value="<?php echo $row['material_requested4']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status5'] == "for purchase") {?>
                                    <input type="text" id="bg" name="" class="form-control read-more-target" value="<?php echo $row['material_requested5']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status6'] == "for purchase") {?>
                                    <input type="text" id="bg" name="" class="form-control read-more-target" value="<?php echo $row['material_requested6']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status7'] == "for purchase") {?>
                                    <input type="text" id="bg" name="" class="form-control read-more-target" value="<?php echo $row['material_requested7']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status8'] == "for purchase") {?>
                                    <input type="text" id="bg" name="" class="form-control read-more-target" value="<?php echo $row['material_requested8']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status9'] == "for purchase") {?>
                                    <input type="text" id="bg" name="" class="form-control read-more-target" value="<?php echo $row['material_requested9']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status10'] == "for purchase") {?>
                                    <input type="text" id="bg" name="" class="form-control read-more-target" value="<?php echo $row['material_requested10']; ?>">
                                    <?php } ?>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="read-more-target">Quantity:</label>
                                    <?php if ($row['check_status1'] == "for purchase") {?>
                                    <input type="text" id="quantity1" name="" class="form-control read-more-target" value="<?php echo $row['quantity1']; ?>" >
                                    <?php } ?>
                                    <?php if ($row['check_status2'] == "for purchase") {?>
                                    <input type="text" id="quantity2" name="" class="form-control read-more-target" value="<?php echo $row['quantity2']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status3'] == "for purchase") {?>
                                    <input type="text" id="quantity3" name="" class="form-control read-more-target" value="<?php echo $row['quantity3']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status4'] == "for purchase") {?>
                                    <input type="text" id="quantity4" name="" class="form-control read-more-target" value="<?php echo $row['quantity4']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status5'] == "for purchase") {?>
                                    <input type="text" id="quantity5" name="" class="form-control read-more-target" value="<?php echo $row['quantity5']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status6'] == "for purchase") {?>
                                    <input type="text" id="quantity6" name="" class="form-control read-more-target" value="<?php echo $row['quantity6']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status7'] == "for purchase") {?>
                                    <input type="text" id="quantity7" name="" class="form-control read-more-target" value="<?php echo $row['quantity7']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status8'] == "for purchase") {?>
                                    <input type="text" id="quantity8" name="" class="form-control read-more-target" value="<?php echo $row['quantity8']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status9'] == "for purchase") {?>
                                    <input type="text" id="quantity9" name="" class="form-control read-more-target" value="<?php echo $row['quantity9']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status10'] == "for purchase") {?>
                                    <input type="text" id="quantity10" name="" class="form-control read-more-target" value="<?php echo $row['quantity10']; ?>">
                                    <?php } ?>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="read-more-target">Price:</label>
                                    <?php if ($row['check_status1'] == "for purchase") {?>
                                    <input type="text" id="price1" name="" class="form-control read-more-target" value="<?php echo $row['price1']; ?>" >
                                    <?php } ?>
                                    <?php if ($row['check_status2'] == "for purchase") {?>
                                    <input type="text" id="price2" name="" class="form-control read-more-target" value="<?php echo $row['price2']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status3'] == "for purchase") {?>
                                    <input type="text" id="price3" name="" class="form-control read-more-target" value="<?php echo $row['price3']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status4'] == "for purchase") {?>
                                    <input type="text" id="price4" name="" class="form-control read-more-target" value="<?php echo $row['price4']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status5'] == "for purchase") {?>
                                    <input type="text" id="price5" name="" class="form-control read-more-target" value="<?php echo $row['price5']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status6'] == "for purchase") {?>
                                    <input type="text" id="price6" name="" class="form-control read-more-target" value="<?php echo $row['price6']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status7'] == "for purchase") {?>
                                    <input type="text" id="price7" name="" class="form-control read-more-target" value="<?php echo $row['price7']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status8'] == "for purchase") {?>
                                    <input type="text" id="price8" name="" class="form-control read-more-target" value="<?php echo $row['price8']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status9'] == "for purchase") {?>
                                    <input type="text" id="price9" name="" class="form-control read-more-target" value="<?php echo $row['price9']; ?>">
                                    <?php } ?>
                                    <?php if ($row['check_status10'] == "for purchase") {?>
                                    <input type="text" id="price10" name="" class="form-control read-more-target" value="<?php echo $row['price10']; ?>">
                                    <?php } ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php }} ?>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <?php include '_footer.php'; ?>
      </div>
      <!-- main-panel ends -->
    </div>
    </div>
    <?php include '_js.php'; ?>
  </body>
</html>
<script type="text/javascript">
  setTimeout(function(){
    $("#message").fadeOut(400);
  }, 7000)
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#check').DataTable();
  } );
</script>
<script type="text/javascript">
  $('#myModal').modal(options)
</script>
<script type="text/javascript">
  function getDate(){
   var todaydate = new Date();
   var day = todaydate.getDate();
   var month = todaydate.getMonth() + 1;
   var year = todaydate.getFullYear();
   var datestring = month + "/" + day + "/" + year;
   document.getElementById("frmDate").value = datestring;
  } 
  getDate(); 
</script>
<script type="text/javascript">
  function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);

  var s = "AM";
  if (h >= 12) {
    s = "PM";
    h = h - 12;
  }
  if (h == 0) {
   h = 12;
  }
  document.getElementById('frmTime').value =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
  }

  function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
  }
</script>