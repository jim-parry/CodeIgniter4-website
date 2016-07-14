<?phpnamespace App\Controllers;

/**
 * controllers/docs.php
 *
 * Render the current version of the user guide.
 * 
 * CodeIgniter website, template driven
 *
 */
class Docs extends Application {

	//-------------------------------------------------------------
	//  The normal pages
	//-------------------------------------------------------------

	function index()
	{
		$this->data['title'] = "CodeIgniter Documentation";
		$this->data['pagebody'] = 'docs';
		$this->render();
	}

}
