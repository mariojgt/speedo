## Welcome to Speedo

Speedo is a lightweight framework based in Laravel design to use the minimal and to have a very clean syntax.

### Routes

Speedo routes can be found in src/routes/web.php, you can add as many files in that folder they are loaded in the src/boostrap/boostrap.php method route, bellow there is a example how you can define routes.

```php
use Speedo\App\Controllers\HomeController;

return [
    '/index' => [ // The name of the route
        'method'   => 'get', // method can be lower or capital case
        'class'    => HomeController::class, // the class or controler in this example
        'function' => 'index' // the method
    ],
];
```

Limitations, for now you can't pass parameter in the url but you can pass get parameters.

### Controllers

Controllers locations should be inside src/App/Controllers/, and they work almost the same as Laravel note they need to extend from the controller class BaseController.php because this base controller have someting.

### Support or Contact

Having trouble with Pages? Check out our [documentation](https://docs.github.com/categories/github-pages-basics/) or [contact support](https://support.github.com/contact) and we’ll help you sort it out.