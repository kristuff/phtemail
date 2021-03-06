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

namespace Kristuff\Phtemail\Core;

use Kristuff\Phtemail\HtmlEmailBuilder;

/** 
 * Class HtmlElement
 * Abstract base class for all Html email elements
 */
abstract class HtmlElement extends StylizedElement
{
    /** 
     * The HtmlElement parent element
     * 
     * @access protected
     * @var HtmlElement     $parent
     */
    protected $parent = null;

    /** 
     * Define the parent of of current htmlElement
     * 
     * @access public 
     * @param HtmlElement   $element    The parent HtmlElement
     * 
     * @return void
     */
    public function setParent(HtmlElement $element)
    {
        $this->parent = $element;
    }
    
    /** 
     * Gets the HtmlEmailBuilder parent instance
     * Could be direct parent of this element, sub parent (recursive function)
     * 
     * @access public 
     * @return HtmlEmailBuilder
     */
    public function getBuilder()
    {
        // try with the first level parent
        if ($this->parent instanceof HtmlEmailBuilder){
            return $this->parent;
        }

        // look for parent of parent...
        return $this->parent->getBuilder();
    }

    /** 
     * Get the HTML 
     *
     * @access public
     * @param string    $indent
     * 
     * @return string
     */
    abstract public function getHtml(string $indent);

    /** 
     * Gets the effective style for the given key. Style can be set 
     * at current HtmlElement level, or parent level. If none of them
     * are set, returns a default value. 
     *
     * @access public
     * @param string    $key        The style name
     * 
     * @return string
     */
    public function getEffectiveStyle(string $key)
    {
        // first look if key style is defined in this element
        if (array_key_exists($key, $this->styles)){
            return $this->styles[$key];
        }

        // look into parent
        if (!$this->parent instanceof HtmlEmailBuilder){
            $style = $this->parent->getEffectiveStyle($key);
            if (!empty($style)){
                return $style;
            }
        }

        // get default
        if (in_array($key, $this->knowStyles)){
            switch ($key){
                case 'padding-top':         return '0';
                case 'padding-bottom':      return '0';
                case 'padding-left':        return '0';
                case 'padding-right':       return '0';
                case 'font-size':           return $this->getBuilder()->emailBodyFontSize();
                case 'font-family':         return $this->getBuilder()->emailBodyFont();
                case 'color':               return $this->getBuilder()->emailBodyColor();
                case 'background-color':    return $this->getBuilder()->emailBodyBackground();
            }
        }
    }

    /** 
     * Gets the inline styles for current element. Styles may be set
     * explicitly at current HtmlElement level, or part of mandatory 
     * styles some HtmlElements will force to use. 
     *
     * @access public
     * @param string    $key        The style name
     * 
     * @return string
     */
    protected function getInlineStyles()
    {
        $stylesCollection = [];
        foreach ($this->styles as $key => $value){
           $stylesCollection[] = $key. ':' . $value;
        }
        
        // check for mandatory styles
        foreach ($this->mandatoryStyles as $style){
            if (!array_key_exists($style, $this->styles)){
                $stylesCollection[] = $style . ':' . $this->getEffectiveStyle($style); 
            }
        }

        return !empty($stylesCollection) ? ' style="'. implode(';', $stylesCollection) .'"' : '';
    }

}