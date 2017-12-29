<h1><?php echo $title; ?></h1>
<?php foreach($goods as $goods_item): ?>
<h2>Name:<?php echo $goods_item['name']; ?><h2>
<br>
<h3>Category:<?php echo $goods_item['category']; ?></h3>
<br>
<h3>Price:<?php echo $goods_item['price']; ?></h3>
<br>
<h3>result number:<?php echo $goods_item['res']; ?></h3>
<br>
<h3>picture:<h3>
<br>
<img src="<?php echo $goods_item['pic']; ?>">
