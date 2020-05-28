# phtemail
> Php Html email builder 

Wanting to send html emails from some apps, I have used some times email templates edited by hand, meaning needing to look into boring html table structure from an extisting template, hard code the email content, or place some tags to be replaced later with real content by the code that needs to retreive the template, search replace tags, etc... That's so boring 

`kristuff/Phtemail` lets you create your template **on the fly**. Then, you are free to save it or send it immediately.  

# Requirments
- PHP >= 7.1
- Composer (for install)

# Install
//todo

# Sample
Basic sample:

```php
<?php
require_once '../vendor/autoload.php';

use Kristuff\Phtemail\EmailBuilder;
use Kristuff\Phtemail\HtmlElements;

// Create a new instance an EmailBuilder 
$builder = new EmailBuilder();

//todo
```
# Api methods

Method                                      | Parameters        | Return    |  Description
----------------------------------------    | --------          | --------  | --------  
EmailBuilder::renderHtmlComments()          | `bool` $value     | `void`    | Sets whether the html comments are rendered or not. Default is `false` 
EmailBuilder::renderCssComments()           | `bool` $value     | `void`    | Sets whether the css comments are rendered or not. Default is `false` 
EmailBuilder::backsideBackgroundColor()     | -                 | `string`  | Gets the backside background color.
EmailBuilder::SetBacksideBackgroundColor()  | `string` $value   | `void`    | Sets the backside background color. $value must be a valid hex color.
EmailBuilder::backsideColor()               | -                 | `string`  | Gets the backside text color.
EmailBuilder::SetBacksideColor()            | `string` $value   | `void`    | Sets the backside text color. $value must be a valid hex color.
EmailBuilder::emailBodyWidth()              | -                 | `int`     | Gets the email body witdh in pixels.
EmailBuilder::setEmailBodyWidth()           | `int` $value      | `void`    | Sets the email body witdh in pixels.
EmailBuilder::emailBodyBackground()         | -                 | `string`  | Gets the email body background color.
EmailBuilder::setEmailBodyBackgroundColor() | `string` $value   | `void`    | Sets the email body background color. $value must be a valid hex color.
EmailBuilder::emailBodyFont()               | -                 | `string`  | Gets the email body font family.
EmailBuilder::setEmailBodyFont()            | `string` $value   | `void`    | Sets the email body font family
EmailBuilder::emailBodyFontSize()           | -                 | `string`  | Gets the email body font size in pixels.
EmailBuilder::setEmailBodyFontSize()        | `int` $value      | `void`    | Sets the email body font size in pixels.
EmailBuilder::emailBodyColor()              | -                 | `string`  | Gets the email body text color. $value must be a valid hex color.
EmailBuilder::setEmailBodyColor()           | `string` $value   | `void`    | Sets the email body text color.


# Licence
MIT
