<?php

namespace KeyValueConfig;

use KeyValueConfig\Repository\KeyValueConfigRepository;

class KeyValueConfig
{
    public function get(string $key)
    {
        return (new KeyValueConfigRepository())->get($key);
    }

    public function set(string $key, $value)
    {
        return (new KeyValueConfigRepository())->set($key, $value);
    }
}