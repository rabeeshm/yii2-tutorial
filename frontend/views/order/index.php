<?php
?>
<div class="Modal_Modal__2-MHQ" style="transform: translateY(-100vh); opacity: 0;"></div>
<div>
   <?php foreach ($orders as $order) {
      $orderArray = json_decode($order->order_details, true);
      $orderDetails = $orderArray['ingredients'];
   ?>
   <div class="Order_Order__1uwdZ">
      <p>Ingredients :<span class="Order_Ingredients__sQ-7W">meat(<?= $orderDetails['Meat'] ?? 0 ?>)</span><span class="Order_Ingredients__sQ-7W">cheese(<?= $orderDetails['Cheese'] ?? 0 ?>)</span><span class="Order_Ingredients__sQ-7W">salad(<?= $orderDetails['Salad'] ?? 0 ?>)</span><span class="Order_Ingredients__sQ-7W">bacon(<?= $orderDetails['Bacon'] ?? 0 ?>)</span></p>
      <p>Price : <strong> USD <?= $order->total_price??0 ?></strong></p>
   </div>
   <?php
      }
   ?>
</div>