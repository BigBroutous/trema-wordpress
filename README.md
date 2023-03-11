# Trema Wordpress deployment

## Usage

Deploy a composer based WordPress website.

- Use `composer create-project trema/wordpress` to perform the composer-based installation.
- Create your `config/.env` file out from `config/.env.dist`
- Then run the automated wp-cli installation : `composer run install-wp`. You can skip this test if you plan to use an already existing database.

Your website is ready to go :tada:

## Warning

Some security issues are to expect if you're not using Apache or if the `config/.htaccess` file is ignored. If it happends, the `.env` file will be exposed. Please secure this directory by rejecting all requests to it.

## Commands

- to perform your plugin updates : `composer update`
- to install a new plugin : use the Wpackagist packages with `composer require wpackagist-plugin/[plugin name]`.
- to install a new theme : use the Wpackagist themes with `composer require wpackagist-theme/[theme name]`.
- you can use wp-cli with the executable `./vendor/bin/wp [command]`
