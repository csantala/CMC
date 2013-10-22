####Multiple Environment Handler for CodeIgniter 1-2 by Chris Santala 2011-13 csantala@gmail.com####

#####Configuration#####
1. add master_config.php to application/config/  
2. add require('master_config.php'); to application/config/config.php and application/config/database.php   
3. set production, staging, and local domains in master_config.php.  
4. set database variables for each environment.  
5. make the following changes to database.php:  

```
$db['default']['hostname'] = $config['dbhostname'];
$db['default']['username'] = $config['dbusername'];   
$db['default']['password'] = $config['dbpassword'];   
$db['default']['database'] = $config['dbname'];   
```

#####Secure Configuration for GitHub (don't commit your credentials!)######
1. add master_config_custom.php to application/config/
2. set production, staging, and local domains in master_config_custom.php.  
3. set database variables for each environment.  
4. add the following to .gitignore:  ```*/config/master_config_custom.php``` 
6. upload master_config_custom.php to application/config/ at your remote server for each remote environment. 
7. add the following to the top of application/config/config.php and application/config/database.php:  

```
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  

if (is_file('application/config/master_config_custom.php')) {  
	require('master_config_custom.php');  
} else {  
	require('master_config.php');
}
```  
and make the following changes to database.php:  
```
$db['default']['hostname'] = $config['dbhostname'];  
$db['default']['username'] = $config['dbusername'];  
$db['default']['password'] = $config['dbpassword'];  
$db['default']['database'] = $config['dbname'];
