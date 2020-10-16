<?php

declare(strict_types=1);

namespace App;

class o2RouskaEncoder
{
    private const LETTERS = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    private const LENGTH = 5;

    public static function encode(int $decoded): string
    {
        $encoded = '';

        for ($i = 0; $i < self::LENGTH; $i++) {
            $pos = $decoded % 62;
            $encoded .= self::LETTERS[$pos];
            $decoded -= $pos;
            $decoded /= 62;
        }

        return $encoded;
    }

    public static function decode(string $encoded): int
    {
        $encoded = substr(strrev($encoded), -self::LENGTH);
        $result = 0;

        for ($i = 0, $len = strlen($encoded); $i < $len; $i++) {
            $result *= 62;
            $result += strpos(self::LETTERS, $encoded[$i]);
        }
        return (int)$result;
    }
}
