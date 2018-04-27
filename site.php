<?php
use \Hcode\Page;
use \Hcode\Model\Product;


$app->get('/', function() {

  $products = Product::listAll();
	//$sql = new Hcode\DB\Sql();
  //$results = $sql->select("SELECT * FROM tb_users");
  //echo json_encode($results);

  $page = new Page();
  $page->setTpl("index", [
    'products'=>Product::checkList($products)
  ]);

});



?>
