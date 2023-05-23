<?php
namespace controllers;
class Main extends \app\Controller{
/**
* Cette méthode affiche la page principale
*
* @return void
*/
public function index(){
// On garde la structure avec une variable $main pour anticiper un éventuel besoin
$main = array();
// On envoie les données à la vue index
$this->render('index', compact('main'));
}
}
?>