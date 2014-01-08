<?php
namespace Mindplay\Annotation\Cache;

use \Mindplay\Annotation\Core\AnnotationException;
use \ReflectionClass;

class ApcCache implements CacheStorage
{
	/**
	 * Class constructor
	 *
	 * @throws AnnotationException
	 */
	public function __construct()
	{
		if (!extension_loaded('apc')) {
			throw new AnnotationException(
				'You must have APC extension in order to use the APC cache storage'
			);
		}
	}

	/**
	 * Returns if the identifier exists on the storage
	 *
	 * @param string $id
	 * @return boolean
	 */
	public function exists($id)
	{
		return apc_exists($id);
	}

	/**
	 * Stores the content
	 *
	 * @param string $id
	 * @param string $content
	 */
	public function store($id, $content)
	{
		if (apc_store($id, eval($content)) === false) {
			throw new AnnotationException(__METHOD__ . ' : error writing cache ' . $id);
		}
	}

	/**
	 * Retrieves the content
	 *
	 * @param string $id
	 * @return mixed
	 */
	public function get($id)
	{
		$content = apc_fetch($id);

		return $content;
	}

	/**
	 * Returns the last change time
	 *
	 * @param string $id
	 * @return int
	 */
	public function getLastChangeTime($id)
	{
		$info = apc_cache_info('user');

		foreach ($info['cache_list'] as $cache) {
			$key = 'info';
			if (!array_key_exists($key, $cache)) {
				$key = 'key';
			}
			if (array_key_exists($key, $cache) && $cache[$key] == $id) {
				return $cache['mtime'];
			}
			else {
				return 0;
			}
		}
	}

	/**
	 * Creates an ID for the storage from class name
	 *
	 * @param string $className
	 * @return string
	 */
	public function createId(ReflectionClass $class)
	{
		return $class->getName() . '-annotations';
	}
}

