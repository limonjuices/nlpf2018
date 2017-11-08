<?php

namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;

/**
 * Class TouboulPlayer
 * @package Hackathon\PlayerIA
 * @author Robin
 *
 */
class TouboulPlayer extends Player
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
        $round = $this->result->getNbRound();
        $choice = parent::scissorsChoice();   
        if ( $round%2 == 0 )
        {

          if ($this->result->getLastScoreFor($this->opponentSide) === 5 && $this->result->getChoicesFor($this->opponentSide) === 'rock')
              $choice = parent::paperChoice();
          if ($this->result->getLastScoreFor($this->opponentSide) === 5 && $this->result->getChoicesFor($this->opponentSide) === 'paper')
              $choice = parent::scissorsChoice();
          if ($this->result->getLastScoreFor($this->opponentSide) === 5 && $this->result->getChoicesFor($this->opponentSide) === 'scissors')
              $choice = parent::rockChoice();
          if ($this->result->getLastChoiceFor($this->mySide) === 'rock' && $this->result->getLastScoreFor($this->mySide) === 0)
              $choice = parent::paperChoice();
          if ($this->result->getLastChoiceFor($this->mySide) === 'paper' && $this->result->getLastScoreFor($this->mySide) === 0)
              $choice = parent::scissorsChoice();
          if ($this->result->getLastChoiceFor($this->mySide) === 'scissors' && $this->result->getLastScoreFor($this->mySide) === 0)
              $choice = parent::rockChoice();

        }
        else
        {
            $r = mt_rand(1,3);
            if ( $r == 1)
              $choice = parent::rockChoice();
            if ( $r == 2 )
              $choice = parent::paperChoice();
            if ( $r == 3 )
              $choice = parent::scissorsChoice();
        }

        return $choice;
    }
};
