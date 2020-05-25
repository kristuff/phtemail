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
 * Represents an image  tag (<img>) in html content
 */
class Image extends HtmlElement
{
    /**
     * @access private
     * @var string $imageSrc
     */
    private $imageSrc = '';

    /**
     * @access private
     * @var string $imageTitle
     */
    private $imageTitle = '';

    /**
     * @access private
     * @var string $imageAlt
     */
    private $imageAlt = '';

    /**
     * @access private
     * @var int $imageWidth
     */
    private $imageWidth = '';

     /**
     * @access private
     * @var int $imageMaxHeight todo type
     */
    private $imageMaxHeight = '';

     /**
     * Constructor
     * 
     * @access public
     * @param string    $src       The image source
     * @param int       $width     The image width
     * @param string    $title     The image title
     * @param string    $alt       The image alt
     */
    public function __construct(string $src, int $width, string $title = '', string $alt = '')
    {
        $this->imageSrc   = $src;
        $this->imageWidth = $width;
        $this->imageTitle = $title;
        $this->imageAlt   = $alt;
    }

    //todo
    public function setMaxHeight($value)
    {
        $this->imageMaxHeight = $value;
    }

    /** 
     * Get the HTML 
     *
     * @access public
     * @param string    $indent
     * 
     * @return string
     */
    public function getHtml(string $indent)
    {
        return $this->getBuilder()->getHtmlComment('IMAGE', $indent) . $indent 
                             . '<img class="flexibleImage"'
                             . ' src="'. $this->imageSrc . '"' 
                             . ' width="'. strval($this->imageWidth) . '"' 
                             . ' alt="'. $this->imageAlt . '"' 
                             . ' title="'. $this->imageTitle . '"' 
                             . ' style="max-width:'. strval($this->imageWidth) .'px;width:100%;display:block;'
                             . (empty($this->imageMaxHeight) ? '' : 'max-height:'. strval($this->imageMaxHeight) .'px;')
                             . '"/>';
    }
}