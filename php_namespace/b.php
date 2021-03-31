<?php
namespace Foo\Bar;

const FOO = 3;

echo "Foo\Bar\FOO: " . FOO . "<br>" . PHP_EOL;

function buz()
{
    return "buz: " . FOO . "<br>" . PHP_EOL;
}
