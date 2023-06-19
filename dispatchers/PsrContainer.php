<?php

declare(strict_types=1);

namespace app\dispatchers;

use Faker\Container\ContainerException;
use Psr\Container\ContainerInterface;
use yii\base\InvalidConfigException;
use yii\di\Container;

class PsrContainer implements ContainerInterface
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function get($id, array $params = [], array $config = [])
    {
        if (! $this->has($id)) {
            throw new \Exception(
                sprintf('Identifier "%s" is not known to the container.', $id)
            );
        }

        try {
            return $this->container->get($id, $params, $config);
        } catch (InvalidConfigException $e) {
            throw new ContainerException($e->getMessage());
        }
    }

    public function has($id): bool
    {
        return $this->container->has($id)
            || $this->container->hasSingleton($id)
            || class_exists($id);
    }
}