<?php

/**
 *  ____  _     _                       _ _
 * |  _ \| |__ | |_ ___ _ __ ___   __ _(_) |
 * | |_) | '_ \| __/ _ \ '_ ` _ \ / _` | | |
 * |  __/| | | | ||  __/ | | | | | (_| | | |
 * |_|   |_| |_|\__\___|_| |_| |_|\__,_|_|_|
 *
 * This file is part of Kristuff\Phtemail.
 *
 * (c) Kristuff <contact@kristuff.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @version    0.1.0
 * @copyright  2017-2020 Kristuff
 */

namespace Kristuff\Phtemail\HtmlElements;

use Kristuff\Phtemail\Core\HtmlElement;

/**
 * Class InlineElement
 * An inline html element that will be rendered 'as is'
 */
class InlineElement extends HtmlElement
{
    /**
     * @access private
     * @var string $htmlContent
     */
    private $htmlContent = '';

    /**
     * Constructor
     * 
     * @param string    $content    The html content string    
     */
    public function __construct(string $content)
    {
        $this->htmlContent = $content;
    }
    
    // todo
    public function getHtml(string $indent)
    {
        $html  = $this->getBuilder()->getHtmlComment('CUSTOM ELEMENT', $indent);
        $html .= $indent . $this->htmlContent . PHP_EOL;
        return $html;
    }
}