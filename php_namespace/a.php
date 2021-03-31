<?php
namespace Foo;

include 'b.php';

const FOO = 1;

echo "Foo\FOO: " . FOO . PHP_EOL;
echo "\Foo\Bar\FOO: " . \Foo\Bar\FOO . PHP_EOL;
echo "Bar\FOO: " . Bar\FOO . PHP_EOL;
