# ascriptmedia
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=project_db
DB_USERNAME=root
DB_PASSWORD=
////// by zeinab about cart///////
darryldecode/cart  //packge name
to install it 
composer require darryldecode/cart                      //by composer
 after install add
1- Open config/app.php and add this line to your Service Providers Array.
Darryldecode\Cart\CartServiceProvider::class
2- Open config/app.php and add this line to your Aliases
'Cart' => Darryldecode\Cart\Facades\CartFacade::class


/////