<?php

namespace Core\Cache;

use Core\Cache\Exceptions\InvalidCacheArgumentException;

/**
 * Class CacheDriver
 * @package Core\Cache
 */
class CacheDriver implements CacheDriverInterface
{
    /**
     * @var CacheDriverInterface
     */
    protected $cacheDriver;

    /**
     * CacheDriver constructor.
     * @param CacheDriverInterface $cacheDriver
     */
    public function __construct(CacheDriverInterface $cacheDriver)
    {
        $this->cacheDriver = $cacheDriver;
    }

    /**
     * @inheritDoc
     */
    public function get(string $key, $default = null)
    {
        if (!$this->cacheDriver->has($key)) {
            return null;
        }

        return $this->cacheDriver->get($key);
    }

    /**
     * @inheritDoc
     */
    public function set(string $key, $value, $default = null, $ttl = null)
    {
        return $this->cacheDriver->set($key, $value, $ttl);
    }

    /**
     * @inheritDoc
     */
    public function delete(string $key)
    {
        if (!$this->has($key)) {
            return null;
        }

        return $this->cacheDriver->delete($key);
    }

    /**
     * @inheritDoc
     */
    public function update(string $key, $value)
    {
        if (!$this->has($key)) {
            return false;
        }

        $this->cacheDriver->update($key, $value);
    }

    /**
     * @inheritDoc
     */
    public function has(string $key)
    {
        return $this->cacheDriver->has($key);
    }

    /**
     * Checks the type of the provided TTL and if a value of \DateInterval type passed
     * then process its value
     * @param mixed $ttl
     *
     * @return int|null
     * @throws InvalidCacheArgumentException
     */
    protected function getTTL($ttl)
    {
        if ($ttl instanceof \DateInterval) {
            return (new \DateTime('now'))->add($ttl)->getTimeStamp() - time();
        } else {
            if (is_null($ttl) || is_int($ttl)) {
                return $ttl;
            }
        }
        throw new InvalidCacheArgumentException('Invalid Cache argument provided');
    }
}