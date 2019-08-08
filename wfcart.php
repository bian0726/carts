<?php
class wfCart { //建立購物車類別 ， 使用網路的套件製作
	var $total = 0;
	var $itemcount = 0;
	var $items = array();
	var $itemprices = array();
	var $itemqtys = array();
	var $iteminfo = array();

	function cart() {} // constructor function

	function get_contents(){ // 取得購物清單
		$items = array(); //商品陣列
		foreach($this->items as $tmp_item){
			$item = FALSE;
			$item['id'] = $tmp_item;
			$item['qty'] = $this->itemqtys[$tmp_item];
			$item['price'] = $this->itemprices[$tmp_item];
			$item['info'] = $this->iteminfo[$tmp_item];
			$item['subtotal'] = $item['qty'] * $item['price'];
       	 	$items[] = $item;
		}
		return $items;
	} //結束


	function add_item($itemid,$qty=1,$price = FALSE, $info = FALSE)
	{ // 新增商品項目到購物車
        if(!$price){
	        $price = wf_get_price($itemid,$qty);
	    }
        if(!$info){
            $info = ($itemid);
	    }
		if($this->itemqtys[$itemid] > 0){ // 如果商品已存在，直接累加商品
			$this->itemqtys[$itemid] = $qty + $this->itemqtys[$itemid];
			$this->_update_total();
		} else {
			$this->items[]=$itemid;
			$this->itemqtys[$itemid] = $qty;
			$this->itemprices[$itemid] = $price;
			$this->iteminfo[$itemid] = $info;
		}
		$this->_update_total();
	} // end


	function edit_item($itemid,$qty)
	{ // changes an items quantity

		if($qty < 1) {
			$this->del_item($itemid);
		} else {
			$this->itemqtys[$itemid] = $qty;
		}
		$this->_update_total();
	} // end


	function del_item($itemid)
	{ // 刪除商品項目
		$ti = array();
		$this->itemqtys[$itemid] = 0;
		foreach($this->items as $item)
		{
			if($item != $itemid)
			{
				$ti[] = $item;
			}
		}
		$this->items = $ti;
		$this->_update_total();
	} //end of del_item


        function empty_cart()
	{ // empties / resets the cart
                $this->total = 0;
	        $this->itemcount = 0;
	        $this->items = array();
                $this->itemprices = array();
	        $this->itemqtys = array();
                $this->iteminfo = array();
	} // end of empty cart


	function _update_total()
	{ // 更改總數
	    $this->itemcount = 0;
		$this->total = 0;
                if(sizeof($this->items > 0))
		{
                        foreach($this->items as $item) {
                                $this->total = $this->total + ($this->itemprices[$item] * $this->itemqtys[$item]);
				$this->itemcount++;
			}
		}
	} // end
}
?>
