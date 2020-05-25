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
 * Class ColumnRightContainer
 * Use in layout builder like TwoColumnRow
 */
class ColumnRightContainer extends ColumnLeftContainer
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
       $html  = $indent . '<td align="right" valign="middle" class="flexibleContainerBox">'. PHP_EOL;
       $html .= $indent . '  <table class="flexibleContainerBoxNext" bgcolor="'. $this->getEffectiveStyle('background-color') .
                                '" border="0" cellpadding="'. $this->getEffectiveStyle('padding') .'" cellspacing="0"' . 
                                ($this->columnWidth == 0 ? '' : ' width="' . $this->columnWidth . '"') . 
                                ' style="max-width:100%;">'.PHP_EOL;
       $html .= $indent . '    <tr>'.PHP_EOL;
       $html .= $indent . '      <td align="'. $this->horizontalAlign .'" valign="'. $this->verticalAlign .'" class="textContent">'.PHP_EOL;

       // render base elements collection
       foreach ($this->elements() as $element){
           $html .= $element->getHtml($indent . '        ');
           $html .= PHP_EOL ;
       }

       $html .= $indent . '      </td>'.PHP_EOL;
       $html .= $indent . '    </tr>'.PHP_EOL;
       $html .= $indent . '  </table>'.PHP_EOL;
       $html .= $indent . '</td>'.PHP_EOL;
       return $html;
    }

}