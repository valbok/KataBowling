<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2015 VaL::bOK
 * @package KataBowling
 */

namespace Bowling\Frame;

/**
 * If on user's first try in the frame he knocks down all the pins, 
 * this is called a "strike". 
 */
class Strike extends Frame {

    function __construct() {
        parent::__construct(self::PINS_NUM, 0);
    }
}