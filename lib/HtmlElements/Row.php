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

namespace Kristuff\Phtemail\HtmlElements;

use Kristuff\Phtemail\Core\HtmlContainerElement;

/** 
 * Class Row
 */
class Row extends HtmlContainerElement
{
    //todo
    protected $removePaddingTop = false;
    protected $removePaddingBottom = false;

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
        return ($this->removePaddingBottom || $this->removePaddingBottom ) ?
                'style="'. 
                ($this->removePaddingTop ? 'padding-top:0;' : '') .
                ($this->removePaddingBottom ? 'padding-bottom:0;' : '').
                '"' : '';
    }

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
        $html  = $this->getBuilder()->getHtmlComment('ROW CONTAINER' . ' //', $indent);
     
        $html .= $indent . '<tr>'.PHP_EOL;
        $html .= $indent . '  <td align="center" valign="top">'.PHP_EOL;

        $html .= $this->getBuilder()->getHtmlComment('CENTERING TABLE //', $indent . '    ');

        $html .= $indent . '    <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="'. $this->getEffectiveStyle('background-color').'">'.PHP_EOL;
        $html .= $indent . '      <tr '. $this->getRowStyle() .'>'.PHP_EOL;
        $html .= $indent . '        <td align="center" valign="top">'.PHP_EOL;

        $html .= $this->getBuilder()->getHtmlComment('FLEXIBLE CONTAINER //', $indent . '          ');

        $html .= $indent . '          <table border="0" "cellspacing="0" cellpadding="' . $this->getEffectiveStyle('padding') . 
                                        '" bgcolor="'. $this->getEffectiveStyle('background-color').
                                        '" width="'. $this->getBuilder()->emailBodyWidth() . 
                                        '" class="flexibleContainer">'.PHP_EOL;
        $html .= $indent . '            <tr>'.PHP_EOL;
        $html .= $indent . '              <td '. $this->getRowStyle() .
                                              ' align="center" valign="top" width="'. $this->getBuilder()->emailBodyWidth() . 
                                              '" class="flexibleContainerCell">'.PHP_EOL;

        $html .= $this->getBuilder()->getHtmlComment('CONTENT TABLE //', $indent . '               ');
        
        $html .= $indent . '                <table border="0" cellpadding="0" cellspacing="0" width="100%">'.PHP_EOL;
        $html .= $indent . '                  <tr>'.PHP_EOL;
        $html .= $indent . '                    <td align="'. $this->horizontalAlign .'" valign="'. $this->verticalAlign .'" style="color:'. $this->getEffectiveStyle('color') . ';" bgcolor="'. $this->getEffectiveStyle('background-color') . '">'.PHP_EOL;

        // render base elements collection
        foreach ($this->childElements as $element){
            $html .= $element->getHtml($indent . '                      '). PHP_EOL;
        }

        $html .= $indent . '                    </td>'.PHP_EOL;
        $html .= $indent . '                  </tr>'.PHP_EOL;
        $html .= $indent . '                </table>'.PHP_EOL;
        
        $html .= $this->getBuilder()->getHtmlComment('// CONTENT TABLE', $indent . '               ');

        $html .= $indent . '              </td>'.PHP_EOL;
        $html .= $indent . '            </tr>'.PHP_EOL;
        $html .= $indent . '          </table>'.PHP_EOL;

        $html .= $this->getBuilder()->getHtmlComment('// FLEXIBLE CONTAINER', $indent . '          ');

        $html .= $indent . '        </td>'.PHP_EOL;
        $html .= $indent . '      </tr>'.PHP_EOL;
        $html .= $indent . '    </table>'.PHP_EOL;

        $html .= $this->getBuilder()->getHtmlComment('// CENTERING TABLE', $indent . '    ');

        $html .= $indent . '  </td>'.PHP_EOL;
        $html .= $indent . '</tr>'.PHP_EOL;

        $html .= $this->getBuilder()->getHtmlComment('// ' . 'ROW CONTAINER', $indent);
        return $html;
    }
    
}