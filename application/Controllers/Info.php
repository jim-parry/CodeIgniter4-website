<?phpnamespace App\Controllers;


/**
 * controllers/info.php
 *
 * Describe the framework
 * 
 * CodeIgniter website, template driven
 *
 */
class Info extends Application {

	//-------------------------------------------------------------
	//  The normal pages
	//-------------------------------------------------------------

	function index()
	{
		$this->data['title'] = "CodeIgniter Is Right for You if…";
		$this->data['pagebody'] = 'info';
		$this->render();
	}

}
