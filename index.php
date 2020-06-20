<?php

require_once("config/config.php");

$url= !empty($_GET['url'])? $_GET['url'] : 'home/home' ;
$arrUrl = explode("/", $url);
$controller =$arrUrl[0];
$metodo = $arrUrl[0];
$params = "";
if(!empty($arrUrl[1])){
    if($arrUrl[1] !=""){
        $metodo = $arrUrl[1];
    }
}
if(!empty($arrUrl[2])){
    if ($arrUrl[2] != ""){
      /*for para poder recorrer las pociciones de los parametoros */
      for ($i=2; $i < count($arrUrl); $i++){
          $params .= $arrUrl[$i].',';
      }
      $params = trim($params, ",");
       }
}
spl_autoload_register(function($class){
    if(file_exists(LIBS.'Core/'.$class.".php")){
        require_once(LIBS.'Core/'.$class.".php");
    }
});
//load

$controllerFile = "controllers/".$controller.".php";

if(file_exists($controllerFile)){
    require_once($controllerFile);
    $controller = new $controller();
    if (method_exists($controller, $metodo)){
        $controller->{$metodo}($params);
    }else{echo "no existe metodo";

    }
}else{
    echo "no existe controlador";
}

/* 
echo "<br>";
echo "controlador: ".$controller;
echo "<br>";
echo "metodo: ".$metodo;
echo "<br>";
echo "parametros: ".$params; */
?>