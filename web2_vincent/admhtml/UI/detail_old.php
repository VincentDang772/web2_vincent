<div class="form-wrapper">
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chi tiết đơn hàng</h5>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <div class="cart-row">
                    <span class="cart-item cart-header cart-column">Sản Phẩm</span>
                    <span class="cart-price cart-header cart-column">Giá</span>
                    <span class="cart-quantity cart-header cart-column">Số Lượng</span>
                </div>
            </div>
            <div class="cart-items">

                <!-- php cho nay -->

                <?php
                while ($row = $details->fetch_assoc()) {

                    $rowSP = $sanpham[$row['MASP']];
                    $sum = 0;
                ?>

                    <div class="cart-row">
                        <div class="cart-item cart-column">
                            <img class="cart-item-image" src="<?= $rowSP['image'] ?>" width="100" height="100">
                            <span class="cart-item-title"><?= $rowSP['tensp'] ?></span>
                        </div>
                        <span class="cart-price cart-column"><?php if ($rowSP['gia'] == $rowSP['giamgia']) {
                                                                    $sum = $sum + $rowSP["gia"] * ($row['soluong']);
                                                                    echo $rowSP['gia'];
                                                                } else {
                                                                    $sum = $sum + $rowSP["giamgia"] * ($row['soluong']);
                                                                    echo $rowSP['giamgia'];
                                                                } ?></span>
                        <div class="cart-quantity cart-column">
                            <input class="cart-quantity-input" type="text" value="<?php echo $rowSP["gia"] * ($row['soluong']); ?>">

                        </div>
                    </div>
                <?php } ?>
                <?php $connectDB->close(); ?>



            </div>
            <form action="thaotacmua.php" method="post" onsubmit="return validateForm1()">
                <div class="cart-total">
                    <strong class="cart-total-title">Tổng Cộng:</strong>
                    <span class="cart-total-price"><?= $sum ?>USD</span>
                </div>



                <input type="hidden" name="mua" value="1">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary order">Thanh Toán</button>
                </div>
        </div>
        <?php if (isset($_REQUEST['done'])) {
            echo "<br>";
            if ($_REQUEST['done'] == 1) {
                echo "<b><i style='color:red;font-size:25px;margin-left:35%;font-weight;text-shadow:2px 2px 2px orange;'>cảm ơn quý khách đã mua hàng tại SVT!</i></b>";
            } else if ($_REQUEST['done'] == 2) {
                echo "<b><i style='color:red;font-size:25px;margin-left:40%;font-weight;text-shadow:2px 2px 2px aqua;'>quý khách chưa có gì trong giỏ hàng!</i></b>";
            }
        } ?>
        <br><br><br><br><br><br>
    </div>
</div>