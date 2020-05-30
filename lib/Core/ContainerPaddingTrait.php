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
 * Allow to set container padding, removing top and/or bottom padding
 */
trait ContainerPaddingTrait
{
   /** 
    * The cell padding in pixels. Default is 30 pixels
    * 
    * @access protected
    * @var int      $cellPadding
    */
    protected $cellPadding = 30;
    
   /** 
    * True to remove top padding. Default is false  
    * 
    * @access protected
    * @var bool     $removePaddingTop
    */
    protected $removePaddingTop = false;

    /** 
    * True to remove bottom padding. Default is false  
    * 
    * @access protected
    * @var bool     $removePaddingTop
    */
    protected $removePaddingBottom = false;
 
    /** 
     * Sets the container padding   
     *
     * @access public
     * @param int   $value      The padding in pixels
     * 
     * @return void
     */
    public function setPadding(int $value)
    {
        $this->cellPadding = $value;
    }

    /** 
     * Remove container top padding   
     *
     * @access public
     * 
     * @return void
     */
    public function removePaddingTop()
     {
         $this->removePaddingTop = true;
     }

    /** 
     * Remove container bottom padding   
     *
     * @access public
     * 
     * @return void
     */
    public function removePaddingBottom()
     {
         $this->removePaddingBottom = true;
     }

    /** 
     * Gets html style for tr element when using removePadding   
     *
     * @access public
     * 
     * @return string   The style string content
     */
     protected function getRowStyle()
     {
         return ($this->removePaddingTop || $this->removePaddingBottom ) ?
                 'style="'. 
                 ($this->removePaddingTop ? 'padding-top:0;' : '') .
                 ($this->removePaddingBottom ? 'padding-bottom:0;' : '').
                 '"' : '';
     }
}