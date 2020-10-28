<?php

namespace App\Models;
use Core\DataBase;

   Class Poligono{

    public static function getAll($condition = null, $columns = null){
        $db= DataBase::getInstance('tb_poligono', 'nome_poligono', 'lados_poligono','angulo_poligono');

        //var_dump($db->getList('tb_poligono', '*'));
        //die();
        
        return $db -> getList('tb_poligono', '*');
    }
    

   }     


?>