# phtemail
> Php Html email builder 


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

:Method                                         | :Parameters   | :Return |  :Description
----------------------------------------        | --------      | -------- | --------  
EmailBuilder::renderHtmlComments()          | `bool` $value | Sets whether the html comments are rendered or not. Default is `false` 
EmailBuilder::renderCssComments()           | `bool` $value | Sets whether the css comments are rendered or not. Default is `false` 
EmailBuilder::backsideBackgroundColor()     | -             | Gets the backside background color.
EmailBuilder::SetBacksideBackgroundColor()  | `string` $value | Sets the backside background color. $value must be a valid hex color.
EmailBuilder::backsideColor()               | -             | Gets the backside text color.
EmailBuilder::SetBacksideColor()            | `string` $value | Sets the backside text color. $value must be a valid hex color.
EmailBuilder::emailBodyWidth()              | -             | Gets the backside text color.
EmailBuilder::setEmailBodyWidth()
EmailBuilder::emailBodyBackground()
EmailBuilder::setEmailBodyBackgroundColor()
EmailBuilder::emailBodyFont()
EmailBuilder::setEmailBodyFont()
EmailBuilder::emailBodyFontSize()
EmailBuilder::setEmailBodyFontSize()

# Licence
MIT
