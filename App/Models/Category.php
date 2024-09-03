<?php

namespace Cards\App\Models;

use Illuminate\Database\Eloquent\Model;
use Cards\App\Models\Cards;

class Category extends Model {

public function __construct() {
    $this->setTable('cards_'.$_SESSION['user']['id_user'].'_category');
}

public function getCategory($option = false) {
    $result = $this->orderBy('default', 'desc')->get();
        foreach ($result as $value)
        {
            $category[] = [$value['id_category'], $value['category'], $value['default']];
        }
            $sendData = $category;
				if($option)
				{
					return $sendData;
				}
				else
				{
					echo json_encode($sendData);
				}	
}

public function addCategory($category) {
	if($this->checkCategory($category))
	{
		$id_category = $this->insertGetId([
											'category' => $category,
											'default' => 0	  
										  ]);
		$sendData = [
					'status' => true,
					'id_category' => $id_category
					];

		echo json_encode($sendData);
	}
	else
	{
		$sendData = [
					'status' => false,
					];

		echo json_encode($sendData);
	}
}

public function checkCategory($category) {
	$result = $this->where('category', $category)
				   ->get();
		if($result->isNotEmpty())
		{
			return false;
		}
		else
		{
			return true;
		}
}

public function delCategory($id_category) {
	// Delete all words in category
	$Cards = new Cards();
		$Cards->delAllWords($id_category);
	// Delete  category
	$this->where('id_category', $id_category)->delete();
	// Send result	
	$sendData = ['status' => true];
		echo json_encode($sendData);
}

}
