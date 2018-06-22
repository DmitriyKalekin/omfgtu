<?php
namespace MVC\Ctl;

class NewsController extends \MVC\Ctl\Controller
{
	public function show()
	{
	  echo "New show!";
		$news_model = new \MVC\Model\NewsModel();
		$res = $news_model -> getTree();
		//vd($res);
	}
    
	public function create()
	{
		echo "New created!";
	}
		
	public function update()
	{
		echo "New updated!";
	}
		
	public function delete()
	{
		echo "New deleted!";
	}
}
?>