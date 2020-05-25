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

use Kristuff\Phtemail\Core\HtmlBuilderContainer;

/** 
 * Class EmailFooterContainer
 * The footer container element inside our HtmlEmailBuilder
 */
class EmailFooterContainer extends HtmlBuilderContainer
{
    /**
     * Constructor
     */
    public function __construct(HtmlEmailBuilder $parent)
    {
        parent::__construct($parent);
        
        // define some styles

        //$this->styles->set TODO ();
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
        return $this->getHtmlStructure($indent, 'EMAIL FOOTER', 'emailFooter', $this->getBuilder()->backgroundColor(), 30);
    }
}