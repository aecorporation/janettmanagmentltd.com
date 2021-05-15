<?php

namespace aeCorp\aec_utils\aec_factory;

interface ContainerInterface
{
    public function addDefinition(?array $definitonPath=[]) : ContainerInterface;
    public function set(string $key, $value) : ContainerInterface;
    public function get(string $key);
    public function has(string $key) : bool;
    public function getAllInstances(): array;
    public function getAllDefinitions(): array;
}
