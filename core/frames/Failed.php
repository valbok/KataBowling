<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2015 VaL::bOK
 * @package KataBowling
 */

namespace Bowling\Frame;

class Failed extends Frame {
    function __construct($first, $second) {
        parent::__construct($first, $second);
    }
}