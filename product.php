	<?php
	include("head.php");//引用頁首
	require_once("conn.php");//連結資料庫
	include("wfcart.php"); //引用購物車類別

	session_start();      // start the session
	$cart = &$_SESSION['cart']; //把 $cart 指向session cart
	if (!is_object($cart)) $cart = new wfCart(); //若沒有相同項目就新增一個

	$result = $mysqli->query("select * from product");

  if (isset($_POST["add"]) && ($_POST["add"] == "add")) { //新增購物車
	    $cart->add_item($_POST['id'], $_POST['qty'], $_POST['price'], $_POST['name']);
			header("Location: cart.php");
  }
	?>

	<section id="fh5co-pricing" data-section="pricing">
		<section class="pricing-section bg-3">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="animate-box">Product List</h2>
						<!-- <div class="row">
	                        <div class="col-md-8 col-md-offset-2 subtext animate-box">
	                            <h3>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</h3>
	                        </div>
	                    </div> -->
					</div>
				</div>
				<div style="font-family:'Microsoft JhengHei'" class="row">
					<?php while ($row = $result->fetch_assoc()) { ?>
						<div class="col-md-4 text-center animate-box">
							<div class="pricing__item">
								<p class="pricing__sentence">商品名稱</p>
								<h3 class="pricing__title"><?= $row['productName'] ?></h3>
								<div class="pricing__price"><span class="pricing_currency">$ </span><?= $row['productPrice'] ?></div>
								<ul class="pricing__feature-list">
									<li class="pricing__feature">單位：<?= $row['productUnit'] ?></li>
									<li class="pricing__feature">類別：<?= $row['productCategory'] ?></li>
								</ul>
								<form  method="post" action="">
									<input type="submit" class="btn btn-primary btn-lg pricing__action" value="Add to cart">
									<input name="id" type="hidden" id="id" value="<?= $row['productID'] ?>">
									<input name="name" type="hidden" id="name" value="<?= $row['productName'] ?>">
									<input name="price" type="hidden" id="price" value="<?= $row['productPrice'] ?>">
									<input name="qty" type="hidden" id="qty" value="1">
									<input name="add" type="hidden" id="add" value="add">
								</form>
							</div>
						</div>
					<?php } ?>

				</div>
			</div>
		</section>
	</section>
	<?php include("foot.php") ?>
