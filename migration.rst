#############################################
Migrating CodeIgniter Website From CI3 to CI4
#############################################

This page presents a step-by-step explanation of 
the migration process, to convert the CodeIgniter website from CodeIgniter3
to CodeIgniter4.

The CodeIgniter website makes a good migration usecase, because it has:

-   multiple controllers
-   multiple views
-   a model
-   a library
-   an external library, composer-managed
-   a base controller
-   configuration constants
-   configuration settings
-   a presentation theme

It uses:

-   Bootstrap & jQuery
-   a mySQL database
-   images stored inside the app
-   a Github API
-   at least one helper
-   the Template Parser, to process view fragments
-   the cache, for Github results

=============
Project Setup
=============

We started with the existing CodeIgniter repositories on Github.
These were forked and then cloned locally, resulting in the following
project folders inside our Apache web folder:

-  CodeIgniter3, based on https://github.com/bcit-ci/CodeIgniter
-  CodeIgniter3-website, based on https://github.com/bcit-ci/codeigniter-website
-  CodeIgniter4, based on https://github.com/bcit-ci/CodeIgniter4

We created a new project, **CodeIgniter4-website**, and cloned it locally into the
same folder as above. Initially, it held only a readme (bogus) and a license file
(MIT). Once we have completed the migration, it will hold the CodeIgniter website,
and it will be transferred to the **bcit-ci** organization, to take its place
along the other repositories.

From this point forward, all work will be done inside the **CodeIgniter4-website**
project folder, unless stated otherwise.

============
Apache Setup
============

With multiple webapps to server simultaneously, virtual hosting makes sense.

You will need to add local domain definitions to your **etc/hosts* file,
wherever that is on your platform::

    127.0.0.1 ci3.local ci.local ci4.local cisite.local

for the CodeIgniter 3 framework, the current CodeIgniter website, website, 
the CodeIgniter 4 framework, and the 
CodeIgniter 4 website.

Using virtual hosting, you also need to enable that option in Apache, and
then add entries for our sites, to **extra/httpd-vhosts**::

    <VirtualHost *:80>
        DocumentRoot "APACHE/htdocs/CodeIgniter3"
        ServerName ci3.local
        ErrorLog "logs/ci3-error_log"
        CustomLog "logs/ci3-access_log" common
    </VirtualHost>
    <VirtualHost *:80>
        ServerAdmin webmaster@dummy-host.example.com
        DocumentRoot "APACHE/htdocs/CodeIgniter3-website"
        ServerName ci.local
        ErrorLog "logs/ci-error_log"
        CustomLog "logs/ci-access_log" common
    </VirtualHost>
    <VirtualHost *:80>
        DocumentRoot "APACHE/htdocs/CodeIgniter4/public"
        ServerName ci4.local
        ErrorLog "logs/ci4-error_log"
        CustomLog "logs/ci4-access_log" common
    </VirtualHost>
    <VirtualHost *:80>
        DocumentRoot "APACHE/htdocs/CodeIgniter4-website/public"
        ServerName cisite.local
        ErrorLog "logs/cisite-error_log"
        CustomLog "logs/cisite-access_log" common
    </VirtualHost>

You would use your Apache folder location, and the appropriate port number.

Restart Apache, and you should see the CodeIgniter 3 splashpage at
http://ci3.local, the current website at http://ci.local, the
CodeIgniter4 spashpage at http://ci4.local, and an error message 
at http://cisite.local.


==================
Copy the Framework
==================

We made a conscious decision to keep the CodeIgniter website and the 
framework separate. The framework is under active development, and
our decision means that we do not have to continually update the
website folder with every framework change. We will need to monitor
the framework progress, in case there are changes to the **application**
folder or to the **public/index.php**, as both of those will be copied into
our project.

Copy the "static" pieces from the CodeIgniter4 folder into our project root.
That will include the **application**, **public**, **writeable** folders. 

We need to modify **public/index.php**, directing the **system** folder to
that within CodeIgniter4. You will change this at about line 40::

    /*
     *---------------------------------------------------------------
     * SYSTEM FOLDER NAME
     *---------------------------------------------------------------
     *
     * This variable must contain the name of your "system" folder.
     * Include the path if the folder is not in the same directory
     * as this file.
     */
    $system_directory = '../../CodeIgniter4/system';

Now, if you visit the site at http://cisite.local, you will see the 
CodeIgniter4 splashpage.

=================
Copy Static Parts 
=================

We can copy some of the static parts over from the CodeIgniter3 folder, since
they will not need modification.

Copy the **assets** and **user...** folders from the CideIgniter3-website folder
into our **public** folder, and copy the **data** folder into our project root.
The **favicon.ico** and **robots.txt** files can be copied into our **public**
folder too.

We already modified **index.php**, in the previous step, and CodeIgniter4 comes
with its own **.htaccess** file. Do not replace these with the versions in
the CodeIgniter3 website folder.

The folder

Now, if you visit the site at http://cisite.local, you will still only see the 
CodeIgniter4 splashpage. We haven't migrated any of the website logic yet.

Ready? On to `Part 2 <./migration2.rst>`_.