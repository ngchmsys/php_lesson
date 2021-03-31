<?php
namespace Foo;

class Bar
{
    public function __construct()
    {
        $this->name = __NAMESPACE__;
    }

    public function getNamespace()
    {
        return $this->name;
    }
}