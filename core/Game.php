<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2015 VaL::bOK
 * @package KataBowling
 */

namespace Bowling;

/** 
 * Main game entry point.
 */
class Game {

    /** 
     * Count of main frames in the game without additional rolls
     * that used when the user gets a spare or strike in the last (tenth) frame.
     */
    const FRAMES_NUM = 10;

    /**
     * @param Frame[]
     * @note It is supposed to get list of valid frames.
     * Game object is not responsible to parse rolls.
     */
    function __construct(array $frames) {
        $this->frames = $frames;
    }

    /**
     * Calculates the score of the game.
     * - If in two tries, the user fails to knock pins all down, 
     *   his score for that frame is the total number of pins knocked down in his two tries. 
     * - If in two tries he knocks them all down, this is called a "spare" 
     *   and his score for the frame is ten 
     *   plus the number of pins knocked down on his next throw (in his next turn). 
     * - If on his first try in the frame he knocks down all the pins, this is called a "strike". 
     *   His turn is over, and his score for the frame is ten 
     *   plus the simple total of the pins knocked down in his next two rolls. 
     * - If he gets a spare or strike in the last (tenth) frame, 
     *   the bowler gets to throw one or two more bonus balls, respectively. 
     *   These bonus throws are taken as part of the same turn. 
     *   If the bonus throws knock down all the pins, the process does not repeat: 
     *   the bonus throws are only used to calculate the score of the final frame. 
     *
     * @return int The game score is the total of all frame scores.
     */
    function score() {
        $result = 0;

        for ($i = 0; $i < self::FRAMES_NUM; $i++) {
            $frame = isset($this->frames[$i]) ? $this->frames[$i] : false;
            if (!$frame)
                break;

            $score = $frame->score();
            $nextFrame = isset($this->frames[$i + 1]) ? $this->frames[$i + 1] : false;
            
            if ($frame instanceof Frame\Strike) {
                $secondNext = $nextFrame->second;
                // Strike object always has 0 as second try. 
                // If a strike object is a next roll, need to get roll after the strike.
                if ($nextFrame instanceof Frame\Strike and 
                    isset($this->frames[$i + 2])) {
                    $secondNext = $this->frames[$i + 2]->first;                
                }

                $score += $nextFrame->first + $secondNext;
            } elseif ($frame instanceof Frame\Spare){                
                $score += $nextFrame->first;
            }

            $result += $score;
        }

        return $result;
    }

    /**
     * @var Frame[] 
     */
    private $frames;
}
