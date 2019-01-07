<?php

declare(strict_types=1);

/**
 * Class Resolver
 */
class Resolver
{
    /**
     * @param string $bracketString
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function isCorrect(string $bracketString): bool
    {
        $counter = 0;

        foreach (str_split($bracketString) as $i => $char) {
            switch ($char) {
                case '(':
                    $counter++;
                    break;
                case ')':
                    $counter--;
                    break;
                case "\n":
                case "\t":
                case "\r":
                    break;
                default:
                    throw new \InvalidArgumentException('Строка содержит неверный символ ' . $char . ' на позиции ' . $i);
            }

            if ($counter < 0) {
                return false;
            }
        }

        if ($counter === 0) {
            return true;
        } else {
            return false;
        }
    }
}