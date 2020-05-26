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
 * Class EmailHeaderContainer
 * The header container element inside our HtmlEmailBuilder
 */
class EmailHeaderContainer extends \Kristuff\Phtemail\Core\HtmlBuilderContainer
{
    /** 
     * Gets the HTML 
     *
     * @access public
     * @param string    $indent         The indentation to start with
     * 
     * @return string   The html string content
     */
    public function getHtml(string $indent)
    {
        // make sure a color is set
        if (empty($this->styles['color'])){
            $this->setColor($this->getBuilder()->backsideColor());
        }

        return $this->getHtmlStructure($indent, 'EMAIL HEADER', 'emailHeader', $this->getBuilder()->backsideBackgroundColor());
    }
}