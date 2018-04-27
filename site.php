<?php
use \Hcode\Page;
use \Hcode\Model\Product;
use \Hcode\Model\Category;


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

$app->get("/categories/:idcategory", function($idcategory){
  $category = new Category();
  $category->get((int)$idcategory);
  $page = new Page();
  $page->setTpl("category", [
    'category'=>$category->getValues(),
    'products'=>Product::checkList($category->getProducts())
  ]);
});



?>
