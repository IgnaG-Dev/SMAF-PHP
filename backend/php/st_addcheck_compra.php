<?php
    

    if(isset($_POST['order-compra'])){
        //
        $stck=$_POST['st'];
        $quanti=$_POST['quantity'];
        $idpro=$_POST['stpro'];
        //
        $user_id=$_POST['pdrus'];
         //$user_cli=$_POST['cxtip'];
        $method=$_POST['cxtcre'];
        //$placed = date('d-M-Y');
        $placed_on=$_POST['txtdate'];

        //$fecc=$_POST['txtdate'];
        
        $tipc = $_POST['cxcom'];
        $tottal = $_POST['txtprrc'];

        $cart_total = 0;
        $cart_products[] = '';

        $card_id=$_POST['idcart'];
        $total_products1=$_POST['product1'];
        $quantity1 = $_POST['canti'];

        $cart_query = $connect->prepare("SELECT cart_compra.idcarco, usuarios.id, usuarios.nombre, producto.idprod, producto.codba, producto.nomprd, producto.precio, producto.stock, cart_compra.name, cart_compra.price, cart_compra.quantity FROM cart_compra INNER JOIN usuarios ON cart_compra.user_id = usuarios.id INNER JOIN producto ON cart_compra.idprod = producto.idprod WHERE  user_id = ?");
        $cart_query->execute([$user_id]);


        if($cart_query->rowCount() > 0){
      while($cart_item = $cart_query->fetch(PDO::FETCH_ASSOC)){
         $cart_products[] = $cart_item['name'].' ( '.$cart_item['quantity'].' )';
         $sub_total = ($cart_item['precio'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      };
   };


   $total_products = implode(', ', $cart_products);

   $order_query = $connect->prepare("SELECT * FROM `compra` WHERE method = ?  AND total_products = ? AND total_price = ? AND tipc = ?");
   $order_query->execute([$method, $total_products, $cart_total, $tipc]);


   if($cart_total == 0){
      $message[] = 'Tu carrito esta vacío';
   }elseif($order_query->rowCount() > 0){
      $message[] = 'pedido realizado ya!';
   }else{

      $insert_order = $connect->prepare("INSERT INTO `compra`(user_id, method, total_products, total_price, placed_on,payment_status, tipc) VALUES(?,?,?,?,?, 'Aceptado', ?)");
      $insert_order->execute([$user_id, $method,$total_products, $cart_total, $placed_on, $tipc]);
      
      $delete_cart = $connect->prepare("DELETE FROM `cart_compra` WHERE user_id = ?");
      $delete_cart->execute([$user_id]);



   $d4 = $connect->prepare("INSERT INTO gastos (detall,total,fec) VALUES('COMPRA DE PRODUCTOS',?,?)");
   
   $d4->execute([$tottal,  $placed_on]);


      $tamanio = count($quantity1);
      for ($i=0; $i < $tamanio ; $i++) { 
          $statement3 = $connect->prepare("UPDATE producto SET stock = stock + $quantity1[$i] WHERE idprod = $total_products1[$i];");
          $inserted = $statement3->execute(); 
      }

      if ($inserted>0) {
          echo '<script type="text/javascript">
swal("¡Registrado!", "La compra se realizo con exito", "success").then(function() {
            window.location = "../compra/mostrar.php";
        });
        </script>'; 
      }



     
     
   }


    }

?>