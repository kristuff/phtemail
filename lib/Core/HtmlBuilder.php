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
 * Base class for HtmlEmailBuilder
 * 
 */
abstract class HtmlBuilder
{
    //todo
    public const H_ALIGN_LEFT = 'left';
    public const H_ALIGN_RIGHT = 'right';
    public const H_ALIGN_CENTER = 'center';
    public const V_ALIGN_TOP = 'top';
    public const V_ALIGN_BOTTOM = 'bottom';
    public const V_ALIGN_CENTER = 'middle';
    /** 
     * Colors constants
     *
     * @access public
     */
    public const COLOR_WHITE            = '#FFFFFF' ; 
    public const COLOR_BLACK            = '#000000' ; 
    public const COLOR_BLUE             = '#2E7BA2' ; 
    public const COLOR_GREEN            = '#26A85C' ; 
    public const COLOR_ORANGE           = '#f26522' ; 
    public const COLOR_RED              = '#' ; 
    public const COLOR_YELLOW           = '#' ; 
    public const COLOR_MAGENTA          = '#' ; 
    public const COLOR_LIGHTGRAY        = '#' ; 
    public const COLOR_MEDIUMGRAY       = '#282828';
    public const COLOR_DARKGRAY         = '#1E1F22';

    public const COLOR_STATUS_ERROR     = '#' ; 
    public const COLOR_STATUS_SUCCESS   = '#' ; 
    public const COLOR_STATUS_WARNING   = '#' ; 
   
    /** 
     * Gets whether html comments are rendered when calling the calling the HtmlEmailBuilder::getHtml() method. 
     * Default is false. 
     *
     * @access protected
     * @var bool $renderHtmlComments
     */
    protected $renderHtmlComments = false;    

    /** 
     * Gets whether css comments are rendered when calling the calling the HtmlEmailBuilder::getHtml() method. 
     * Default is false. 
     *
     * @access protected
     * @var bool $renderCssComments
     */
    protected $renderCssComments = false;    
    
    /** 
     * Defines the email 'body' width in pixels
     * Default is 600
     * 
     * @access protected
     * @var int $emailBodyWidth
     */
    protected $emailBodyWidth = 600;

    /** 
     * Defines the main background color, outside the email body
     * 
     * @access protected
     * @var string $mainBackgroundColor
     */
    protected $mainBackgroundColor = "#ECECEC";

    /** 
     * Defines the main text color for the email body
     * 
     * @access protected
     * @var $emailBodyColor
     */
    protected $emailBodyColor = "#4A4A4A";

     /** 
     * Defines the main text color for the email body
     * 
     * @access protected
     * @var $emailBodyColor
     */
    protected $emailheaddingColor = "#7A7A7A";

     /** 
     * Defines the email body background color
     * Default is #FFFFFF white
     * 
     * @access protected
     * @var $emailBodyBackgroundColor
     */
    protected $emailBodyBackgroundColor = "#FFFFFF";
  
    /** 
     * Defines the primary fonts for our html email
     * Default is system fonts
     * 
     * @access protected
     * @var $fonts
     */
    protected $emailBodyFont = "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif";
  
    /** 
     * Define the 'body' font size in pixels
     * Default is 15
     * 
     * @access protected
     * @var $fontSize
     */
    protected $fontSize = 15;
    
    /** 
     * Defines the 'body' line height
     * Default is 1.6
     * 
     * @access protected
     * @var $lineHeight
     */
    protected $lineHeight = 1.6;
    
    /**
     * Validates whether a hexadecimal color value is syntactically correct.
     * The hexadecimal string to validate. May contain a leading '#'. We remove it as
     * our lib will put it. May use the shorthand notation (e.g., '123' for '112233').
     * 
     * @access public
     * @static
     * @param string    $color      The hexadecimal string to validate
     *
     * @return string   A valid hex color without a leading '#' 
     * @throws InvalidArgumentException   if the color is not a valid hex color
     */
    public static function validateColor(string $color)
    {    
        // Hash prefix is optional.
        $color = ltrim($color, '#');
        
        // Must be either RGB or RRGGBB.
        // Must be a valid hex value.
        $length = mb_strlen($color);

        if ( ($length === 3 || $length === 6 ) && ctype_xdigit($color) ) {
            // return prefixed uppercase hex color string
            return '#'. strtoupper($color);
        };

        // something was wrong
        throw new \InvalidArgumentException('Value passed was not a valid hex color. Value was [' . $color .']');
    }

