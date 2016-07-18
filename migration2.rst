##################################################
Migrating From CI3 to CI4 - Part 2 - Confuguration
##################################################

We have a CodeIgniter4 website project, cloned locally and setup with the 
framework's splashpage and a few of our assets. It is time to start converting in earnest.

There are several pieces to configure for CI4, and they differ from the 
configuration in CI3. Here are the pieces we want to worry about...

Main Configuration
==================

The CI3 website stored menu configuration in **application/config/config.php**::

    // the menu basics (top navbar)
    $config['menu_choices'] = array(
            'menudata' => array(
                    array('name' => '<span class="glyphicon glyphicon-home"></span>', 'link' => '/'),
                    array('name' => 'Download', 'link' => '/download'),
                    array('name' => 'Documentation', 'link' => '/docs'),
                    array('name' => 'Community', 'link' => '/community'),
                    array('name' => 'Contribute', 'link' => '/contribute')
            )
    );

    // data for the footer navbar
    $config['footer_choices'] = array(
            'menudata' => array(
                    array('name' => 'Policies', 'link' => '/help'),
                    array('name' => 'The Fine Print', 'link' => '/help/legal'),
                    array('name' => 'About', 'link' => '/help/about')
            )
    );

    $config['stable_version'] = '3.0.6';


Our CI4 equivalent goes into **application/Config/Config.php**::

	/*
	  |--------------------------------------------------------------------------
	  | Our website configuration settings
	  |--------------------------------------------------------------------------
	 */

	// the menu basics (top navbar)
	public $menuChoices = array (
		'menudata' => array (
			array ('name' => '<span class="glyphicon glyphicon-home"></span>', 'link' => '/'),
			array ('name' => 'Download', 'link' => '/download'),
			array ('name' => 'Documentation', 'link' => '/docs'),
			array ('name' => 'Community', 'link' => '/community'),
			array ('name' => 'Contribute', 'link' => '/contribute')
		)
	);
	// data for the footer navbar
	public $footerChoices = array (
		'menudata' => array (
			array ('name' => 'Policies', 'link' => '/help'),
			array ('name' => 'The Fine Print', 'link' => '/help/legal'),
			array ('name' => 'About', 'link' => '/help/about')
		)
	);
	public $stableVersion = '3.0.6';

Notice that we are assigning properties of the **\\Config\\App** class, and not
setting associative properties inside a **$config** variable.

The CI3 site suppressed the **index.php** setting::

    /*
      |--------------------------------------------------------------------------
      | Index File
      |--------------------------------------------------------------------------
      |
      | Typically this will be your index.php file, unless you've renamed it to
      | something else. If you are using mod_rewrite to remove the page set this
      | variable so that it is blank.
      |
     */
    $config['index_page'] = '';

and so will we in CI4::

            /*
              |--------------------------------------------------------------------------
              | Index File
              |--------------------------------------------------------------------------
              |
              | Typically this will be your index.php file, unless you've renamed it to
              | something else. If you are using mod_rewrite to remove the page set this
              | variable so that it is blank.
              |
             */
            public $indexPage = '';

Note the different spelling between the two versions.

Only one more thing to change here. In CI3, we had some MyBB setting at the 
end of the configuration file::

    /*
      |--------------------------------------------------------------------------
      | MY BB Forum configurations
      |--------------------------------------------------------------------------
      | @mybb_news_forum_id - Code for the news forum in our MyBB
      | @mybb_news_usernames - An array of user names to restrict our search for news articles to. This simply helps limit the work to do.
      | @mybb_forum_url - The link to direct visitors to for our forum
     */
    $config['mybb_news_forum_id'] = 2;
    $config['mybb_news_usernames'] = array('ciadmin', 'jlp', 'kilishan', 'Narf');
    $config['mybb_forum_url'] = 'http://forum.codeigniter.com';

Those get reflected as properties in CI4::

	/*
	  |--------------------------------------------------------------------------
	  | MY BB Forum configurations
	  |--------------------------------------------------------------------------
	  | @mybbNewsForumID - Code for the news forum in our MyBB
	  | @mybbNewsUsernames - An array of user names to restrict our search for news articles to. This simply helps limit the work to do.
	  | @mybbForumUrl - The link to direct visitors to for our forum
	 */
	public $mybbNewsForumID     = 2;
	public $mybbNewsUsernames   = array ('ciadmin', 'jlp', 'kilishan', 'Narf');
	public $mybbForumURL	    = 'http://forum.codeigniter.com';



Configuration - Autoload
========================

Configuration - Constants
=========================

Configuration - Database
========================

Configuration - Routes
======================

Configuration - Services
========================

Ready? On to `Part 3 <./migration3.rst>`_.