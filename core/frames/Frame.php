<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2015 VaL::bOK
 * @package KataBowling
 */

namespace Bowling\Frame;

/**
 * Abstract base class for a frame which contains 2 tries to knock pins.
 */
abstract class Frame {

    /** Number of possible pins in one line or frame. */
    const PINS_NUM = 10;

    /**
     * @param int Number of knocked down pins in first try.
     * @param int Number of knocked down pins in second try.
     */
    function __construct($first, $second) {
        $this->first = intval($first);
        $this->second = intval($second);
    }

    /**
     * @return int Score of the frame.
     */
    function score() {
        return $this->first + $this->second;
    }

    /** 
     * Number of knocked down pins in first try.
     * @var int
     */
    public $first;

    /** 
     * Number of knocked down pins in second try.
     * @var int
     */
    public $second;
}