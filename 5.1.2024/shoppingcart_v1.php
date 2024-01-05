<?php

//Mảng chứa thông tin sản phẩm
$products = array(
    array("id" => 1, "name" => "Áo polo", "Price" => 25),
    array("id" => 2, "name" => "Quần Jeans", "Price" => 50),
    array("id" => 3, "name" => "Giày Sneakers", "Price" => 40)
);

//Kiểm tra nếu giỏ hàng chưa được tạo, thì tạo mới
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

//Hàm đã thêm sản phẩm vào giỏ hàng
function addToCart($productID)
{
    global $products;

    foreach ($products as $product) {
        if ($product["id"] == $productID) {
            $_SESSION['cart'][] = $product;
            echo "Đã thêm" . $product['name'] . "Vào giỏ hàng";
            return;
        }
    }

    echo "Sản phẩm không tồn tại.";
}

//Hàm hiển thị giỏ hàng
function viewCart()
{
    if (empty($_SESSION['cart'])) {
        echo "Giỏ hàng trống.";
    } else {
        echo "<h2>Giỏ hàng của bạn:</h2>";
        $totalPrice = 0;

        foreach ($_SESSION['cart'] as $item) {
            echo $item['name'] . " - $" . $item['price'] . "<br>";
            $totalPrice += $item['price'];
        }

        echo "<strong>Tổng giá trị: $" . $totalPrice . "</strong>";
    }
}

//Sử dụng các hàm để thực hiện các chức năng
addToCart(1);
addToCart(2);
viewCart();

?>