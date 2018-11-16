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

    function show_cart($link) {
        $id = $_SESSION['id'];
        $sql ="SELECT data FROM orders WHERE id = '$id'";
        $res = mysqli_query($link, $sql);
        $row= mysqli_fetch_assoc($res);
        $user_data =  json_decode($row['data'], true);
        
        $goods = $user_data['goods'];
        foreach ($goods as $good) {
            $content .= "<div>
                <span>{$good['name']} x <span>{$good['quantity']}</span></span> 
            </div>";
        }
        $content .= "<span>Итого на сумму: {$user_data['totalPrice']} рублей</span>";
        return $content;
    }

    function add_to_cart($link) {
       $user_id = $_SESSION['id'];
       $sql = "SELECT data FROM orders WHERE user_id = '$user_id'";
       $res = mysqli_query($link, $sql);
       $row = mysqli_fetch_assoc($res);
       
       if ($row) {
            $cart = json_decode($row['data'], true);
            
       }
    }
?>