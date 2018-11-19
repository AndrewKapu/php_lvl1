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
        foreach ($_SESSION['cart']['goods'] as $good) {
            $content .= "<div>{$good['name']} x {$good['quantity']} штуки x {$good['price']} рублей</div>
            <a href='?page=user&action=delete_item&good_id={$good['id']}'>Удалить товар</a>";            
        }
        $content .= "<br><span>Итоговая стоимость: {$_SESSION['cart']['totalPrice']} рублей</span>";
        return $content;
    }


    function add_to_cart($link) {
        (int)$product_id = $_GET['product_id'];
        $sql = "SELECT name, price FROM gods WHERE id = '$product_id'";
        $res = mysqli_query($link, $sql);    
        $row = mysqli_fetch_assoc($res);                  
        if (!$_SESSION['cart']) {
            var_dump('Была создана новая корзина');
            $_SESSION['cart'] = [];
            $_SESSION['cart']['goods'] = [];            
            $totalPrice = null;                        
            $product = ['id' => $product_id, 'name' => $row['name'], 'price' => $row['price'], 'quantity' => 1];
            $totalPrice = $row['price'];
            $_SESSION['cart']['totalPrice'] = $totalPrice;
            array_push($_SESSION['cart']['goods'], $product);                                
        } else {
            var_dump('Корзина уже есть');
            $totalPrice = &$_SESSION['cart']['totalPrice'];
            $goods = &$_SESSION['cart']['goods'];            
            foreach ($goods as &$good) {
                if ($good['id'] == $product_id) {                    
                    var_dump('Такой товар уже был в корзине, просто увеличиваем его кол-во');
                    $good['quantity']++;
                    $totalPrice += $good['price'];                                                            
                } else {
                    var_dump('Это новый товар, создаём его');
                    $product = ['id' => $product_id, 'name' => $row['name'], 'price' => $row['price'], 'quantity' => 1];
                    $totalPrice += $row['price'];
                    array_push($goods, $product);
                    break;
            } 
            
            
            }
                                        
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
    } 

   /*  function show_cart($link) {
        $id = $_SESSION['id'];
        $sql ="SELECT data FROM orders WHERE id = '$id'";
        $res = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($res);    
        $user_data =  json_decode($row['data'], true);
        
        $goods = $user_data['goods'];        
        foreach ($goods as $good) {
            $content .= "<div>
                <span>{$good['name']} x <span>{$good['quantity']}</span></span> 
            </div>";
        }
        $content .= "<span>Итого на сумму: {$user_data['totalPrice']} рублей</span>";
        return $content;
    } */

    
    //Вернуться к реализации этой функции, если будет время
    /* function add_to_cart($link) {
       (int)$user_id = $_SESSION['id'];
       $sql = "SELECT data FROM orders WHERE user_id = '$user_id'";
       $res = mysqli_query($link, $sql);
       $row = mysqli_fetch_assoc($res);
       $product_id = (int)$_GET['product_id'];        
       //Если у пользователя есть корзина в бд
       if ($row) {
            $cart = json_decode($row['data'], true);
            foreach ($cart['goods'] as $key => $good) {                                                
                if ($good['productId'] === $product_id) {                                        
                    $good['quantity']++;
                    $cart['totalPrice'] += $good['price'];
                    $cart['goods'][$key] = $good;
                    var_dump($cart);                                        
                } else {
                    var_dump('Ой');
                    exit;                    
                    $sql = "SELECT id, name, price FROM gods WHERE id = '{$product_id}'";
                    $res = mysqli_query($link, $sql);
                    $row = mysqli_fetch_assoc($res);
                    $new_good = ['productId' => (int)$_GET['product_id'],
                    'name' => $row['name'],
                    'quantity' => 1,
                    'price' => (int)$row['price']        
                    ];
                    array_push($cart['goods'], $new_good);
                    $cart['totalPrice'] += $row['price'];                                        
                }
            }        
            $cart = json_encode($cart, JSON_UNESCAPED_UNICODE);
            $sql = "UPDATE orders SET data = '$cart' WHERE user_id = '$user_id'";
            $res = mysqli_query($link, $sql);            
       } else {
           $sql = "SELECT id, name, price FROM gods WHERE id = '{$product_id}'";
           $res = mysqli_query($link, $sql);
       }
    } */
?>