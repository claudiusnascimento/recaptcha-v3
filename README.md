#### Simple implementation of Google Recpatcha V3 to use in Laravel. Suport multiple forms in same page

### How to use:

#### Require de package
```sh
$ composer require claudiusnascimento/recaptcha-v3
```

### Add the service provider in providers array
```php
ClaudiusNascimento\RecaptchaV3\RecaptchaV3ServiceProvider::class
```

### In the alias array add:
```sh
'RecaptchaV3' => ClaudiusNascimento\RecaptchaV3\Facades\RecaptchaV3::class
```

### Go to Google Recaptcha and create new captcha:
###### *** Remember to choose reCAPTCHA v3 ***
[Create New Recaptcha](https://www.google.com/recaptcha/admin/create)



### After that add the site_key and secret_key in your ENV file

```env
RECAPTCHA_V3_SITE_KEY=<your site key>
RECAPTCHA_V3_SECRET_KEY=<your config key>
```

### Publish the config file for more control (if you want you)
```sh
$ php artisan vendor:publish --provider="ClaudiusNascimento\RecaptchaV3\RecaptchaV3ServiceProvider" --tag="config"
```

## Frontend
Inside the ```<form></form>``` tags add the following code:

```
{!! \RecaptchaV3::renderInput('some_action_control') !!}
```

Before closing tag ```</body>```tag put:
```
{!! \RecaptchaV3::renderJs() !!}
```

### In your form request add the following rule:
```php
'g-recaptcha-response' => 'required|recaptcha'
```

... and you good to go!

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](https://choosealicense.com/licenses/mit/)

