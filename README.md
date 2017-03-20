# dev-IdPServer-phpOIDC
This server is adapted from Nat Sakumura PhPOIDC implementation. A demo application to register a new client and to use the IdP for a client application is provided (folder demo).

## Installation guide
There are two ways to install this server. One manually, using the original recommandations, the other one is using docker-compose.

### Docker installation
#### Dependency/Requirements 
Install git, docker, docker-compose.

#### Setup
Clone the current repository.  
__Edit the .env file__ to fix the mysql parameters (db name and password), then enter those commands (Linux):

cd dev-IdPServer-phpOIDC  
docker-compose up -d --build  
This will build two containers and a specific network (172.18.0.0/16). One container is hosting mysql (IP 172.18.0.2) and phpODIC and demo (IP 172.18.0.3).  
The demo application can use the phpOIDC to authenticate. 
This distribution is supposed to be exposed behind a reverse proxy in HTTPS.  

### Manual installation
#### Dependency/Requirements 
The requirements are the same than the original phpOIDC server (see https://bitbucket.org/PEOFIAMP/phpoidc)  
 * Apache Web Server with SSL  
 * MySQL  
 * PHP 5.3 + PHP Modules:   
  MDB2  
  MDB2_Driver_mysql  
  Doctrine ORM 1.2.4  
  PHPSecLib  

#### Setup

Install all dependencies, mysql and create a database and its user with a password.
<pre><code>
    % sudo apt-get install mysql-server  <br>
    % mysql -p  
    mysql> create database `phpOidc`;  
    mysql> grant all on phpOidc.* to phpOidc identified by 'new_password';  
    mysql> quit;  
</code></pre>
Follow the instruction that appears at the end of the installation (Configure apache for SSL if it were not previously.)  
There are two directories/folders: phpOp, and phpRp. They are the source code for OpenID Connect Provider and OpenID Connect Relying Party respecitively.  
Restart apache.  

##Test
This IdP OIDC is conform to the Nat Sakimura reference implementation in which we added an IdPProxy in conformance with the WebRTC Security Architecture.  
The path to the IdP Proxy must be DOMAIN + /.well-known/idp-proxy/ + PROTOCOL  
The IdPProxy is accessible on the URL .well-known/idp-proxy/rethink-oidc-ns

##Version note
An initial version of the server is published (accessible here: https://oidc-ns.kermit.orange-labs.fr/phpOp/index.php, see also testbed description). Lots of points still require polish and some functionnalities have not been tested (multiple user declaring a proxy).
A demo service has been provided and is published on this URL: https://oidc-ns.kermit.orange-labs.fr/demo/index.php, as well as a client registration UI (https://oidc-ns.kermit.orange-labs.fr/phpOp/register.php).
Contribution to the original OpenIDConnect project should be made to ensure consistency.


