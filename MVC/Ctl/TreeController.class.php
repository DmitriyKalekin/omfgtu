<?php
	namespace MVC\Ctl;

	class TreeController extends \MVC\Ctl\Controller
	{

	    public function index()
	    {
	   		$tree_model = new \MVC\Models\TreeModel();
			$result = $tree_model->getTree();
	    }

	    public function create()
	    {
	    	echo "create User!";

	    }

	    public function update()
	    {
	    	echo "update User!";
	    }

	    public function delete()
	    {
	    	echo "delete User!";
	    }
	}

?>
