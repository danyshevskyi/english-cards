<?php

use Cards\App\Controllers\Controller;
use Analytics\App\Models\Count;

Flight::route('GET /english-cards', function() {	

	// Analytics
	$count = new Count('cards', 'all');
		$count->count();
	
	$Controller = new Controller();
		$Controller->main();
});

Flight::route('POST /english-cards', function() {

	// Analytics
	$count = new Count('cards', 'all');
		$count->count();

	$Controller = new Controller();

		$key = Flight::request()->data->key;

			if($key == 'getWords')
			{
				$category = Flight::request()->data->category;
					$start = Flight::request()->data->start;
						$end = Flight::request()->data->end;
							$option = Flight::request()->data->option;
					
				$Controller->getWords($category, $start, $end, $option);
			
			}
			elseif ($key == 'addWords')
			{
				$category = Flight::request()->data->category;
					$native = Flight::request()->data->native;
						$translate = Flight::request()->data->translate;
							$sentence = Flight::request()->data->sentence;

				$Controller->addWords($category, $native, $translate, $sentence);

			}
			elseif ($key == 'editWords')
			{
				$id_words = Flight::request()->data->id_words;
					$category = Flight::request()->data->category;
						$native = Flight::request()->data->native;
							$translate = Flight::request()->data->translate;
								$sentence = Flight::request()->data->sentence;
								
				$Controller->editWords($id_words, $category, $native, $translate, $sentence);			
			}
			elseif ($key == 'getCategory')
			{
				$Controller->getCategory();
			}
			elseif ($key == 'delWords')
			{
				$id_words = Flight::request()->data->id_words;
					$Controller->delWords($id_words);
			}
			elseif ($key == 'addCategory')
			{
				$category = Flight::request()->data->category;
					$Controller->addCategory($category);
			
			}
			elseif ($key == 'delCategory')
			{
				$categoryId = Flight::request()->data->categoryId;
					$Controller->delCategory($categoryId);
			}

});
