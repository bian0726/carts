<?php
include("head.php"); //引用頁首
require_once("conn.php"); //連結資料庫
include("wfcart.php"); //引用購物車類別

session_start();      // start the session
$cart = &$_SESSION['cart']; //把 $cart 指向session cart
if (!is_object($cart)) $cart = new wfCart(); //若沒有相同項目就新增一個
// 移除購物車內容
if (isset($_GET["action"]) && ($_GET["action"] == "remove")) {
  $rid = intval($_GET['delid']);
  $cart->del_item($rid); //呼叫刪除的處理function
  header("Location: cart.php");
}
// 清空購物車內容
if (isset($_GET["action"]) && ($_GET["action"] == "empty")) {
  $cart->empty_cart();
  header("Location: cart.php");
}
?>


<section id="fh5co-pricing" data-section="pricing">
  <section class="pricing-section bg-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 section-heading text-center">
          <h2 class="animate-box">Cart List</h2>
          <?php if ($cart->itemcount > 0) { ?>
          </div>
          <div class="row">
            <div>
              <form action="" method="post">
                <table class="table" style="font-family:'Microsoft JhengHei'">
                  <thead>
                    <tr>
                      <th>項目</th>
                      <th>商品編號</th>
                      <th>商品名稱</th>
                      <th>單價</th>
                      <th>數量</th>
                      <th>價格</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 0;
                    $t = 0;
                    foreach ($cart->get_contents() as $item) { //讀出項目清單
                      ?>
                      <tr>
                        <td><?php ++$i;
                            $t += $item['subtotal'];
                            echo $i //紀錄項目數量
                            ?></td>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['info'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td><?= $item['qty'] ?></td>
                        <td><?= $item['subtotal'] ?></td>
                        <td><a class="btn" href="?action=remove&delid=<?= $item['id']; //傳送刪除的指令?>">delete</a></td>
                        <input name=updateid[] type="hidden" id="updateid[]" value="<?= $item['id']; ?>">
                      </tr>
                    <?php } ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>總計</td>
                      <td><?= $t . ' 元'; $_SESSION['total']= $t; ?></td>
                    </tr>
                  </tbody>
                </table>
                <input class="btn" style="font-family:'Microsoft JhengHei'" type="button" value="繼續選購" onClick="window.location.href='product.php';">
                <input class="btn" style="font-family:'Microsoft JhengHei'" type="button" value="結帳去" onClick="alert('....等待後續設計');">
              </form>
            <?php } else { ?>
              <div class="row">
                <div class="col-md-8 col-md-offset-2 subtext animate-box">
                  <h3>There is nothing in your cart.</h3>
                  <input class="btn" style="font-family:'Microsoft JhengHei'" type="button" value="回上一頁" onClick="window.location.href='product.php';">
                </div>
              </div>
            <?php } ?>
          </div>

        </div>
      </div>
  </section>
</section>

<?php include("foot.php") //頁尾?>