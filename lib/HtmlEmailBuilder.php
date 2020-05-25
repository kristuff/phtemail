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

use Kristuff\Phtemail\Core\HtmlHeadBuilder;
use Kristuff\Phtemail\Core\StylizedElement;

/**  
 * Main class to build html email
 * Extends the HtmlHeadBuilder class that extends the HtmlBaseBuilder
 * 
 */
class HtmlEmailBuilder extends HtmlHeadBuilder
{
    /** 
     * The email meta title 
     * 
     * @access private
     * @var string  $emailTitle
     */
    private $emailTitle = '';

    /** 
     * The email body container 
     * 
     * @access private
     * @var EmailBodyContainer      $bodyContainer
     */
    private $bodyContainer = null;

    /** 
     * The main email header container 
     * 
     * @access private
     * @var EmailHeaderContainer    $headerContainer
     */
    private $headerContainer = null;

    /** 
     * The main email footer container
     * 
     * @access private
     * @var EmailFooterContainer    $footerContainer
     */
    private $footerContainer = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->headerContainer  = new EmailHeaderContainer($this);
        $this->bodyContainer    = new EmailBodyContainer($this);
        $this->footerContainer  = new EmailFooterContainer($this);

        // default styles
        $this->headerContainer->setAlign(self::H_ALIGN_CENTER);
        $this->footerContainer->setAlign(self::H_ALIGN_CENTER);
    }

    /** 
     * Sets the email title 
     * 
     * @access public 
     * @param string    $title      The email title in meta
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->emailTitle = $title;
    }

    /** 
     * Gets the email body container element
     * 
     * @access public 
     * @return EmailBodyContainer  
     */
    public function body()
    {
        return $this->bodyContainer;
    }
    
    /** 
     * Gets the email header container element
     * 
     * @access public 
     * @return EmailHeaderContainer
     */
    public function header()
    {
        return $this->headerContainer;
    }

    /** 
     * Gets the email footer container element
     * 
     * @access public 
     * @return EmailFooterContainer  
     */
    public function footer()
    {
        return $this->footerContainer;
    }

    /** 
     * Gets the html mail as string
     * 
     * @access public
     * @return string 
     */
    public function getHtml()
    {
        /** 
         * set doctype / open html tags
         * @see https://www.campaignmonitor.com/blog/email-marketing/2010/11/correct-doctype-to-use-in-html-email/
         */
        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' . PHP_EOL;
        $html .= '<html xmlns="http://www.w3.org/1999/xhtml">' . PHP_EOL;

        // head (css styles, meta, title)
        $html .= '<head>' . PHP_EOL;
        $html .= $this->getMeta();
        $html .= $this->getTitle($this->emailTitle);
        $html .= $this->getStyles();
        $html .= '</head>' . PHP_EOL;

        // start body (document body, not the email body...), center table
        $html .= '<body bgcolor="'. $this->mainBackgroundColor  .'" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">'. PHP_EOL;
        
        $html .= $this->getHtmlComment('CENTER THE EMAIL //', '  ');
        
        $html .= '  <center style="background-color:'. $this->mainBackgroundColor  .';">'. PHP_EOL;
        $html .= '    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;">'. PHP_EOL;
        $html .= '      <tr>'. PHP_EOL;
        $html .= '        <td align="center" valign="top" id="bodyCell">'. PHP_EOL;

        // render base elements collection
        $html .= $this->headerContainer->getHtml('          ');    
        $html .= $this->bodyContainer->getHtml('          ');    
        $html .= $this->footerContainer->getHtml('          ');    

        // close centered table
        $html .= '        </td>'. PHP_EOL;
        $html .= '      </tr>'. PHP_EOL;
        $html .= '    </table>'. PHP_EOL;
        $html .= $this->getHtmlComment('// CENTER THE EMAIL', '  ');
        $html .= '  </center>'. PHP_EOL;

        // close body and html tags and returns html
        $html .= '</body>' . PHP_EOL;
        $html .= '</html>';
        return $html;
    }
    
  

}