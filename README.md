# Technocrat symfony study group
### Brand for Symfony 2.7 with annotations

#### 1. Installation
```sh
composer create-project symfony/framework-standard-edition lantern 2.7.*
```
```sh
Creating the "app/config/parameters.yml" file
Some parameters are missing. Please provide them.
database_host (127.0.0.1):            
database_port (null): 
database_name (symfony): symf_273_lantern            
database_user (root): 
database_password (null): root
mailer_transport (smtp): 
mailer_host (127.0.0.1): 
mailer_user (null): 
mailer_password (null): 
secret (ThisTokenIsNotSoSecretChangeIt): lantern
```
```sh
cd lantern/
```
#### 2. Generate LMS bundle
```sh
php app/console generate:bundle --namespace=Technocrat/LMSBundle 
```
```sh
Bundle name [TechnocratLMSBundle]: 

The bundle can be generated anywhere. The suggested default directory uses the standard conventions.

Target directory [/path/to/folder/lantern/src]: 

Determine the format to use for the generated configuration.

Configuration format (yml, xml, php, or annotation): yml

To help you get started faster, the command can generate some
code snippets for you.

Do you want to generate the whole directory structure [no]? yes

                             
  Summary before generation  
                             

You are going to generate a "Technocrat\LMSBundle\TechnocratLMSBundle" bundle
in "/path/to/folder/lantern/src/" using the "yml" format.

Do you confirm generation [yes]? yes
                     
  Bundle generation  
                     
Generating the bundle code: OK
Checking that the bundle is autoloaded: OK
Confirm automatic update of your Kernel [yes]? yes
Enabling the bundle inside the Kernel: OK
Confirm automatic update of the Routing [yes]? yes
Importing the bundle routing resource: OK
```

#### 3. Disable local check and modify twig template
Disable the following code in
```sh
lantern/web/app_dev.php
```
to prevent local checks
```sh
if (isset($_SERVER['HTTP_CLIENT_IP'])
    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    || !(in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'fe80::1', '::1')) || php_sapi_name() === 'cli-server')
) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}
```
and in
```sh
lantern/web/config.php
```
to prevent local checks
```sh
if (!in_array(@$_SERVER['REMOTE_ADDR'], array(
    '127.0.0.1',
    '::1',
))) {
    header('HTTP/1.0 403 Forbidden');
    exit('This script is only accessible from localhost.');
}
```
Change in
```sh
lantern/src/Technocrat/LMSBundle/Resources/views/Default/index.html.twig
```
from
```sh
Hello {{ name }}!
```
to
```sh
Hello, {{ name | capitalize }}!
```