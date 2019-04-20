<?php

/**
 * Avoid conditionals
 *
 * This seems like an impossible task. Upon first hearing this, most people say, "how am I supposed to do anything
 * without an if statement?" The answer is that you can use polymorphism to achieve the same task in many cases.
 * The second question is usually, "well that's great but why would I want to do that?" The answer is a previous
 * clean code concept we learned: a function should only do one thing. When you have classes and functions that have
 * if statements, you are telling your user that your function does more than one thing. Remember, just do one thing.
 */

# Bad.
class Airplane
{
    // ...

    public function getCruisingAltitude(): int
    {
        switch ($this->type) {
            case '777':
                return $this->getMaxAltitude() - $this->getPassengerCount();
            case 'Air Force One':
                return $this->getMaxAltitude();
            case 'Cessna':
                return $this->getMaxAltitude() - $this->getFuelExpenditure();
        }
    }
}


# Good.
interface Airplane
{
    // ...

    public function getCruisingAltitude(): int;
}

class Boeing777 implements Airplane
{
    // ...


    public function getCruisingAltitude(): int
    {
        return $this->getMaxAltitude() - $this->getPassengerCount();
    }
}

class AirForceOne implements Airplane
{
    // ...

    public function getCruisingAltitude(): int
    {
        return $this->getMaxAltitude();
    }
}

class Cessna implements Airplane
{
    // ...

    public function getCruisingAltitude(): int
    {
        return $this->getMaxAltitude() - $this->getFuelExpenditure();
    }
}