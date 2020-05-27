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

use Kristuff\Phtemail\Core\HtmlBuilder;

/** 
 * Class ButtonRow
 */
class ButtonRow extends Row
{
    /**
     * @access private
     * @var string $buttonText
     */
    private $buttonText = '';

      /**
     * @access private
     * @var string $buttonSrc
     */
    private $buttonSrc = '';

    /**
     * Constructor
     * 
     * @param string    $content    The html content string    
     */
    public function __construct(string $content, string $src = '')
    {
        $this->buttonText = $content;
        $this->buttonSrc = $src;
        $this->styles['button_background'] = '#DA5A20';
        $this->styles['button_color'] =      '#EEEEEE';
        $this->styles['button_padding'] =    '15';

    }

    // TODO
    public function setButtonBackground(string $value)
    {
        $this->styles['button_background'] = HtmlBuilder::validateColor($value);
    }

    // TODO
    public function setButtonColor(string $value)
    {
        $this->styles['button_color'] = HtmlBuilder::validateColor($value);
    }

     // TODO
    public function setButtonPadding(string $value)
    {
        $this->styles['button_padding'] = $value;
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
        $html  = $this->getBuilder()->getHtmlComment('ROW BUTTON ' . ' //', $indent);

        $html .= $indent . '<tr>'.PHP_EOL;
        $html .= $indent . '  <td align="center" valign="top">'.PHP_EOL;

        $html .= $this->getBuilder()->getHtmlComment('CENTERING TABLE //', $indent . '    ');

        $html .= $indent . '    <table border="0" cellpadding="0" cellspacing="0" width="100%">'.PHP_EOL;
        $html .= $indent . '      <tr '. $this->getRowStyle() .'>'.PHP_EOL;
        $html .= $indent . '        <td align="center" valign="top">'.PHP_EOL;

        $html .= $this->getBuilder()->getHtmlComment('FLEXIBLE CONTAINER //', $indent . '          ');

        $html .= $indent . '          <table border="0" cellpadding="' . $this->cellPadding. 
                                          '" cellspacing="0" width="'. $this->getBuilder()->emailBodyWidth() . 
                                          '" class="flexibleContainer">'.PHP_EOL;

        $html .= $indent . '            <tr>'.PHP_EOL;
        $html .= $indent . '              <td '. $this->getRowStyle() .
                                              ' align="center" valign="top" width="'. $this->getBuilder()->emailBodyWidth() . 
                                              '" class="flexibleContainerCell">'.PHP_EOL;

        $html .= $this->getBuilder()->getHtmlComment('CONTENT TABLE //', $indent . '               ');
        
        $html .= $indent . '                <table border="0" cellpadding="0" cellspacing="0" width="50%"'.
                                                 ' class="emailButton" style="background-color: '. 
                                                        $this->getEffectiveStyle('background-color') . ';">'.PHP_EOL;
        
        $html .= $indent . '                  <tr>'.PHP_EOL;
        $html .= $indent . '                    <td align="center" valign="middle" class="buttonContent" cellpadding="0" '.
                                                    'bgcolor="'.$this->getEffectiveStyle('button_background').'"'.
                                                    'style="'.
                                                    'padding-top:'    . $this->getEffectiveStyle('button_padding'). 'px;'.  
                                                    'padding-bottom:' . $this->getEffectiveStyle('button_padding'). 'px;'.  
                                                    'padding-left:'   . $this->getEffectiveStyle('button_padding'). 'px;'.  
                                                    'padding-right:'  . $this->getEffectiveStyle('button_padding'). 'px;'.  
                                                    '"'.
                                                '>'.PHP_EOL;
        $html .= $indent . '                      <a style="color:'. $this->getEffectiveStyle('button_color') .
                                                   ';text-decoration:none;font-family:' . $this->getEffectiveStyle('font') .
                                                   ';font-size:20px;line-height:135%;" ' .
                                                   'href="' . $this->buttonSrc . '" target="_blank">' .
                                                   $this->buttonText .
                                                  '</a>'.PHP_EOL;
                                                  
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

        $html .= $this->getBuilder()->getHtmlComment('// ' . 'ROW BUTTON', $indent);
        return $html;
    }
    
}