<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Poligonos;

class poligonoController extends Controller{
    public function index(){
    $poligonos = Poligonos::getAll();
    $this -> view('poligonos',['poligonos'=> $poligonos]);
    }
}
?>