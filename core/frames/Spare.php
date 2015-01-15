<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2015 VaL::bOK
 * @package KataBowling
 */

namespace Bowling\Frame;

/**
 * If in two tries user knocks pins all down, 
 * this is called a "spare".
 */
class Spare extends Frame {

    /** 
     * @param int Number of knocked down pins in first try.
     */
    function __construct($first) {
        parent::__construct($first, self::PINS_NUM - $first);
    }
}