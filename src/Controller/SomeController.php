<?php
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\Cache\TagAwareCacheInterface;

class SomeClass
{
    private $myCachePool;

    public function __construct(TagAwareCacheInterface $myCachePool)
    {
        $this->myCachePool = $myCachePool;
    }

    public function someMethod()
    {
        $value0 = $this->myCachePool->get('item_0', function (ItemInterface $item) {
            $item->tag(['foo', 'bar']);

            return 'debug';
        });

        $value1 = $this->myCachePool->get('item_1', function (ItemInterface $item) {
            $item->tag('foo');

            return 'debug';
        });

        // Remove all cache keys tagged with "bar"
        $this->myCachePool->invalidateTags(['bar']);
    }
}
