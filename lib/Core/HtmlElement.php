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

    //todo
    public function getEffectiveStyle($key)
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
                case 'padding':             return '20';
                case 'align':               return 'left';
                case 'font-size':           return '14px';
                case 'font-family':         return $this->getBuilder()->emailBodyFont();
                case 'color':               return $this->getBuilder()->emailBodyColor();
                case 'background-color':    return $this->getBuilder()->emailBodyBackground();

            }
        }
    }

     
    // todo
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