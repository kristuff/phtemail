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
 * @version    0.2.0
 * @copyright  2017-2020 Kristuff
 */

namespace Kristuff\Phtemail\Core;

use Kristuff\Phtemail\HtmlEmailBuilder;
use Kristuff\Phtemail\Core\HtmlContainerElement;

/** 
 * Class HtmlBuilderContainer
 * Abstract base class for top level builder elements (ie: header, body and footer)
 * Contrary to the other containers, the parent is the HtmlEmailBuilder, not another HtmlElement  
 */
abstract class HtmlBuilderContainer extends HtmlContainerElement
{
    /** 
     * The htmlEmailBuilder parent class
     * 
     * @access protected
     * @var HtmlEmailBuilder $parent
     */
    protected $parent = null;

    /**
     * Constructor
     */
    public function __construct(HtmlEmailBuilder $parent)
    {
        $this->parent = $parent;
    }

    /** 
     * Gets the HTML 
     *
     * @access public
     * @param string        $indent                 The indendation to start with
     * @param string        $partName               The part name: EMAIL BODY, FOOTER, or HEADER 
     * @param string        $id                     The section id 
     * @param string        $backgroundColor        The background color 
     * 
     * @return string   The html string content
     */
    protected function getHtmlStructure(string $indent, string $partName, string $id, string $backgroundColor)
    {
        // html result. start with an empty string or a html comment
        $html  = $this->getBuilder()->getHtmlComment($partName . ' //', $indent);
     
        // create a table container
        $html .= $indent . '<table bgcolor="'. $backgroundColor . '"' 
                               . ' width="'. $this->getBuilder()->emailBodyWidth() . '"'  
                               . ' border="0" cellpadding="0" cellspacing="0" id="'. $id .'">' .PHP_EOL;

        $html .= $indent . '  <tr>'.PHP_EOL;
        $html .= $indent . '    <td align="center" valign="top">'.PHP_EOL;

        $html .= $this->getBuilder()->getHtmlComment('CENTERING TABLE //', $indent . '      ');

        $html .= $indent . '      <table border="0" cellpadding="0" cellspacing="0" width="100%">'.PHP_EOL;
        $html .= $indent . '        <tr>'.PHP_EOL;
        $html .= $indent . '          <td align="center" valign="top">'.PHP_EOL;

        $html .= $this->getBuilder()->getHtmlComment('FLEXIBLE CONTAINER //', $indent . '            ');

        $html .= $indent . '            <table border="0" cellpadding="' . $this->cellPadding . '" cellspacing="0" width="'. $this->getBuilder()->emailBodyWidth() . '" class="flexibleContainer">'.PHP_EOL;
        $html .= $indent . '              <tr>'.PHP_EOL;
        $html .= $indent . '                <td align="center" valign="top" width="'. $this->getBuilder()->emailBodyWidth() . '" class="flexibleContainerCell">'.PHP_EOL;

        $html .= $this->getBuilder()->getHtmlComment('CONTENT TABLE //', $indent . '                 ');
        
        $html .= $indent . '                  <table border="0" cellpadding="0" cellspacing="0" width="100%">'.PHP_EOL;
        $html .= $indent . '                    <tr>'.PHP_EOL;
        $html .= $indent . '                      <td valign="'. $this->verticalAlign .'" align="'. $this->horizontalAlign .'" bgcolor="'. $backgroundColor . '">'.PHP_EOL;

        // render child elements collection
        foreach ($this->childElements as $element){
            $html .= $element->getHtml($indent . '                        ');
            $html .= PHP_EOL ;
        }

        $html .= $indent . '                      </td>'.PHP_EOL;
        $html .= $indent . '                    </tr>'.PHP_EOL;
        $html .= $indent . '                  </table>'.PHP_EOL;
        
        $html .= $this->getBuilder()->getHtmlComment('// CONTENT TABLE', $indent . '                 ');

        $html .= $indent . '                </td>'.PHP_EOL;
        $html .= $indent . '              </tr>'.PHP_EOL;
        $html .= $indent . '            </table>'.PHP_EOL;

        $html .= $this->getBuilder()->getHtmlComment('// FLEXIBLE CONTAINER', $indent . '            ');

        $html .= $indent . '          </td>'.PHP_EOL;
        $html .= $indent . '        </tr>'.PHP_EOL;
        $html .= $indent . '      </table>'.PHP_EOL;

        $html .= $this->getBuilder()->getHtmlComment('// CENTERING TABLE', $indent . '      ');

        $html .= $indent . '    </td>'.PHP_EOL;
        $html .= $indent . '  </tr>'.PHP_EOL;
        $html .= $indent . '</table>'.PHP_EOL;
       
        $html .= $this->getBuilder()->getHtmlComment('// ' . $partName, $indent);
        $html .= PHP_EOL;

        // done
        return $html;
    }
}