<?php

namespace App\Supports;

use App\Contracts\ConfigContract;
use App\Models\Option;
use Illuminate\Cache\CacheManager;
use Illuminate\Container\Container;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class ConfigService implements ConfigContract
{
    protected array $configs = [];
    protected CacheManager $cache;

    public function __construct(Container $app)
    {
        $this->cache = $app['cache'];

        if (Schema::hasTable('options')) {
            $this->configs = $this->cache->store('file')->rememberForever(
                $this->getCacheKey(),
                function () {
                    return Option::get(['key', 'value'])->keyBy('key')->map(fn($option) => $option->value)->toArray();
                }
            );
        }
    }

    protected function getCacheKey(): string
    {
        return 'configs';
    }

    public function getConfig(string $key, mixed $default = null): mixed
    {
        return Arr::get($this->configs, $key, $default);
    }

    public function setConfig(string $key, mixed $value): void
    {
        $option = Option::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );

        $this->configs[$key] = $value;

        $this->cache->store('file')->forever($this->getCacheKey(), $this->configs);
    }

    public function getConfigs(array $keys, mixed $default = null): array
    {
        return Arr::only($this->configs, $keys);
    }

    public function has(string $key): bool
    {
        return Arr::has($this->configs, $key);
    }

    public function all(): Collection
    {
        return collect($this->configs);
    }

    public function forget(string $key): void
    {
        Option::where('key', $key)->delete();

        Arr::forget($this->configs, $key);

        $this->cache->store('file')->forever($this->getCacheKey(), $this->configs);
    }

    public function flush(): void
    {
        Option::truncate();

        $this->configs = [];

        $this->cache->store('file')->forget($this->getCacheKey());
    }
}
