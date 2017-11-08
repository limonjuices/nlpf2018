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
        return $choice;
    }
};
