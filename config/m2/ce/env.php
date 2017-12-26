<?php
return array (
  'backend' => 
  array (
    'frontName' => 'BACKEND_FRONTNAME',
  ),
  'crypt' => 
  array (
    'key' => 'CRYPT', // sample: 6954a1ff91e2bb80bba35ebbaf35bcc9
  ),
  'session' => 
  array (
    'save' => 'files',
  ),
  'db' => 
  array (
    'table_prefix' => 'TBL_PREFIX',
    'connection' => 
    array (
      'default' => 
      array (
        'host' => 'DB_HOST',
        'dbname' => 'DB_NAME',
        'username' => 'DB_USER',
        'password' => 'DB_PASSWORD',
        'active' => '1',
      ),
    ),
  ),
  'resource' => 
  array (
    'default_setup' => 
    array (
      'connection' => 'default',
    ),
  ),
  'x-frame-options' => 'SAMEORIGIN',
  'MAGE_MODE' => 'default',
  'cache_types' => 
  array (
    'config' => 1,
    'layout' => 1,
    'block_html' => 1,
    'collections' => 1,
    'reflection' => 1,
    'db_ddl' => 1,
    'eav' => 1,
    'customer_notification' => 1,
    'full_page' => 1,
    'config_integration' => 1,
    'config_integration_api' => 1,
    'translate' => 1,
    'config_webservice' => 1,
    'compiled_config' => 1,
  ),
  'install' => 
  array (
    'date' => '[DATE]', // sample: Fri, 03 Mar 2017 13:26:52 +0000
  ),
);
