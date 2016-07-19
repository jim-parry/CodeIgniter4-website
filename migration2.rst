##################################################
Migrating From CI3 to CI4 - Part 2 - Configuration
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

CI3 uses **application/config/autoload.php** to specify components to load
automatically whenever a request comes into the webapp.
Our website uses a few of those::

    $autoload['libraries'] = array('parser');
    $autoload['helper'] = array('url');

The first says to load the **parser** library, and the second to load 
the **url** helper. 

The **application/Config/Config.php** file in CI4 serves a different purpose -
specifying where to find components that are non-standard. We don't 
need to do anything here, because we are using components built-in to the framework.

Configuration - Constants
=========================

Our CI3 website specified a constant in **application/config/constants.php**::

    // default date format
    define('DATE_FORMAT', 'Y-m-d');

We need to do the same thing for our CI4 website, in 
**application/Config/Constants.php**::

    // default date format
    define('DATE_FORMAT', 'Y-m-d');

Configuration - Database
========================

The CodeIgniter website accesses the MyBB forum database, to retrieve the
lasts announcements and posts. In CI3, that is part of
**application/config/database.php**::

    $db['mybb'] = array(
        'dsn' => '',
        'hostname' => 'localhost',
        'username' => 'bbreader',
        'password' => '',
        'database' => 'mybb',
        'dbdriver' => 'mysqli',
        'dbprefix' => '',
        'pconnect' => TRUE,
        'db_debug' => TRUE,
        'cache_on' => FALSE,
        'cachedir' => '',
        'char_set' => 'utf8',
        'dbcollat' => 'utf8_general_ci',
        'swap_pre' => '',
        'autoinit' => TRUE,
        'encrypt' => FALSE,
        'compress' => FALSE,
        'stricton' => FALSE,
        'failover' => array(),
        'save_queries' => TRUE
    );

The secret username and password are set inside **application/config/config/database.php**,
and that won't be shared here!

For CI4, the configuration is similar, in **application/Config/Database.php**::

	/**
	 * This database connection is used when
	 * running PHPUnit database tests.
	 *
	 * @var array
	 */
	public $mybb = [
		'DSN'          => '',
		'hostname'     => 'localhost',
		'username'     => 'bbreader',
		'password'     => '',
		'database'     => 'mybb',
		'DBDriver'     => 'MySQLi',
		'DBPrefix'     => '',
		'pConnect'     => false,
		'DBDebug'     => (ENVIRONMENT !== 'production'),
		'cacheOn'     => false,
		'cacheDir'     => '',
		'charset'      => 'utf8',
		'DBCollat'     => 'utf8_general_ci',
		'swapPre'      => '',
		'encrypt'      => false,
		'compress'     => false,
		'strictOn'     => false,
		'failover'     => [],
		'saveQueries' => true,
	];

For our testing, our model will use mock data, so you don't need to run
MySQL. In CI4, the secret username and password are saved in **.env**, which is also
not shared :)


Configuration - Routes
======================

Configuration - Services
========================

Ready? On to `Part 3 <./migration3.rst>`_.