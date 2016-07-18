<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Response;

/**
 * Our base controller.
 */
class Application extends \CodeIgniter\Controller
{

	protected $data = array (); // parameters for view components
	protected $id;   // identifier for our content

	/**
	 * Constructor.
	 * Establish view parameters & set a couple up
	 */

	function __construct(...$params)
	{
		parent::__construct(...$params);
		$this->config					 = new \Config\App();
		$this->data						 = array ();
		$this->data['title']			 = 'CodeIgniter Web Framework';
		$this->data['mybb_forum_url']	 = $this->config->mybbForumURL;
		$this->errors					 = array ();

		//FIXME
//		library('Github_api');
		$this->cache = \Config\Services::cache();

		$this->response = new Response($this->config);

		$this->response->setStatusCode(Response::HTTP_OK);
		$this->response->setHeader('Content-type', 'text/html');
		$this->response->noCache();


		// Prevent some security threats, per Kevin
		// Turn on IE8-IE9 XSS prevention tools
		$this->response->setHeader('X-XSS-Protection', '1; mode=block');
		// Don't allow any pages to be framed - Defends against CSRF
		$this->response->setHeader('X-Frame-Options', 'DENY');
		// prevent mime based attacks
		$this->response->setHeader('X-Content-Type-Options', 'nosniff');
	}

	/**
	 * Render this page
	 */
	function render()
	{
		if ( ! isset($this->data['pagetitle']))
				$this->data['pagetitle'] = $this->data['title'];

		// Massage the menubar
		$choices = $this->config->menuChoices;
		foreach ($choices['menudata'] as &$menuitem)
		{
			$menuitem['active'] = (ltrim($menuitem['link'], '/ ') == uri_string()) ? 'active' : '';
		}
		$this->data['menubar'] = $this->parser->parse('theme/menubar', $choices, true);

		$choices = $this->config->footerChoices;
		foreach ($choices['menudata'] as &$menuitem)
		{
			$menuitem['active'] = (ltrim($menuitem['link'], '/ ') == uri_string()) ? 'active' : '';
		}
		$this->data['footerbar'] = $this->parser->parse('theme/menubar', $choices, true);
		$this->data['content']	 = $this->parser->parse($this->data['pagebody'], $this->data, true);

		// title for all but the homepage
		$layout						 = empty($this->data['title']) ? 'jumbotitle' : 'title';
		$this->data['titleblock']	 = $this->parser->parse('theme/'.$layout, $this->data, true);

		// finally, build the browser page!
		$this->data['data']	 = &$this->data;
		$output				 = $parser->parse('theme/template', $this->data);

		// Sends the output to the browser
		$this->response->setBody($output);
		$this->response->send();
	}

}
