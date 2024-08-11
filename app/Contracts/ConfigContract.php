<?php

namespace App\Contracts;

use Illuminate\Support\Collection;


interface ConfigContract
{
    public function getConfig(string $key, mixed $default = null): mixed;
    public function setConfig(string $key, mixed $value): void;
    public function getConfigs(array $keys, mixed $default = null): array;
    public function has(string $key): bool;
    public function all(): Collection;
    public function forget(string $key): void;
    public function flush(): void;
}
