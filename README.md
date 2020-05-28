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

use Kristuff\Phtemail\HtmlEmailBuilder;
use Kristuff\Phtemail\HtmlElements;

// Create a new instance an HtmlEmailBuilder 
$builder = new HtmlEmailBuilder();

//todo
```
# Api methods

Method         | Parameters |  Description
------------   | --------   | --------  
HtmlEmailBuilder::renderHtmlComments()      | `bool` $value | Sets whether the html comments are rendered or not. Default is `false` 
HtmlEmailBuilder::renderCssComments()       | `bool` $value | Sets whether the css comments are rendered or not. Default is `false` 
HtmlEmailBuilder::backsideBackgroundColor() | `string` $value | Sets the backside background color
HtmlEmailBuilder::getBacksideBackgroundColor() | - | Gets the backside background color


# Licence
MIT
