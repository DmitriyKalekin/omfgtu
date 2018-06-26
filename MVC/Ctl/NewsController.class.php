<?php
	namespace MVC\Ctl;

	class NewsController extends \MVC\Ctl\Controller
	{

	    public function index()
	    {
	   		$tree_model = new \MVC\Models\NewsModel();
			$result = $tree_model->getNews();
	    }

	    public function create()
	    {
	    	echo "create News!";

	    }

	    public function update()
	    {
	    	echo "update News!";
	    }

	    public function delete()
	    {
	    	echo "delete News!";
	    }
	}

?>
