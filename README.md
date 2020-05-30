# phtemail
> Php Html email builder 

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/kristuff/phtemail/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/kristuff/phtemail/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/kristuff/phtemail/badges/build.png?b=master)](https://scrutinizer-ci.com/g/kristuff/phtemail/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/kristuff/phtemail/v/stable)](https://packagist.org/packages/kristuff/phtemail)
[![License](https://poser.pugx.org/kristuff/phtemail/license)](https://packagist.org/packages/kristuff/phtemail)

Wanting to send html emails from some apps, I have used some times email templates edited by hand, meaning needing to look into boring html table structure from an extisting template, hard code the email content, or place some tags to be replaced later with real content by the code that needs to retreive the template, search replace tags, etc... That's so boring 

`Kristuff\Phtemail` lets you create your template **on the fly**. Then, you are free to save it or send it immediately. The library comes with a centered layout, custom html elements for layout and email content, predefined styles, and methods / ways to customize the email as you need. 

# Requirments
- PHP >= 7.1
- Composer (for install)

# Install
- Install with composer:

    ```
    $  composer require kristuff/phtemail
    ```
    
- Or deploy in your project (in `composer.json`):

    ```
    {
        ...
        "require": {
            "kristuff/phtemail": ">=0.1-stable"
        }
    }
    ```

# Sample
Basic sample:

```php
<?php
require_once '../vendor/autoload.php';

use Kristuff\Phtemail\HtmlEmailBuilder;
use Kristuff\Phtemail\HtmlElements;

// Create a new instance an HtmlEmailBuilder 
$builder = new HtmlEmailBuilder();

//todo

// Get the generated email
email = $builder->getHtml();
```

# Licence
MIT
