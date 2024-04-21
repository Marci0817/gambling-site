<?php

class BlackjackGame
{
    private bool $isOver = false;

    private string $bet;

    private array $deck = [];
    private array $dealerHand = [];
    private array $playerHand = [];

    public function __construct(string $bet)
    {
        $this->bet = $bet;

        $suits = ["c", "d", "h", "s"];

        foreach ($suits as $suit) {
            for ($i = 2; $i <= 14; $i++) {
                $this->deck[] = $i . $suit;
            }
        }

        shuffle($this->deck);

        $this->addPlayerCard();
        $this->addPlayerCard();
        $this->addDealerCard();
    }


    public function hit(): void
    {
        if ($this->isOver) {
            return;
        }

        $this->addPlayerCard();

        if ($this->getPlayerHandValue() >= 21) {
            $this->stand();
        }
    }

    public function stand(): void
    {
        if ($this->isOver) {
            return;
        }

        while ($this->getDealerHandValue() < 17) {
            $this->addDealerCard();
        }

        $this->isOver = true;
    }

    public function isOver(): bool
    {
        return $this->isOver;
    }

    public function getPlayerHand(): array
    {
        return $this->playerHand;
    }

    public function getPlayerHandValue(): int
    {
        return $this->getHandValue($this->playerHand);
    }

    public function getDealerHandValue(): int
    {
        return $this->getHandValue($this->dealerHand);
    }

    public function getDealerHand(): array
    {
        return $this->dealerHand;
    }

    public function getBet(): string
    {
        return $this->bet;
    }

    private function addPlayerCard(): void
    {
        $card = array_pop($this->deck);
        $this->playerHand[] = $card;
    }

    private function addDealerCard(): void
    {
        $card = array_pop($this->deck);
        $this->dealerHand[] = $card;
    }

    private function getHandValue(array $cards): int
    {
        $sum = 0;

        foreach ($cards as $card) {
            $val = intval(substr($card, 0, -1));
            if ($val == 14) {
                $sum += 11;
            } else if ($val > 10) {
                $sum += 10;
            } else {
                $sum += $val;
            }
        }

        return $sum;
    }
}
