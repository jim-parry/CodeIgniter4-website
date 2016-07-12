<?php

namespace App\Controllers;

/**
 * Controller to present the homepage.
 * 
 * Also provides supplementary info through the footer navbar.
 */
class Home extends Application
{

	/**
	 * Main entry point - the homepage itself
	 */
	public function index()
	{
		echo view('welcome_message');
	}

}
