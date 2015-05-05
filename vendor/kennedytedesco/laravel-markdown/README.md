Laravel Markdown (Laravel 4 Package)
==========

An updated and stripped version of the original PHP Markdown by Michel Fortin. Works quite well with PSR-0 autoloaders and is Composer friendly.

Se more about 'PHP Markdown & Extra' on: http://github.com/dflydev/dflydev-markdown

### Changes from the 'dflydev markdown'

It is now possible to specify the language type of a code block, and use the both of markers (``` or ~~~).

Example:

	~~~php
	echo "It Works!";
	~~~

Or:

	```php
	echo "It Works!";
	```

Both generate this HTML:

	<pre><code class="lang-php php">
	echo "It Works!";
	</code></pre>
	
So, you can use:

- https://code.google.com/p/google-code-prettify/
- http://softwaremaniacs.org/soft/highlight/en/

### Required setup

In the **require** key of **composer.json** file add the following:

```php
"kennedytedesco/laravel-markdown": "dev-master"
```

Run the Composer **update** comand:

```php
composer update
```

In your **config/app.php** add *'Markdown'  => 'KennedyTedesco\Markdown\Facade'* to the end of the **'aliases'** array:

```php
'aliases' => array(
    ...
    ...
    'Markdown'  => 'KennedyTedesco\Markdown\Facade',
),
```

## Examples

If you want to use Extra (extended) version:


        $str = <<<'TEXT'
        ```php
        return array(

            /*
            | -----------------------------------------------------------------------------
            | Enable profiler
            | -----------------------------------------------------------------------------
            |
            | By default, enabled is set to null. This tells the profiler to use the
            | application's debug configuration. However, if enabled is set to true the
            | profiler will be displayed even if the application's debugging is disabled.
            | Likewise, setting enabled to false will hide the profiler even if debugging
            | is on.
            |
            */

            'enabled' => true,
        );
        ```    
        TEXT;

        echo Markdown::transformExtra($str);

Or, default version:

```php
echo Markdown::transform($str);
```

Another example:

	# PHP
	
	![PHP Logo](http://static.php.net/www.php.net/images/php.gif)
	
	[PHP](http://php.net/) is a `widely-used` general-purpose scripting language that is especially suited for **Web development** and can be embedded into **HTML**. 
	
	Code:
	
	```php
	<?php
	 $vars['product']['price']=11;
	
	 $aa='product';
	 $bb='price';
	
	 echo $vars{$aa}{$bb};
	
	 //prints 11
	?>
	```

### More

- http://michelf.com/projects/php-markdown/
- https://github.com/dflydev/dflydev-markdown
- https://github.com/egil/php-markdown-extra-extended
