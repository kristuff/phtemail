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
    
    //todo
    protected $mandatoryStyles = array();

   //todo !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    protected $knowStyles = array(
        'padding' ,  

        'align'  ,     

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
    
    //todo !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    protected $styles = array();

    public function setStyles(array $styles = [])
    {
        foreach ($styles as $key => $value){
            if (in_array($key, $this->knowStyles)){
                $this->styles[$key] = $value;
            }
        }
    }
   

    //todo
    public function setAlign(string $value)
    {
        // todo validate
        $this->styles['align'] = $value;
    }

    public function setFont(string $value)
    {
        $this->styles['font'] = $value;
    }

    public function setFontSize(string $value)
    {
        $this->styles['font-size'] = $value;
    }
    
    public function setColor(string $value)
    {
        $this->styles['color'] = HtmlBuilder::validateColor($value);
    }

    public function setBackground(string $value)
    {
        $this->styles['background-color'] = HtmlBuilder::validateColor($value);
    }

    public function setPadding(string $value)
    {
        $this->styles['padding'] = $value;
    }
}