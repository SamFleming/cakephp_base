CakePHP Base Project
====================
All application files are stored in `app/`

All assets (publically accessible files) are stored in `app/webroot/`

CakePHP is installed as a submodule at `cakephp/`

Uses CakePHP built in ACL system.

How to setup
------------
1. Change necessary variables in `app/Config/core.php` (Session.cookie, Security.salt, Security.cipherSeed)
2. Change database configuration in `app/Config/database.php`

Admin Area
----------
Very simple admin area built using Twitter Bootstrap