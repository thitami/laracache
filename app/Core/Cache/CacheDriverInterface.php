<?php

namespace Core\Cache;

/**
 * Interface CacheDriverInterface
 * @package Core\Cache
 */
interface CacheDriverInterface
{
    /**
     * Fetches a value from the cache.
     *
     * @param string $key The cache item key.
     * @param mixed|null $default The default value to return if the key is not present
     * @return mixed
     *
     * @throws \Core\Cache\Exceptions\InvalidArgumentException
     *   when the $key string is not a correct value.
     */
    public function get(string $key, $default=null);

    /**
     * Persists an item in the cache, based on a key and with an optional
     * Time To Live (TTL) time.
     *
     * @param string $key The cache item key.
     * @param mixed $value The value of the item to store.
     * @param mixed|null $default The default value to return if the key is not present
     * @param int|\DateInterval|null $ttl The TTL value of the cache item. If no value is sent and
     *  the driver supports TTL then the library or the driver set a default value.
     *
     * @return mixed
     *
     * @throws \Core\Cache\Exceptions\InvalidArgumentException
     *   when the $key string is not a correct value.
     */
    public function set(string $key, $value, $default=null, $ttl=null);

    /**
     * Deletes an item from the cache based on the key provided.
     *
     * @param string $key The cache item key.
     * @return mixed
     *
     * @throws \Core\Cache\Exceptions\InvalidArgumentException
     *   when the $key string is not a correct value.
     */
    public function delete(string $key);

    /**
     * Updates a cache item if already set.
     *
     * @param string $key The cache item key.
     * @param mixed $value The new value of the item to update.
     * @return mixed
     *
     * @throws \Core\Cache\Exceptions\InvalidArgumentException
     *   when the $key string is not a correct value.
     */
    public function update(string $key, $value);

    /**
     * Checks if an item exists in the cache.
     *
     * @param string $key The cache item key.
     * @return bool
     *
     * @throws \Core\Cache\Exceptions\InvalidArgumentException
     *   when the $key string is not a correct value.
     */
    public function has(string $key);

}