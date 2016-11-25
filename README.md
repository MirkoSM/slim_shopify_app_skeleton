# slim_shopify_app_skeleton

1. Require dependencies using Composer:
	```php composer.phar update```
2. Set up database configuration:
	```app/config/db.php```
3. Set up Shopify configuration:
    ```app/config/shopifyCredentials.php```
4. Run DB tables migration:
    ```php vendor/bin/phinx migrate```
5. Setup token and Store to DB (go to "auth" route). You have to been redirected to **{base_url}/main**:
    ```{base_url}/auth```
    
 - For now you can install this code (app, back-end) only for one store (see **app/config/shopifyCredentials.php**)*[]: 
 - Use "https://github.com/microapps/Shopify-Embedded-App-Frontend-Framework" as HTML template