    /**
     *   ************************************************
     *   **************** Public methods ****************
     *   ************************************************
     */

    /** 
     * Sets whether html comments are rendered when calling the HtmlEmailBuilder::getHtml() method. 
     * Default is false. This property must be set before calling the HtmlEmailBuilder::getHtml() method.
     * 
     *      $builder = new HtmlEmailBuilder();
     *      ...
     *      $builder->renderHtmlComments(true);
     *      $htmlContent =  $builder->getHtml(); 
     * 
     * @param bool      $value    True or false to render or not comments
     * @return void 
     */
    public function renderHtmlComments(bool $value)
    {
        $this->renderHtmlComments= $value;
    }

    /** 
     * Sets whether css comments are rendered when calling the HtmlEmailBuilder::getHtml() method. 
     * Default is false. This property must be set before calling the HtmlEmailBuilder::getHtml() method.
     * 
     *      $builder = new HtmlEmailBuilder();
     *      ...
     *      $builder->renderCssComments(true);
     *      $htmlContent =  $builder->getHtml(); 
     * 
     * @param bool      $value    True or false to render or not comments
     * @return void 
     */
    public function renderCssComments(bool $value)
    {
        $this->renderCssComments = $value;
    }
    
    /**
     * Get a formatted html comment for given string if $renderHtmlComments is true,
     * otherwise an empty string 
     * 
     * @access public
     * @param string    $text      The comment text
     * @param string    $indent    The indentation before comment. Default is empty string
     * 
     * @return string   
     */
    public function getHtmlComment(string $text, string $indent = '')
    {
        return $this->renderHtmlComments ? $indent . '<!-- ' . $text . ' -->' . PHP_EOL : '';
    }    

    /** 
     * Gets the main (ie: html tag) background color.
     *  
     * @access public 
     * @return string
     */
    public function backgroundColor()
    {
        return $this->mainBackgroundColor;
    }    

    /** 
     * Sets the main (ie: html tag) background color.
     *  
     * @access public 
     * @param string      $value    The body color
     * 
     * @return void
     * @throws InvalidArgumentException     if the color is not a valid hex color
     */
    public function setBackgroundColor(string $value)
    {
        $this->mainBackgroundColor = self::validateColor($value);
    }

    /** 
     * Gets the email body width in pixels
     *  
     * @access public 
     * @return int
     */
    public function emailBodyWidth()
    {
        return $this->emailBodyWidth;
    }

    /** 
     * Sets the email body width.
     *  
     * @access public 
     * @param int      $value    The email body width
     * 
     * @return void
     */
    public function setEmailBodyWidth(int $value)
    {
        //todo validate
        $this->emailBodyWidth = $value;
    }

    /** 
     * Gets the email body background color.
     *  
     * @access public 
     * @return string
     */
    public function emailBodyBackground()
    {
        return $this->emailBodyBackgroundColor;
    }

    /** 
     * Sets the 'body' background color.
     *  
     * @access public 
     * @param string      $value    The body color
     * 
     * @return void
     * @throws InvalidArgumentException     if the color is not a valid hex color
     */
    public function setEmailBodyBackgroundColor(string $value)
    {
        $this->emailBodyBackgroundColor = self::validateColor($value);
    }
    
    /** 
     * Gets the email body font
     *  
     * @access public 
     * @return string
     */
    public function emailBodyFont()
    {
        return $this->emailBodyFont;
    }

    /** 
     * Gets the email body font
     *  
     * @access public 
     * @return string
     */
    public function emailBodyColor()
    {
        return $this->emailBodyColor;
    }

    /** 
     * Sets the email body text color.
     *  
     * @access public 
     * @param string      $value    The body text color
     * 
     * @return void
     * @throws InvalidArgumentException     if the color is not a valid hex color
     */
    public function setEmailBodyColor(string $value)
    {
        $this->emailBodyColor = self::validateColor($value);
    }
}