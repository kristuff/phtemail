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
 * @version    0.2.0
 * @copyright  2017-2020 Kristuff
 */

namespace Kristuff\Phtemail\HtmlElements;

/**
 * Class Link
 * Represents a link tag (<a>) in html content
 */
class Link extends \Kristuff\Phtemail\Core\HtmlElement
{
    /**
     * @access private
     * @var string $linkHref
     */
    private $linkHref = '';

    /**
     * @access private
     * @var string $linkTitle
     */
    private $linkTitle = '';

     /**
     * @access private
     * @var string $content
     */
    protected $content = '';

    /**
     * Constructor
     * 
     * @access public
     * @param string    $content        The element content
     * @param string    $href           The link href
     * @param string    $title          The link title
     * @param array     $styles         The inline styles
     */
    public function __construct(string $content = '', string $href, string $title = '', array $styles = [])
    {
        $this->content = $content;
        $this->linkHref = $href;
        $this->linkTitle = $title;
        $this->setStyles($styles);
        $this->mandatoryStyles = array(
            'color',   
            'font-family',
            'font-size',
           // 'font-weight', todo
           // 'line-height',
        );
    }

    /** 
     * Get the HTML 
     *
     * @access public
     * @param string    $indent
     * 
     * @return string
     */
    public function getHtml(string $indent = '')
    {
        return  '' // $this->getBuilder()->getHtmlComment('A', $indent)
                    . $indent 
                    . '<a class="link"'
                    . ' target="_blank"' 
                    . ' href="'. $this->linkHref . '"' 
                    . ' title="'. $this->linkTitle . '"'
                    . $this->getInlineStyles() 
                    . '>'. PHP_EOL
                    . $this->content
                    . '</a>'. PHP_EOL;
    }
}