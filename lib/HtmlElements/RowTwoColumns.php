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

use Kristuff\Phtemail\Core\ColumnLeftContainer;
use Kristuff\Phtemail\Core\ColumnRightContainer;
use Kristuff\Phtemail\Core\HtmlElement;

/** 
 * Class RowTwoColumns
 */
class RowTwoColumns extends HtmlElement
{
    /** 
     * Allow to set padding and remove top/bottom padding
     */
    use \Kristuff\Phtemail\Core\ContainerPaddingTrait;

    
    /** 
     * The first column
     * 
     * @access private
     * @var ColumnLeftContainer    $leftCol
     */
    protected $leftCol = null;

    /** 
     * The second column
     * 
     * @access private
     * @var ColumnRightContainer   $rightCol
     */
    protected $rightCol = null;

    /** 
     * Gets the first column
     * 
     * @access public 
     * @return ColumnLeftContainer
     */
    public function leftColumn()
    {
        return $this->leftCol;
    }

    /** 
     * Gets the second column
     * 
     * @access public 
     * @return ColumnRightContainer
     */
    public function rightColumn()
    {
        return $this->rightCol;
    }

    /**
     * Constructor
     * 
     * @access public
     */
    public function __construct()
    {
        $this->leftCol = new ColumnLeftContainer($this);
        $this->rightCol = new ColumnRightContainer($this);
        $this->leftCol->setPadding(0);
        $this->rightCol->setPadding(0);
    }

    /** 
     * Gets the HTML 
     *
     * @access public
     * @param string        $indent
     * 
     * @return string       The html string content
     */
    public function getHtml(string $indent)
    {
        // html result. start with an empty string or a html comment
        $html  = $this->getBuilder()->getHtmlComment('ROW TWO COLUMNS CONTAINER' . ' //', $indent);
     
        $html .= $indent . '<tr>'.PHP_EOL;
        $html .= $indent . '  <td align="center" valign="top">'.PHP_EOL;

        $html .= $this->getBuilder()->getHtmlComment('CENTERING TABLE //', $indent . '    ');

        $html .= $indent . '    <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="'. $this->getEffectiveStyle('background-color').'">'.PHP_EOL;
        $html .= $indent . '      <tr'. $this->getRowStyle() .'>'.PHP_EOL;
        $html .= $indent . '        <td align="center" valign="top">'.PHP_EOL;

        $html .= $this->getBuilder()->getHtmlComment('FLEXIBLE CONTAINER //', $indent . '          ');

        $html .= $indent . '          <table border="0" cellspacing="0" cellpadding="'. $this->cellPadding . 
                                        '" bgcolor="'. $this->getEffectiveStyle('background-color').
                                        '" width="'. $this->getBuilder()->emailBodyWidth() . 
                                        '" class="flexibleContainer">'.PHP_EOL;
        $html .= $indent . '            <tr>'.PHP_EOL;
        $html .= $indent . '              <td'.$this->getRowStyle().
                                              ' align="center" valign="top" width="'. $this->getBuilder()->emailBodyWidth() . 
                                              '" class="flexibleContainerCell">'.PHP_EOL;

        $html .= $this->getBuilder()->getHtmlComment('CONTENT TABLE //', $indent . '               ');
        
        $html .= $indent . '                <table border="0" cellpadding="0" cellspacing="0" width="100%">'.PHP_EOL;
        $html .= $indent . '                  <tr>'.PHP_EOL;

        $html .= $this->getBuilder()->getHtmlComment('COLUMN LEFT //', $indent . '                    ');
        $html .= $this->leftColumn()->getHtml($indent . '                    ');
        $html .= $this->getBuilder()->getHtmlComment('// COLUMN LEFT', $indent . '                    ');

        $html .= $this->getBuilder()->getHtmlComment('COLUMN RIGHT //', $indent. '                    ');
        $html .= $this->rightColumn()->getHtml($indent . '                    ');
        $html .= $this->getBuilder()->getHtmlComment('// COLUMN RIGHT', $indent. '                    ');


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

        $html .= $this->getBuilder()->getHtmlComment('// ' . 'ROW TWO COLUMNS CONTAINER', $indent);
        return $html;
    }
    
}