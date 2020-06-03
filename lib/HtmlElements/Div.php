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
 * Represents the <div> html element
 */
class Div extends \Kristuff\Phtemail\Core\HtmlContainerElement
{
    /**
     * Constructor
     * 
     * @access public
     * @param  array    $styles         The inline styles
     */
    public function __construct(array $styles = [])
    {
        $this->setStyles($styles);
        $this->mandatoryStyles = array(
            'color',   
            'font-family',
            'font-size',
            'padding-top',
            'padding-bottom',
            'padding-left',
            'padding-right',
           // 'font-weight', todo
           // 'line-height',
        );

    }

    /** 
     * Gets the HTML 
     *
     * @access public
     * @param string    $indent
     * 
     * @return string   The html string content
     */
    public function getHtml(string $indent)
    {
       $html  = $indent . '<div'. $this->getInlineStyles() . '>'. PHP_EOL;

       // render child elements collection
       foreach ($this->elements() as $element){
           $html .= $element->getHtml($indent . '  '). PHP_EOL ;
       }

       $html .= $indent . '</div>'.PHP_EOL;
       return $html;
    }

}