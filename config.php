<?php
#configure the shortcut name

DEFINE ('BASE_URL', 'index.php?'); #change this if needed
//DEFINE ('BASE_URL', 'http://localhost/online_exam/index.php?'); #change this if needed
DEFINE ('HOME_DIR', dirname( realpath(__FILE__)) );
DEFINE ('BASE_DIR', basename(HOME_DIR));
DEFINE ('LIB_DIR', HOME_DIR . '/libraries');
DEFINE ('CLASS_DIR', LIB_DIR . '/classes/');
DEFINE ('MODEL_DIR', HOME_DIR . '/models/');
DEFINE ('VIEW_DIR', HOME_DIR . '/views/');
DEFINE ('CONTROLLER_DIR', HOME_DIR . '/controllers/');
DEFINE ('DATABASE_DIR', LIB_DIR . '/database/');
DEFINE ('CONT_EXT','Controller.php');
DEFINE ('CORE_DIR',LIB_DIR . '/core/');
DEFINE ('EXT', '.php');

#DATABASE CONFIGURATION
DEFINE ('DB_HOST','localhost');
DEFINE ('DB_USER','root');
DEFINE ('DB_PASS','');
DEFINE ('DB_NAME','online_exam');
DEFINE ('DB_PORT','3306');

#DATABASE PREFIX

//DEFINE ('cool_forum', 'cool_school_');

#DEFAULT CONTROLLER / ACTION
DEFINE ('default_controller','index'); 
DEFINE ('default_action','mainAction');	

#load libraries needed
require_once (CLASS_DIR . 'Session' . EXT);

require_once (CORE_DIR . 'Common' . EXT);

require_once (DATABASE_DIR . 'Db' . EXT);

require_once (CORE_DIR . 'Controller' . EXT);

require_once (CORE_DIR . 'Router' . EXT);


?>