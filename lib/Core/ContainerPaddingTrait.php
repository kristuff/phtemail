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
 * Allow removing top and/or bottom padding from a container
 */
trait ContainerPaddingTrait
{
   /** 
    * The cell padding in pixels
    * Default is 30 pixels
    * 
    * @access private
    * @var int             $cellPadding
    */
    protected $cellPadding = 30;
    
     //todo
     protected $removePaddingTop = false;
     protected $removePaddingBottom = false;
 
    //todo
    public function setPadding(int $value)
    {
        $this->cellPadding = $value;
    }

     public function removePaddingTop()
     {
         $this->removePaddingTop = true;
     }
     public function removePaddingBottom()
     {
         $this->removePaddingBottom = true;
     }
 
     protected function getRowStyle()
     {
         return ($this->removePaddingTop || $this->removePaddingBottom ) ?
                 'style="'. 
                 ($this->removePaddingTop ? 'padding-top:0;' : '') .
                 ($this->removePaddingBottom ? 'padding-bottom:0;' : '').
                 '"' : '';
     }
}