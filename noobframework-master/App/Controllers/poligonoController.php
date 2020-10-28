<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Poligono;

class poligonoController extends Controller{
    public function index(){

        $poligono = Poligono::getAll();
        var_dump($poligono);
        $this -> view('poligono',['poligono'=> $poligono]);
    //$this -> view('poligono', $poligono);
    }
}
?>