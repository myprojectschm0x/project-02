# Mini Shop Project 2

## Description

A small simulation from a mini-shop online with pure PHP. 

As an admin it can create, update or delete product and category and using the admin view.

As an user, it can see detail and "order" a product.

## Stacks and details

1. PHP pure
2. HTML,CSS
3. MySQL
4. Git
5. OOP
6. Static Class
7. Create and moving files
8. Autoload
9. Session

## Setup

Config the `conf` files on Apache's directory.

```
<VirtualHost *:80>
	ServerName www.name.com

	ServerAdmin webmaster@localhost
	DocumentRoot /var/www/html/the-path

	<Directory "/var/www/html/the-path">
		AllowOverride All
		Order allow,deny
		Allow from all
	</Directory>

	ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

And config the hosts file.

```
[...]
127.0.0.1   www.name.com
[...]
```

If you use Linux, execute the command for change the group to `www-data`:

```
sudo chown :www-data -R *
```

Then execute the sql for mysql on `databases/database.sql`.

Finally put your credential on `config/Database.php`.


## Review

Once the setup is done. You can visit the page, then create two users, one normal user and one admin. 

Then execute the sql for become an admin: 

```
update user set role = 'admin' where name = 'user_name' or id = [put the id of the user];
```

And then you can exploring this site. 

Thank you. 