<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class App extends BaseConfig
{
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

	/*
	  |--------------------------------------------------------------------------
	  | MY BB Forum configurations
	  |--------------------------------------------------------------------------
	  | @mybb_news_forum_id - Code for the news forum in our MyBB
	  | @mybb_news_usernames - An array of user names to restrict our search for news articles to. This simply helps limit the work to do.
	  | @mybb_forum_url - The link to direct visitors to for our forum
	 */
	public $mybbNewsForum_id	 = 2;
	public $mybbNewsUsernames	 = array ('ciadmin', 'jlp', 'kilishan', 'Narf');
	public $mybbForumURL		 = 'http://forum.codeigniter.com';

	/*
	  |--------------------------------------------------------------------------
	  | Base Site URL
	  |--------------------------------------------------------------------------
	  |
	  | URL to your CodeIgniter root. Typically this will be your base URL,
	  | WITH a trailing slash:
	  |
	  |	http://example.com/
	  |
	  | If this is not set then CodeIgniter will try guess the protocol, domain
	  | and path to your installation. However, you should always configure this
	  | explicitly and never rely on auto-guessing, especially in production
	  | environments.
	  |
	 */
	public $baseURL = '';

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

	/*
	  |--------------------------------------------------------------------------
	  | URI PROTOCOL
	  |--------------------------------------------------------------------------
	  |
	  | This item determines which getServer global should be used to retrieve the
	  | URI string.  The default setting of 'REQUEST_URI' works for most servers.
	  | If your links do not seem to work, try one of the other delicious flavors:
	  |
	  | 'REQUEST_URI'    Uses $_SERVER['REQUEST_URI']
	  | 'QUERY_STRING'   Uses $_SERVER['QUERY_STRING']
	  | 'PATH_INFO'      Uses $_SERVER['PATH_INFO']
	  |
	  | WARNING: If you set this to 'PATH_INFO', URIs will always be URL-decoded!
	 */
	public $uriProtocol = 'REQUEST_URI';

    /*
     |--------------------------------------------------------------------------
     | Default Locale
     |--------------------------------------------------------------------------
     |
     | The Locale roughly represents the language and location that your visitor
     | is viewing the site from. It affects the language strings and other
     | strings (like currency markers, numbers, etc), that your program
     | should run under for this request.
     |
    */
    public $defaultLocale = 'en';

    /*
     |--------------------------------------------------------------------------
     | Negotiate Locale
     |--------------------------------------------------------------------------
     |
     | If true, the current Request object will automatically determine the
     | language to use based on the value of the Accept-Language header.
     |
     | If false, no automatic detection will be performed.
     |
    */
    public $negotiateLocale = false;

    /*
     |--------------------------------------------------------------------------
     | Supported Locales
     |--------------------------------------------------------------------------
     |
     | If $negotiateLocale is true, this array lists the locales supported
     | by the application in descending order of priority. If no match is
     | found, the first locale will be used.
     |
    */
    public $supportedLocales = ['en'];

	/*
	  |--------------------------------------------------------------------------
	  | URI PROTOCOL
	  |--------------------------------------------------------------------------
	  |
	  | If true, this will force every request made to this application to be
	  | made via a secure connection (HTTPS). If the incoming request is not
	  | secure, the user will be redirected to a secure version of the page
	  | and the HTTP Strict Transport Security header will be set.
	 */
	public $forceGlobalSecureRequests = false;

	/*
	  |--------------------------------------------------------------------------
	  | Session Variables
	  |--------------------------------------------------------------------------
	  |
	  | 'sessionDriver'
	  |
	  |	The storage driver to use: files, database, redis, memcached
	  |       - CodeIgniter\Session\Handlers\FileHandler
	  |       - CodeIgniter\Session\Handlers\DatabaseHandler
	  |       - CodeIgniter\Session\Handlers\MemcachedHandler
	  |       - CodeIgniter\Session\Handlers\RedisHandler
	  |
	  | 'sessionCookieName'
	  |
	  |	The session cookie name, must contain only [0-9a-z_-] characters
	  |
	  | 'sessionExpiration'
	  |
	  |	The number of SECONDS you want the session to last.
	  |	Setting to 0 (zero) means expire when the browser is closed.
	  |
	  | 'sessionSavePath'
	  |
	  |	The location to save sessions to, driver dependent.
	  |
	  |	For the 'files' driver, it's a path to a writable directory.
	  |	WARNING: Only absolute paths are supported!
	  |
	  |	For the 'database' driver, it's a table name.
	  |	Please read up the manual for the format with other session drivers.
	  |
	  |	IMPORTANT: You are REQUIRED to set a valid save path!
	  |
	  | 'sessionMatchIP'
	  |
	  |	Whether to match the user's IP address when reading the session data.
	  |
	  |	WARNING: If you're using the database driver, don't forget to update
	  |	         your session table's PRIMARY KEY when changing this setting.
	  |
	  | 'sessionTimeToUpdate'
	  |
	  |	How many seconds between CI regenerating the session ID.
	  |
	  | 'sessionRegenerateDestroy'
	  |
	  |	Whether to destroy session data associated with the old session ID
	  |	when auto-regenerating the session ID. When set to FALSE, the data
	  |	will be later deleted by the garbage collector.
	  |
	  | Other session cookie settings are shared with the rest of the application,
	  | except for 'cookie_prefix' and 'cookie_httponly', which are ignored here.
	  |
	 */
	public $sessionDriver			 = 'CodeIgniter\Session\Handlers\FileHandler';
	public $sessionCookieName		 = 'ci_session';
	public $sessionExpiration		 = 7200;
	public $sessionSavePath			 = NULL;
	public $sessionMatchIP			 = FALSE;
	public $sessionTimeToUpdate		 = 300;
	public $sessionRegenerateDestroy = FALSE;

	/*
	  |--------------------------------------------------------------------------
	  | Cookie Related Variables
	  |--------------------------------------------------------------------------
	  |
	  | 'cookiePrefix'   = Set a cookie name prefix if you need to avoid collisions
	  | 'cookieDomain'   = Set to .your-domain.com for site-wide cookies
	  | 'cookiePath'     = Typically will be a forward slash
	  | 'cookieSecure'   = Cookie will only be set if a secure HTTPS connection exists.
	  | 'cookieHTTPOnly' = Cookie will only be accessible via HTTP(S) (no javascript)
	  |
	  | Note: These settings (with the exception of 'cookie_prefix' and
	  |       'cookie_httponly') will also affect sessions.
	  |
	 */
	public $cookiePrefix	 = '';
	public $cookieDomain	 = '';
	public $cookiePath		 = '/';
	public $cookieSecure	 = false;
	public $cookieHTTPOnly	 = false;

	/*
	  |--------------------------------------------------------------------------
	  | Reverse Proxy IPs
	  |--------------------------------------------------------------------------
	  |
	  | If your getServer is behind a reverse proxy, you must whitelist the proxy
	  | IP addresses from which CodeIgniter should trust headers such as
	  | HTTP_X_FORWARDED_FOR and HTTP_CLIENT_IP in order to properly identify
	  | the visitor's IP address.
	  |
	  | You can use both an array or a comma-separated list of proxy addresses,
	  | as well as specifying whole subnets. Here are a few examples:
	  |
	  | Comma-separated:	'10.0.1.200,192.168.5.0/24'
	  | Array:		array('10.0.1.200', '192.168.5.0/24')
	 */
	public $proxyIPs = '';

	/*
	  |--------------------------------------------------------------------------
	  | Cross Site Request Forgery
	  |--------------------------------------------------------------------------
	  | Enables a CSRF cookie token to be set. When set to TRUE, token will be
	  | checked on a submitted form. If you are accepting user data, it is strongly
	  | recommended CSRF protection be enabled.
	  |
	  | CSRFTokenName   = The token name
	  | CSRFCookieName  = The cookie name
	  | CSRFExpire      = The number in seconds the token should expire.
	  | CSRFRegenerate  = Regenerate token on every submission
	  | CSRFExcludeURIs = Array of URIs which ignore CSRF checks
	 */
	public $CSRFProtection	 = false;
	public $CSRFTokenName	 = 'csrf_test_name';
	public $CSRFCookieName	 = 'csrf_cookie_name';
	public $CSRFExpire		 = 7200;
	public $CSRFRegenerate	 = true;
	public $CSRFExcludeURIs	 = [];

	/*
	  |--------------------------------------------------------------------------
	  | Content Security Policy
	  |--------------------------------------------------------------------------
	  | Enables the Response's Content Secure Policy to restrict the sources that
	  | can be used for images, scripts, CSS files, audio, video, etc. If enabled,
	  | the Response object will populate default values for the policy from the
	  | ContentSecurityPolicy.php file. Controllers can always add to those
	  | restrictions at run time.
	  |
	  | For a better understanding of CSP, see these documents:
	  |   - http://www.html5rocks.com/en/tutorials/security/content-security-policy/
	  |   - http://www.w3.org/TR/CSP/
	 */
	public $CSPEnabled = false;

	/*
	  |--------------------------------------------------------------------------
	  | Debug Toolbar
	  |--------------------------------------------------------------------------
	  | The Debug Toolbar provides a way to see information about the performance
	  | and state of your application during that page display. By default it will
	  | NOT be displayed under production environments, and will only display if
	  | CI_DEBIG is true, since if it's not, there's not much to display anyway.
	 */
	public $toolbarEnabled		 = (ENVIRONMENT != 'production' && CI_DEBUG);
	public $toolbarCollectors	 = [
		'CodeIgniter\Debug\Toolbar\Collectors\Timers',
		'CodeIgniter\Debug\Toolbar\Collectors\Database',
		'CodeIgniter\Debug\Toolbar\Collectors\Logs',
		'CodeIgniter\Debug\Toolbar\Collectors\Views',
//		'CodeIgniter\Debug\Toolbar\Collectors\Cache',
		'CodeIgniter\Debug\Toolbar\Collectors\Files',
		'CodeIgniter\Debug\Toolbar\Collectors\Routes',
	];

	/*
	  |--------------------------------------------------------------------------
	  | Error Views Path
	  |--------------------------------------------------------------------------
	  | This is the path to the directory that contains the 'cli' and 'html'
	  | directories that hold the views used to generate errors.
	  |
	  | Default: APPPATH.'Views/errors'
	 */
	public $errorViewPath = APPPATH.'Views/errors';

	/*
	  |--------------------------------------------------------------------------
	  | Composer auto-loading
	  |--------------------------------------------------------------------------
	  |
	  | Enabling this setting will tell CodeIgniter to look for a Composer
	  | package auto-loader script in /vendor/autoload.php.
	  |
	  |	$composerAutoload = TRUE;
	  |
	  | Or if you have your vendor/ directory located somewhere else, you
	  | can opt to set a specific path as well:
	  |
	  |	$composerAutoload = '/path/to/vendor/autoload.php';
	  |
	  | For more information about Composer, please visit http://getcomposer.org/
	  |
	  | Note: This will NOT disable or override the CodeIgniter-specific
	  |	autoloading.
	 */
	public $composerAutoload = '../vendor/autoload.php';

	/*
	  |--------------------------------------------------------------------------
	  | Encryption Key
	  |--------------------------------------------------------------------------
	  |
	  | If you use the Encryption class you must set
	  | an encryption key. See the user guide for more info.
	 */
	public $encryptionKey = '';

	/*
	  |--------------------------------------------------------------------------
	  | Application Salt
	  |--------------------------------------------------------------------------
	  |
	  | The $salt can be used anywhere within the application that you need
	  | to provide secure data. It should be different for every application
	  | and can be of any length, though the more random the characters
	  | the better.
	  |
	  | If you use the Model class' hashedID methods, this must be filled out.
	 */
	public $salt = '';

	//--------------------------------------------------------------------
}
