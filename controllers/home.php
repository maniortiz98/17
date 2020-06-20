<?php
class home extends controllers
{
    public function __construct(){
        parent::__construct();
    }
    public function home($params)
    {
      //  echo "mensaje desde el controlador";  
    }
    public function datos($params){
        echo "dato resibido: ".$params;
    }
    public function carrito($params){
        $carrito = $this ->model->getCarrito($params);
        echo $carrito;
    }
}
?>