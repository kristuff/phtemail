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

namespace Kristuff\Phtemail;

/** 
 * Class EmailBodyContainer
 * The main container element inside our HtmlEmailBuilder
 */
class EmailBodyContainer extends \Kristuff\Phtemail\Core\HtmlBuilderContainer
{
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

        // html result. start with an empty string or a html comment
        $html  = $this->getBuilder()->getHtmlComment('EMAIL BODY' . ' //', $indent);
            
        // create a table container
        $html .= $indent . '<table bgcolor="'.$this->getBuilder()->emailBodyBackground() . '"' 
                                . ' width="'. $this->getBuilder()->emailBodyWidth() . '"'  
                                . ' border="0" cellpadding="0" cellspacing="0" id="emailBody">' .PHP_EOL;

        // render base elements collection
        foreach ($this->childElements as $element){
            $html .= $element->getHtml($indent . '  ') .PHP_EOL ;
        }

        $html .= $indent . '</table>'.PHP_EOL;
        $html .= $this->getBuilder()->getHtmlComment('// ' . 'EMAIL BODY', $indent);
        $html .= PHP_EOL;

        // done
        return $html;

    }

    
}