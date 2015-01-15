<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2015 VaL::bOK
 * @package KataBowling
 */

namespace Bowling;

require 'autoload.php';

/** Test function to provide scores by roll lines. */
function score($rolls) {
    return (new Game(Frame\Parser::frames($rolls)))->score();
}

assert(90  == score('9-9-9-9-9-9-9-9-9-9-'));
assert(300 == score('XXXXXXXXXXXX'));
assert(150 == score('5/5/5/5/5/5/5/5/5/5/5'));
assert(103 == score('1-9/5-XX0-1/2-X4/8'));
assert(0   == score('0-0-0-0-0-0-0-0-0-0-'));
assert(20  == score('0-0-0-0-0-0-0-0-0-0/X'));
assert(20  == score('0-0-0-0-0-0-0-0-0-XX-'));
assert(30  == score('0-0-0-0-0-0-0-0-0-XXX'));
assert(1   == score('00000000000000000001'));
assert(116  == score('0123456789X98765432'));
