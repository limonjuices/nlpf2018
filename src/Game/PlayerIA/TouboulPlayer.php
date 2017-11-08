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
        $round = $this->result->getNbRound();
        $choice = parent::scissorsChoice();
        
        if ($this->result->getLastChoiceFor($this->mySide) === 'scissors' && $this->result->getLastScoreFor($this->mySide) === 0)
            $choice = parent::rockChoice();
        if ($this->result->getLastChoiceFor($this->mySide) === 'scissors' && $this->result->getLastScoreFor($this->mySide) === 5)
            $choice = parent::paperChoice();
        if ($this->result->getLastChoiceFor($this->mySide) === 'scissors' && $this->result->getLastScoreFor($this->mySide) === 1)
            $choice = parent::scissorsChoice();



        if ($this->result->getLastChoiceFor($this->mySide) === 'rock' && $this->result->getLastScoreFor($this->mySide) === 0)
            $choice = parent::paperChoice();
        if ($this->result->getLastChoiceFor($this->mySide) === 'rock' && $this->result->getLastScoreFor($this->mySide) === 5)
            $choice = parent::scissorsChoice();
        if ($this->result->getLastChoiceFor($this->mySide) === 'rock' && $this->result->getLastScoreFor($this->mySide) === 1)
            $choice = parent::rockChoice();

        if ($this->result->getLastChoiceFor($this->mySide) === 'paper' && $this->result->getLastScoreFor($this->mySide) === 0)
            $choice = parent::scissorsChoice();
        if ($this->result->getLastChoiceFor($this->mySide) === 'paper' && $this->result->getLastScoreFor($this->mySide) === 5)
            $choice = parent::rockChoice();
        if ($this->result->getLastChoiceFor($this->mySide) === 'paper' && $this->result->getLastScoreFor($this->mySide) === 1)
            $choice = parent::paperChoice();

        if ( $round > 10 )
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
