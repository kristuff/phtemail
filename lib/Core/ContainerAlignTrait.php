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
 * Allow setting v/h align in a container
 */
trait ContainerAlignTrait
{
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

    /** 
     * Sets the container horizontal alignment   
     *
     * @access public
     * @param string   $value      
     * 
     * @return void
     */
    public function setAlign(string $value)
    {
        $this->horizontalAlign = $value;
    }

    /** 
     * Sets the container vertical alignment   
     *
     * @access public
     * @param string   $value      
     * 
     * @return void
     */
    public function setVerticalAlign(string $value)
    {
        $this->verticalAlign = $value;
    }
}