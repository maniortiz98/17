<?php


 class homemodel
 {
     public function __construct()
     {
        //echo "mensaje desde el modelo home"; 
     }
     public function getCarrito($params){
         return"datos del carrito numero: ".$params;
     }
 }


?>