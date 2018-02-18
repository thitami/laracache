<?php

namespace Core\Cache\Exceptions;


/**
 * Class InvalidArgumentException is used for invalid cache arguments.
 * When an invalid argument is passed it must throw an exception implementing this interface
 * @package Core\Cache\Exceptions
 */
interface InvalidArgumentException extends CacheException
{

}