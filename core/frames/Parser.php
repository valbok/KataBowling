<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2015 VaL::bOK
 * @package KataBowling
 */

namespace Bowling\Frame;

/** Parser to extract Frame objects from encoded string of rolls. */
class Parser {

    /** 
     * If on first try in the frame a user knocks down all the pins, 
     * this is called a "strike". 
     */
    const STRIKE = 'X';

    /** 
     * If in two tries a user knocks them all down, 
     * this is called a "spare".
     */
    const SPARE = '/';

    /**
     * @param string Encoded rolls.
     * @return Frame[]
     */
    static function frames($rolls) {
        $result = array();
        $first = $second = false;

        for ($i = 0; $i < strlen($rolls); $i++) {
            switch ($rolls[$i]) {
                case self::STRIKE:  {
                    $result[] = new Strike();
                } break;

                case self::SPARE: {
                    $result[] = new Spare($first);
                    $first = $second = false;
                } break;

                default: {
                    if ($first === false) {
                        $first = $rolls[$i];
                    } else {
                        $second = $rolls[$i];
                    }

                    // If both tries are already made and still failed to knock all pins down.
                    if ($first !== false and $second !== false) {
                        $result[] = new Failed($first, $second);
                        $first = $second = false;
                    }
                } break;
            }
        }

        // If first try made but second one remains.
        // For example due to previous Spare.
        if ($first and $second === false)
        {
            $result[] = new Failed($first, 0);
        }

        return $result;
    }
}