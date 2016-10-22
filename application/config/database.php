<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['dsn']      The full DSN string describe a connection to the database.
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database driver. e.g.: mysqli.
|			Currently supported:
|				 cubrid, ibase, mssql, mysql, mysqli, oci8,
|				 odbc, pdo, postgre, sqlite, sqlite3, sqlsrv
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Query Builder class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['encrypt']  Whether or not to use an encrypted connection.
|	['compress'] Whether or not to use client compression (MySQL only)
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|	['failover'] array - A array with 0 or more data for connections if the main should fail.
|	['save_queries'] TRUE/FALSE - Whether to "save" all executed queries.
| 				NOTE: Disabling this will also effectively disable both
| 				$this->db->last_query() and profiling of DB queries.
| 				When you run a query, with this setting set to TRUE (default),
| 				CodeIgniter will store the SQL statement for debugging purposes.
| 				However, this may cause high memory usage, especially if you run
| 				a lot of SQL queries ... disable this to avoid that problem.
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $query_builder variables lets you determine whether or not to load
| the query builder class.
*/

$active_group = 'default';
$active_record = TRUE;


//local
// $db['default']['hostname'] = '127.0.0.1';
// $db['default']['username'] = 'dev';
// $db['default']['password'] = '123123';
// $db['default']['port'] = '3306';
//$db['default']['database'] = 'app_90zone';

//sae
// $db['default']['hostname'] = 'w.rdc.sae.sina.com.cn';
// $db['default']['username'] = 'k15w5j2z2k';
// $db['default']['password'] = '1ji0whlwljz0wximjzwwyh5lz5w101w3lmyzly3i';
// $db['default']['port'] = '3307';
//$db['default']['database'] = 'app_90zone';

//openshift
//$db['default']['hostname'] = '172.30.77.57';
//$db['default']['username'] = 'k15w5j2z2k';
//$db['default']['password'] = '1ji0whlwljz0wximjzwwyh5lz5w101w3lmyzly3i';
//$db['default']['port'] = '3306';
//$db['default']['database'] = 'app_90zone';

//heroku
$db['default']['hostname'] = 'us-cdbr-iron-east-04.cleardb.net';
$db['default']['username'] = 'b6f9873480e1fc';
$db['default']['password'] = '45cb5f51';
$db['default']['port'] = '3306';
$db['default']['database'] = 'heroku_b411e4d29537113';

//other configs
$db['default']['dbdriver'] = 'mysqli';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = FALSE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;