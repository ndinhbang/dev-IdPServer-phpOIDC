FROM ubuntu:14.04
MAINTAINER simon.becot@orange.com
RUN apt-get update; apt-get install -y apache2 
RUN apt-get install -y php5 php-mdb2 php-mdb2-driver-mysql php5-mcrypt php5-curl php-pear; php5enmod mcrypt 

RUN pear channel-discover pear.doctrine-project.org; pear install doctrine/Doctrine
RUN pear channel-discover phpseclib.sourceforge.net
RUN pear install phpseclib/Crypt_AES; pear install phpseclib/Crypt_Blowfish; pear install phpseclib/Crypt_DES; pear install phpseclib/Crypt_Hash; pear install phpseclib/Crypt_RC4; pear install phpseclib/Crypt_RSA; pear install phpseclib/Crypt_TripleDES; pear install phpseclib/Crypt_Twofish; pear install phpseclib/File_ANSI; pear install phpseclib/File_ASN1; pear install phpseclib/File_X509; pear install phpseclib/Net_SCP; pear install phpseclib/Net_SFTP; pear install phpseclib/Net_SSH1; pear install phpseclib/System_SSH_Agent
WORKDIR /var/www/html
COPY . /var/www/html
RUN sudo a2enmod ssl; a2ensite default-ssl; sudo rm -f index.html; chmod a+w phpOp/app.log; chmod a+w phpRp/app.log; mv start.sh /usr/local/bin/;a2enmod rewrite
ENTRYPOINT /usr/local/bin/start.sh

