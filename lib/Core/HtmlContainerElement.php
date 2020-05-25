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
 * Class HtmlContainerElement
 * Abstract base class for Html email elements that can have child(s)
 */
abstract class HtmlContainerElement extends HtmlElement
{
    /** 
     * The content of the email
     * 
     * @access private
     * @var array           $childElement
     */
    protected $childElements = array();

    /** 
     * The vertical alignment
     * 
     * @access private
     * @var string          $verticalAlign
     */
    protected $verticalAlign = \Kristuff\Phtemail\HtmlEmailBuilder::V_ALIGN_TOP;

    /** 
     * The horizontal alignment
     * 
     * @access private
     * @var string          $horizontalAlign
     */
    protected $horizontalAlign = \Kristuff\Phtemail\HtmlEmailBuilder::H_ALIGN_LEFT;

    //todo
    public function setAlign($value)
    {
        $this->horizontalAlign = $value;
    }

    //todo
    public function setVerticalAlign($value)
    {
        $this->verticalAlign = $value;
    }

    /** 
     * Add an element to the HtmlElement collection
     * 
     * @access public 
     * @param HtmlElement   $element    An html element
     * 
     * @return void
     */
    public function add(HtmlElement $element)
    {
        $element->setParent($this);
        $this->childElements[] = $element;
    }

    /** 
     * Get the html element collection
     * 
     * @access public 
     * @return array
     */
    public function elements()
    {
        return $this->childElements;
    }


    /** 
     * Gets the HTML 
     *
     * @access public
     * @param string        $indent
     * 
     * @return string       The html string content
     */
    public function getHtml(string $indent)
    {
        // html result. start with an empty string or a html comment
        $html  = $this->getBuilder()->getHtmlComment('BLOCK', $indent);
     
        // render base elements collection
        foreach ($this->elements() as $element){
            $html .= PHP_EOL . $element->getHtml($indent);
        }
        
        // ending comment
        $html  .= $this->getBuilder()->getHtmlComment('END BLOCK', $indent);

        // return the build html 
        return $html;
    }    
}