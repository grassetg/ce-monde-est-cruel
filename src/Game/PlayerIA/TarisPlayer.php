<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class TarisPlayers
 * @package Hackathon\PlayerIA
 * @author Guillaume Grasset
 */
class TarisPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------
        $opponentChoices = $this->result->getChoicesFor($this->opponentSide);
        $roundNumber = $this->result->getNbRound();
        $char = $this->result->getStatsFor($this->opponentSide)["name"][0];

        if ($roundNumber == 0) {

            if (ord($char) % 3 == 0) {
                return parent::paperChoice();
            } elseif (ord($char) % 3 == 1) {
                return parent::rockChoice();
            } else {
                return parent::scissorsChoice();
            }
        } else {
            return $this->playOpposite($opponentChoices[0]);
            // return detectPattern($roundNumber, $opponentChoices);
        }
    }

    function playOpposite($choice)
    {
        if ($choice === 'scissors') {

            return parent::rockChoice();
        } elseif ($choice === 'paper') {

            return parent::scissorsChoice();
        } else {

            return parent::paperChoice();
        }
    }

}

;
