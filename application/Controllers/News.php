<?phpnamespace App\Controllers;

/**
 * controllers/news.php
 *
 * Provide some timely updates
 * 
 * CodeIgniter website, template driven
 *
 */
class News extends Application {

	//-------------------------------------------------------------
	//  The normal pages
	//-------------------------------------------------------------

	function index()
	{
		$this->data['title'] = "CodeIgniter News";
		$this->data['pagebody'] = 'news';
		$this->render();
	}

}
