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
 * Class ColumnLeftContainer
 * Use in layout builder like TwoColumnRow
 */
class ColumnLeftContainer extends HtmlContainerElement
{
    /** 
     * The width of the column
     * Default is 0 to tell no column width set (auto)
     * 
     * @access private
     * @var int    $columnWidth
     */
    protected $columnWidth = 0;

    /** 
     * Sets the column width
     * 
     * @access public 
     * @param int           $width      The column width in pixels
     * 
     * @return $this
     */
    public function setColumnWidth(int $width)
    {
        $this->columnWidth = $width;
        return $this;
    }

    /**
     * Constructor
     */
    public function __construct(HtmlElement $parent)
    {
        $this->parent = $parent;
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
       $html  = $indent . '<td align="left" valign="top" class="flexibleContainerBox">'. PHP_EOL;
       $html .= $indent . '  <table border="0" cellpadding="'. $this->getEffectiveStyle('padding') .'" cellspacing="0"' . 
                                    ($this->columnWidth == 0 ? '' : ' width="' . $this->columnWidth . '"') .
                                   ' bgcolor="'. $this->getEffectiveStyle('background-color') .'"'.  
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