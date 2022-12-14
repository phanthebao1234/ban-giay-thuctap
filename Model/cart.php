<?php
    function addCart($product_id, $product_quantity) {
        $db = new Products();
        $product = $db->getDetailProducts($product_id);
        $product_name = $product['TenSanPham'];
        $product_price = $product['GiaSanPham'];
        $product_image = $product['HinhSanPham'];
        $total = $product_price * $product_quantity;
        if(isset($_SESSION['cart'][$product_id])) {
            $product_quantity += $_SESSION['cart'][$product_id]['product_quantity'];
            updateItem($product_id, $product_quantity);
            return; 
        } 
        $item = array(
            'product_id' => $product_id, 
            'product_name' => $product_name,
            'product_image' => $product_image, 
            'product_price' => $product_price,
            'product_quantity' => $product_quantity,
            'total' => $total,
        );

        $_SESSION['cart'][$product_id] = $item;   
    }

    function getTotal($sale = 0, $pttt = 0) {
        $subtotal=0;
        foreach($_SESSION['cart'] as $item)
        {
            $subtotal+=$item['total'];
        }
        $subtotal= $subtotal - $sale*$subtotal - $pttt*$subtotal;
        return $subtotal;
    }

    function getFinalPrice($sale, $pttt) {
        $subtotal=0;
        foreach($_SESSION['cart'] as $item)
        {
            $subtotal+=$item['total'];
        }
        $subtotal= $sale*$subtotal + $pttt*$subtotal;
        return $subtotal;
    }

    function updateItem($product_id,$quantity) {
        if($quantity<=0) {
            unset($_SESSION['cart'][$product_id]);
        }
        else{
            // cập nhật lại là chỉ thực hiện phép gán lại
            $_SESSION['cart'][$product_id]['product_quantity']=$quantity;//$_SESSION['cart'][21]['qty']=4
            // phải tính lại tổng tiền
            $totalnew=$_SESSION['cart'][$product_id]['product_quantity']*$_SESSION['cart'][$product_id]['product_price'];
            $_SESSION['cart'][$product_id]['total']= $totalnew;
        }
        
    }
