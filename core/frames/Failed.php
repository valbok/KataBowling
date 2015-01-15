<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2015 VaL::bOK
 * @package KataBowling
 */

namespace Bowling\Frame;

/**
 * If in two tries, a user fails to knock all pins down.
 */
class Failed extends Frame {
    /**
     * @param int Count of knocked down pins in first try.
     * @param int Count of knocked down pins in second try. 
     */
    function __construct($first, $second) {
        parent::__construct($first, $second);
    }
}
