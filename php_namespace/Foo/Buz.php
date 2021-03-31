<?php
namespace Foo;

class Buz
{
    public function __construct(string $name)
    {
        $this->name = $name . __NAMESPACE__;
    }

    public function getNamespace()
    {
        return $this->name;
    }
}