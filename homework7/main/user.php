<?php
    function render() {
        $name = $_SESSION['name'];
        $login = $_SESSION['login'];
        $content = <<<php
        Ваше имя:
        <h3>$name</h3>
        Ваш логин:
        <h4>$login</h4>
        Добро пожаловать на сайт!
        <a href="?page=user&action=show_cart">Посмотреть вашу корзину</a>
php;
        return $content;
    }

    function show_cart() {        
        if ($_SESSION['cart']) {                
            foreach ($_SESSION['cart']['goods'] as $good) {
                $content .= "<div>{$good['name']} x {$good['quantity']} штуки x {$good['price']} рублей</div>
                <a href='?page=user&action=delete_item&good_id={$good['id']}'>Удалить товар</a>";            
            }
            $content .= "<br><span>Итоговая стоимость: {$_SESSION['cart']['totalPrice']} рублей</span>";
            return $content;
        } else {
            echo 'Ваша корзина пуста!';
        }
    }


    function add_to_cart() {
        global $link;

        (int)$product_id = $_GET['product_id'];
        $sql = "SELECT name, price FROM gods WHERE id = '$product_id'";
        $res = mysqli_query($link, $sql);    
        $row = mysqli_fetch_assoc($res);                  
        if (!$_SESSION['cart']) {            
            $_SESSION['cart'] = [];
            $_SESSION['cart']['goods'] = [];            
            $totalPrice = null;                        
            $product = ['id' => $product_id, 'name' => $row['name'], 'price' => $row['price'], 'quantity' => 1];
            $totalPrice = $row['price'];
            $_SESSION['cart']['totalPrice'] = $totalPrice;
            array_push($_SESSION['cart']['goods'], $product);                                
        } else {            
            $totalPrice = &$_SESSION['cart']['totalPrice'];
            $goods = &$_SESSION['cart']['goods'];
            $check_cart = product_quantity_manager($product_id);
            if ($check_cart === 'not found') {
                create_product_in_cart($goods, $product_id);                
            }
            update_cart_price();
            header('Location: ?page=user&action=show_cart');                                                                           
        }
                         
    }
    
    function delete_item() {                      
        (int)$good_id = $_GET['good_id'];
        $goods = &$_SESSION['cart']['goods'];
        $total_cost = &$_SESSION['cart']['totalPrice'];

        foreach ($goods as $key => &$good) {
            if ($good['id'] == $good_id) {
                $total_cost -= $good['price'] * $good['quantity'];
                unset($goods[$key]);                                                
            }
        }
        update_cart_price();
        header('Location: ?page=user&action=show_cart');
    }
    
    function update_cart_price() {
        if (!empty($_SESSION['cart']['goods'])) {
            $goods = &$_SESSION['cart']['goods'];
            $total_price = 0;
            $cart_price = &$_SESSION['cart']['totalPrice'];
            foreach ($goods as &$good) {
                $product_total = $good['price'] * $good['quantity'];
                $total_price += $product_total;
            }
        } else {
            delete_cart();
        }
            $cart_price = $total_price;
    }

    function delete_cart() {
        unset($_SESSION['cart']);
    }

    function product_quantity_manager($product_id){
        $status = 'not found';
        $goods = &$_SESSION['cart']['goods'];
        foreach ($goods as &$good) {
            if ($good['id'] == $product_id) {
                $good['quantity']++;
                $status = 'completed';
            } 
        }
        return $status;
    }

    function create_product_in_cart(&$goods, $product_id) {
        global $link;

        $sql = "SELECT name, price FROM gods WHERE id = '$product_id'";
        $res = mysqli_query($link, $sql);    
        $row = mysqli_fetch_assoc($res);
        $product = ['id' => $product_id, 'name' => $row['name'], 'price' => $row['price'], 'quantity' => 1];
        array_push($goods, $product);         
    }
?>