<?php

declare(strict_types=1);

namespace AppTest;

require __DIR__ . '/../vendor/autoload.php';

\Tester\Environment::setup();

/**
 * @testCase
 */
class o2RouskaEncoderTest extends \Tester\TestCase
{

    public function dataProvider(): array
    {
        return [
            [608259497, 'dfmkF'],
            [0, 'aaaaa'],
            [916132831, 'ZZZZZ'],
        ];
    }
    public function dataProviderExtended(): array
    {
        return [
            [608259497, 'dfmkF12345'],
        ];
    }

    /**
     * @dataProvider dataProvider
     */
    public function testEncoder(int $decoded, string $encoded): void
    {
        \Tester\Assert::equal($encoded, \App\o2RouskaEncoder::encode($decoded));
    }

    /**
     * @dataProvider dataProvider
     */
    public function testDecoder(int $decoded, string $encoded): void
    {
        \Tester\Assert::equal($decoded, \App\o2RouskaEncoder::decode($encoded));
    }

    /**
     * @dataProvider dataProvider
     */
    public function testDecoderExtended(int $decoded, string $encoded): void
    {
        \Tester\Assert::equal($decoded, \App\o2RouskaEncoder::decode($encoded));
    }
}

(new o2RouskaEncoderTest())->run();
