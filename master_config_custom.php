<?php

# ALL ENVIRONMENTS
# set variables here to span all environments.

# PRODUCTION ENVIRONMENT
if(strpos($_SERVER['SERVER_NAME'], '[production server[') === 0 ||
 strpos($_SERVER['SERVER_NAME'], 'www.[production server].com') === 0 ||
  strpos($_SERVER['SERVER_NAME'], '[another server]') === 0 ||
  strpos($_SERVER['SERVER_NAME'], '[and even another]') === 0
 ) {

	# env name
	$config['env'] = 'production';

	# database settings for production
	$config['dbhostname']	= "";
	$config['dbusername']	= "";
	$config['dbpassword']	= "";
	$config['dbname']		= "";

	# suppress all errors
	error_reporting(0);

	# STAGING ENVIRONMENT AS SUBDIRECTORY OF PRODUCTION
	# good for using the same SSL key as production
	if (strpos($_SERVER['REQUEST_URI'], '[path]') === 0) {

		# env name
		$config['env']	= 'altstaging';

		# database settings for staging
		$config['dbhostname']	= "";
		$config['dbusername']	= "";
		$config['dbpassword']	= "";
		$config['dbname']	= "";

		# suppress all errors
		error_reporting(0);
	}
}
# STAGING ENVIRONMENT
elseif (strpos($_SERVER['SERVER_NAME'], '[staging server]') === 0) {

	$config['env']	= 'staging';

	# database settings for staging
	# database settings for production
	$config['dbhostname']	= "";
	$config['dbusername']	= "";
	$config['dbpassword']	= "";
	$config['dbname']		= "";

	# report all errors
	error_reporting(E_ALL);
}
# LOCAL ENVIRONMENT
elseif (strpos($_SERVER['SERVER_NAME'], '[local server]') === 0) {

	# env name
	$config['env']	= 'local';

	# database settings for local
	$config['dbhostname']	= "";
	$config['dbusername']	= "";
	$config['dbpassword']	= "";
	$config['dbname']		= "";

	# report all errors
	error_reporting(E_ALL);
}
else die('Please set server location in system/application/config/master_config.php. Currently at: '.$_SERVER['SERVER_NAME']);