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

namespace Kristuff\Phtemail\HtmlElements;

/**
 * Class Heading4
 * Represents the h4 html element
 */
class Heading4 extends \Kristuff\Phtemail\Core\MixedElement
{
    /**
     * Constructor
     * 
     * @access public
     * @param string    $content        The element content
     * @param  array    $styles         The inline styles
     */
    public function __construct(string $content = '', array $styles = [])
    {
        parent::__construct('h4', $content, $styles);
    }
}