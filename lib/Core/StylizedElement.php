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
 * Class StylyzedElement
 * Abstract base class for Html elements
 * 
 * That class allow to define the following styles:
 *  - Color  
 *  - FontFamily
 *  - FontSize
 *  - ...
 * 
 *  Containers elements that extends that class will apply other 'container styles' (ie: align, ...todo)
 */
abstract class StylizedElement 
{
    /** 
     * The mandatory styles list. Html elements with mandarory styles will recieve an inline style for each style.
     * 
     * @access private
     * @var array   $mandatoryStyles
     */
    protected $mandatoryStyles = array();

    /** 
     * The known styles list. 
     * 
     * @access private
     * @var array   $knowStyles
     */
    protected $knowStyles = array(
        'color' ,   
        'background-color',
        'font-family',
        'font-size',
        'font-weight',
        'line-height',
        'padding-top' ,  
        'padding-left' ,  
        'padding-bottom',  
        'padding-right',
        'text-align',  
    );
    
    /** 
     * The current html element styles
     * 
     * @access private
     * @var array   $styles
     */
    protected $styles = array();

    /** 
     * Sets inline styles    
     *
     * @access public
     * @param array     $styles        An indexed array of inline styles=>value    
     * 
     * @return void
     */
    public function setStyles(array $styles = [])
    {
        foreach ($styles as $key => $value){
            if (in_array($key, $this->knowStyles)){
                $this->styles[$key] = $value;
            }
        }
    }

    /** 
     * Sets the font family
     *
     * @access public
     * @param string     $value        
     * 
     * @return void
     */
    public function setFont(string $value)
    {
        $this->styles['font'] = $value;
    }

    /** 
     * Sets the font size. 
     *
     * @access public
     * @param string     $value        The font size in pixels. Value must have the 'px' extension
     * 
     * @return void
     */
    public function setFontSize(string $value)
    {
        $this->styles['font-size'] = $value;
    }
    
    /** 
     * Sets the text color
     *
     * @access public
     * @param string     $value        
     * 
     * @return void
     * @throws \InvalidArgumentException     if the color is not a valid hex color
     */
    public function setColor(string $value)
    {
        $this->styles['color'] = HtmlBuilder::validateColor($value);
    }

    /** 
     * Sets the background color 
     *
     * @access public
     * @param string     $value        
     * 
     * @return void
     * @throws \InvalidArgumentException     if the color is not a valid hex color
     */
    public function setBackground(string $value)
    {
        $this->styles['background-color'] = HtmlBuilder::validateColor($value);
    }

}