<h1><?php echo $title; ?></h1>
<?php foreach($orders as $orders_item): ?>
<h2>buyer name:<?php echo $orders_item['username']; ?><h2>
<br>
<h3>good name:<?php echo $orders_item['name']; ?></h3>
<br>
<h3>price:<?php echo $orders_item['price']; ?></h3>
<br>
<h3>order time:<?php echo $orders_item['ordertime']; ?></h3>
