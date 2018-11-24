<?php
    function show_orders(){
        global $link;
        $sql = "SELECT id, user_name, status FROM orders";
        $res = mysqli_query($link, $sql);
        if (null != ($row = mysqli_fetch_assoc($res))) {
            while ($row = mysqli_fetch_assoc($res)){
                $content .= <<<php
                <span>{$row['user_name']}</span><br>
                <span>Статус заказа {$row['status']}</span><br> 
                <a href='?page=admin&action=moderate&id={$row['id']}'>Управлять заказом</a>
php;
            }
        return $content;
        } else {echo 'Заказов для модерации нет';}        
    }

    function moderate(){
        global $link;
        $order_id = $_GET['id'];
        $sql = "SELECT id, user_name, order_json, status FROM orders";
        $res = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($res);
        if (isset($row)) {
        $order_status = $row['status'];
        $order_info = json_decode($row['order_json'], true);
        foreach ($order_info['goods'] as $good){
            $content .= "<div>{$good['name']} x {$good['quantity']} x Штук {$good['price']} рублей</div>";
        }
        $content .= "<div>Итоговая стоимость: {$order_info['totalPrice']}</div>";
        $content .= "<div>Статус заказа: {$row['status']}</div>";
        $content .= "<a href='#' onclick=" . "send('admin','delete_order',$order_id)" . ">Удалить заказ</a>";

        return $content;
        } else {echo 'Заказов для модерации нет';}
    }

    function delete_order(){
        global $link;
        $order_id = $_GET['id'];        
        $sql = "DELETE from orders WHERE id = '$order_id'";
        $res = mysqli_query($link, $sql);
        echo 'Заказ удалён';
        exit;                
    }
?>