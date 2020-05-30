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
 * Class EmailFooterContainer
 * The top bottom container element inside the HtmlEmailBuilder
 */
class EmailFooterContainer extends \Kristuff\Phtemail\Core\HtmlBuilderContainer
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
        // make sure a color is set
        if (empty($this->styles['color'])){
            $this->setColor($this->getBuilder()->backsideColor());
        }
        
        return $this->getHtmlStructure($indent, 'EMAIL FOOTER', 'emailFooter', $this->getBuilder()->backsideBackgroundColor());
    }
}