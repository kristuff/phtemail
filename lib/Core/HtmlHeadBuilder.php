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
 *  Extends the HtmlBuilder with html head helper functions
 */
abstract class HtmlHeadBuilder extends HtmlBuilder
{
    /** 
     * Gets html meta tags as string
     * 
     * @access protected
     * @return string 
     */
    protected function getMeta()
    {
        $html  = '  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />'.PHP_EOL;
        $html .= '  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">'.PHP_EOL;
        $html .= '  <meta name="viewport" content="width=device-width, initial-scale=1.0">'.PHP_EOL;
        $html .= $this->getHtmlComment('Disable auto telephone linking in iOS', '  ');
        $html .= '  <meta name="format-detection" content="telephone=no" />'.PHP_EOL;
        
        // done
        return $html;
    }

    /** 
     * Gets html title tag as string
     * 
     * @access protected
     * @param string  $title      The email meta title
     *  
     * @return string 
     */
    protected static function getTitle(string $title)
    {
        return '  <title>' . $title . '</title>'  . PHP_EOL;
    }

    /** 
     * Gets the html styles as string
     * 
     * @access protected
     * @param bool  $renderComments      True to render html comments. Default is false. 
     *  
     * @return string 
     */
    protected function getStyles()
    {
        // start style tag
        $html  = '  <style type="text/css">'.PHP_EOL;
        $html .= PHP_EOL;

        // -- reset styles ----------------------------------------
        $html .= $this->getCssComment('--- RESET STYLES ---', '    ');
        $html .= '    html { background-color:'. $this->mainBackgroundColor . '; margin:0; padding:0; }'.PHP_EOL;
        $html .= '    body, #bodyTable, #bodyCell, #bodyCell{height:100% !important; margin:0; padding:0;';
        $html .= '    width:100% !important; font-family:'. $this->emailBodyFont .';}'.PHP_EOL;
        $html .= '    table{border-collapse:collapse;}'.PHP_EOL;
        $html .= '    table[id=bodyTable] {width:100%!important;margin:auto;max-width:500px!important; color:'. $this->emailBodyColor . ';font-weight:normal;}'.PHP_EOL; 
        $html .= '    img, a img{border:0; outline:none; text-decoration:none;height:auto; line-height:100%;}'.PHP_EOL;
        $html .= '    a {text-decoration:none !important;border-bottom: 1px solid;}'.PHP_EOL;
        
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!    
        //       todo custom COLOR !!!!!!!!!!!!!! font size ? line height ? margin ? see 
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! 
        $html .= '    h1, h2, h3, h4, h5, h6 {color:#5F5F5F; font-weight:normal; font-family:'. $this->emailBodyFont .';'.PHP_EOL;
        $html .= '     font-size:20px; line-height:125%; text-align:Left; letter-spacing:normal;'.PHP_EOL;
        $html .= '     margin-top:0;margin-right:0;margin-bottom:10px;margin-left:0;'.PHP_EOL;
        $html .= '     padding-top:0;padding-bottom:0;padding-left:0;padding-right:0;}'.PHP_EOL;
        // custom    
        $html .= '    p {margin-top:0;margin-right:0;margin-bottom:10px;margin-left:0;';
        $html .=        'padding-top:0;padding-bottom:0;padding-left:0;padding-right:0;}'.PHP_EOL;
        $html .= '    p + p {margin-top:10px;}'.PHP_EOL;
        $html .= PHP_EOL;

        // -- client specific styles -------------------------------------------
        $html .= $this->getCssComment('--- CLIENT-SPECIFIC STYLES ---', '    ');
        $html .= '    .ReadMsgBody{width:100%;} .ExternalClass{width:100%;}'. $this->getCssComment(' Force Hotmail/Outlook.com to display emails at full width.');
        $html .= '    .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height:100%;}' . $this->getCssComment(' Force Hotmail/Outlook.com to display line heights normally.');
        $html .= '    table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;}' . $this->getCssComment(' Remove spacing between tables in Outlook 2007 and up.');
        $html .= '    #outlook a{padding:0;}'. $this->getCssComment(' Force Outlook 2007 and up to provide a "view in browser" message.');
        $html .= '    img{-ms-interpolation-mode: bicubic;display:block;outline:none; text-decoration:none;}'. $this->getCssComment(' Force IE to smoothly render resized images.');
        $html .= '    body, table, td, p, a, li, blockquote{-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%; font-weight:normal!important;}'. $this->getCssComment(' Prevent Windows- and Webkit-based mobile platforms from changing declared text sizes. ');
        $html .= '    .ExternalClass td[class="ecxflexibleContainerBox"] h3 {padding-top: 10px !important;} '. $this->getCssComment(' Force hotmail to push 2-grid sub headers down');
        $html .= PHP_EOL;

        // -- our styles --------------------------------------------------------
        $html .= $this->getCssComment('--- FRAMEWORK HACKS & OVERRIDES ---', '    ');
        
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!    
        //       todo custom font size ? line height ? colors ..
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!#3497D9!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! 
        $html .= '    h1{display:block;font-size:32px;font-style:normal;font-weight:200!important;line-height:100%;}'.PHP_EOL;
        $html .= '    h2{display:block;font-size:27px;font-style:normal;font-weight:200!important;line-height:120%;}'.PHP_EOL;
        $html .= '    h3{display:block;font-size:24px;font-style:normal;font-weight:200!important;line-height:110%;}'.PHP_EOL;
        $html .= '    h4{display:block;font-size:22px;font-style:normal;font-weight:200!important;line-height:100%;}'.PHP_EOL;
        $html .= '    h5{display:block;font-size:20px;font-style:normal;font-weight:200!important;line-height:110%;}'.PHP_EOL;
        $html .= '    h6{display:block;font-size:18px;font-style:normal;font-weight:200!important;line-height:110%;}'.PHP_EOL;
   
        $html .= '    .flexibleImage{height:auto;}'.PHP_EOL;
        $html .= '    .linkRemoveBorder{border-bottom:0 !important;}'.PHP_EOL;
        $html .= '    table[class=flexibleContainerCellDivider] {padding-bottom:0 !important;padding-top:0 !important;}'.PHP_EOL;

        $html .= '    body, #bodyTable{background-color:'. $this->mainBackgroundColor       . ';}'.PHP_EOL;
        $html .= '    #emailHeader{background-color:'    . $this->mainBackgroundColor       . ';}'.PHP_EOL;
        $html .= '    #emailBody{background-color:'      . $this->emailBodyBackgroundColor  . ';}'.PHP_EOL;
        $html .= '    #emailFooter{background-color:'    . $this->mainBackgroundColor       . ';}'.PHP_EOL;
        $html .= '    .emailButton{background-color:#3497D9; border-collapse:separate;}'.PHP_EOL;
        $html .= '    .buttonContent{color:#FFFFFF; font-family:Helvetica; font-size:18px; font-weight:200; line-height:100%; padding:15px; text-align:center;}'.PHP_EOL;
        $html .= '    .buttonContent a{color:#FFFFFF; display:block; text-decoration:none!important; border:0!important;}'.PHP_EOL;
        $html .= PHP_EOL;
                    

        // -------------------------------------------------------------
        // -- mobiles styles -------------------------------------------
        // -------------------------------------------------------------
        $html .= $this->getCssComment('--- MOBILE STYLES ---', '    ');
        $html .= '    @media only screen and (max-width: '. strval($this->emailBodyWidth - 20) . 'px) {'.PHP_EOL;
        $html .= PHP_EOL;

        // -- client specific styles -------------------------------------------
        $html .= $this->getCssComment('--- CLIENT-SPECIFIC STYLES ---', '      ');
        $html .= '      body{width:100% !important; min-width:100% !important;}'. $this->getCssComment(' Force iOS Mail to render the email at full width.');
        $html .= PHP_EOL;

        //todo

        $html .= $this->getCssComment('--- FRAMEWORK STYLES ---', '      ');
        $html .= '      table[id="emailHeader"],'.PHP_EOL;
        $html .= '      table[id="emailBody"],'.PHP_EOL;
        $html .= '      table[id="emailFooter"],'.PHP_EOL;
        $html .= '      table[class="flexibleContainer"],'.PHP_EOL;
        $html .= '      td[class="flexibleContainerCell"] {width:100% !important;}'.PHP_EOL;
        $html .= '      td[class="flexibleContainerBox"], '.PHP_EOL;
        $html .= '      td[class="flexibleContainerBox"] table {display: block;width: 100%;text-align: left;}'.PHP_EOL;

        //todo

        $html .= $this->getCssComment('The following style rule makes any image classed with \'flexibleImage\'fluid' . PHP_EOL
                                    . '      when the query activates. Make sure you add an inline max-width to those '. PHP_EOL
                                    . '      to prevent them from blowing out.', '      ');
                    
        $html .= '      td[class="imageContent"] img {height:auto !important; width:100% !important; max-width:100% !important; }'. PHP_EOL;
        $html .= '      img[class="flexibleImage"]{height:auto !important; width:100% !important;max-width:100% !important;}'. PHP_EOL;
        $html .= '      img[class="flexibleImageSmall"]{height:auto !important; width:auto !important;}'. PHP_EOL;
        
        $html .= $this->getCssComment('Create top space for every second element in a block', '      ');
        $html .= '      table[class="flexibleContainerBoxNext"]{padding-top: 10px !important;}'. PHP_EOL;
        
        $html .= $this->getCssComment('Make buttons in the email span the full width of their container, allowing'
                                    . 'for left- or right-handed ease of use.', '      ');

        $html .= '      table[class="emailButton"]{width:100% !important;}'. PHP_EOL;
        $html .= '      td[class="buttonContent"]{padding:0 !important;}'. PHP_EOL;
        $html .= '      td[class="buttonContent"] a{padding:15px !important;}'. PHP_EOL;
        $html .= '    }'.PHP_EOL;

        //todo more ... 

        // close style tag
        $html  .= '    </style>'.PHP_EOL;

        // ------- conditional formatting for outlook --------------------
        $html .= $this->getHtmlComment('Outlook Conditional CSS. ' . PHP_EOL
                   . '      These two style blocks target Outlook 2007 & 2010 specifically, forcing' . PHP_EOL
                   . '      columns into a single vertical stack as on mobile clients. This is' . PHP_EOL
                   . '      primarily done to avoid the \'page break bug\' and is optional.' . PHP_EOL
                   . '      More information here: https://templates.mailchimp.com/development/css/outlook-conditional-css' . PHP_EOL
                   . '   ','    ');

        $html .= '    <!--[if mso 12]>'.PHP_EOL;
        $html .= '    <style type="text/css">'.PHP_EOL;
        $html .= '        .flexibleContainer{display:block !important; width:100% !important;}'.PHP_EOL;
        $html .= '    </style>'.PHP_EOL;
        $html .= '    <![endif]-->'.PHP_EOL;
        $html .= '    <!--[if mso 14]>'.PHP_EOL;
        $html .= '    <style type="text/css">'.PHP_EOL;
        $html .= '        .flexibleContainer{display:block !important; width:100% !important;}'.PHP_EOL;
        $html .= '    </style>'.PHP_EOL;
        $html .= '    <![endif]-->'.PHP_EOL;

        // done
        return $html;
    }

    /**
     * Get a formatted CSS comment for given string if $renderCssComments is true,
     * otherwise an empty string or just a break line
     * 
     * @access public
     * @param string    $text       The comment text
     * @param string   [$indent]    The indentation before comment. Default is an empty string
     * @param bool     [$breakLine] True to add a break line (ie: PHP_EOL) after comment. Default is true
     * 
     * @return string   
     */
    protected function getCssComment(string $text, string $indent = '', bool $breakLine = true)
    {
        return $this->renderCssComments ? $indent . '/* ' . $text . ' */' . ($breakLine ? PHP_EOL : '') : ($breakLine ? PHP_EOL : '');
    }
}