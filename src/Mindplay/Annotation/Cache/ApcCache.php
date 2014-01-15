<?php

/**
 * ApcCache.php - cache de anotações usando APC/APCU
 */

namespace Mindplay\Annotation\Cache;

use \Mindplay\Annotation\Core\AnnotationException;
use \ReflectionClass;

/**
 * Implementação do cache de anotações usando APC/APCu
 */
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
        $contentToStore = eval($content);
        if (apc_store($id, $contentToStore) === false) {
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
        if (isset($info) && isset($info['cache_list'])) {
            $list = $info['cache_list'];
            foreach ($list as $cache) {
                $key = "";
                if (isset($cache['key'])) {
                    $key = $cache['key'];
                } elseif (isset($cache['info'])) {
                    $key = $cache['info'];
                }
                if ($key == $id) {
                    return $cache['mtime'];
                }
            }
        }
        return 0;
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
