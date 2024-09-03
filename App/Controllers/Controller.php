<?php

namespace Cards\App\Controllers;

use Cards\App\Models\Category;
use Cards\App\Models\Cards;
use Cards\App\Models\CreateTables;
use Auth\App\Models\Auth;


class Controller {

public function main() {
	$auth = new Auth();
		$check = $auth->check();		
			if($check)
			{			
				// Check tables exist
				if($_SESSION['user']['cards'] == 0)
				{
					$CreateTables = new CreateTables();
						$CreateTables->createTables();	
				}				
					$this->view('auth.php', ['email' => $_SESSION['user']['email']]);				
			}
			else
			{
				$this->view('notauth.php', []);
			}
}

public function view($file, array $data) {
	$loader = new \Twig\Loader\FilesystemLoader('../App/Views');	
		$twig = new \Twig\Environment($loader);
			echo $twig->render($file, $data);
}

public function getWords($category, $start, $end, $option) {
	$Cards = new Cards();
		$Cards->getWords($category, $start, $end, $option);
}

public function addWords($category, $native, $translate, $sentance) {
	$Cards = new Cards();
		$Cards->addWords($category, $native, $translate, $sentance);
}

public function editWords($id_words, $category, $native, $translate, $sentance) {	
	$Cards = new Cards();
		$Cards->editWords($id_words, $category, $native, $translate, $sentance);
}

public function delWords($id_words) {	
	$Cards = new Cards();
		$Cards->delWords($id_words);
}

public function getCategory() {
	$Category = new Category();
		$Category->getCategory();
}

public function addCategory($category) {	
	$Category = new Category();
		$Category->AddCategory($category);
}

public function delCategory($categoryId) {
	$Category = new Category();
		$Category->delCategory($categoryId);
}

}
