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