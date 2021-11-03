<?php


namespace KeyValueConfig\Repository;


use Core\Database\DB;
use Core\Repository;

class KeyValueConfigRepository extends Repository
{

    public function defaultTable(): string
    {
        return "keyvalue_config";
    }

    public function get(string $key)
    {
        return json_decode(DB::get("SELECT value FROM keyvalue_config WHERE `key` = ?", [$key])[0]->value ?? "null");
    }

    public function set(string $key, $value)
    {
        DB::beginTransaction();
        DB::query("DELETE FROM keyvalue_config WHERE `key` = ?", [$key]);
        $this->insert(['key' => $key, 'value' => json_encode($value), 'stamp' => new \DateTime()]);
        DB::commit();
    }
}