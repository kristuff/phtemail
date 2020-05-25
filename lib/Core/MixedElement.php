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

namespace Kristuff\Phtemail\Core;

/**
 * Represents an html element
 */
class MixedElement extends \Kristuff\Phtemail\Core\HtmlElement
{
    /**
     * @access private
     * @var string $tag
     */
    protected $tag = '';

    /**
     * @access private
     * @var string $content
     */
    protected $content = '';

    /**
     * Constructor
     * 
     * @access public
     * @param string    $tag            The html tag 
     * @param string    $content        The element content
     * @param array     $styles         The inline styles
     */
    public function __construct(string $tag, string $content = '', array $styles = [])
    {
        $this->tag = $tag;
        $this->content = $content;
        $this->setStyles($styles);
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
        return $indent . '<' . $this->tag . $this->getInlineStyles() .'>' . $this->content. '</' . $this->tag  . '>';
    }
}