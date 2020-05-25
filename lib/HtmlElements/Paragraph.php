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

/**
 * Represents a break line, ie <br> 
 */
class Paragraph extends \Kristuff\Phtemail\Core\MixedElement
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
        parent::__construct('p', $content, $styles);
        $this->mandatoryStyles = array(
            'color',   
            'font-family',
            'font-size',
           // 'font-weight',
           // 'line-height',
        );
    }

}