<?php

declare(strict_types=1);

namespace app\bootstrap;

use app\dispatchers\CustomListenerCollectionFactory;
use app\dispatchers\DispatcherAdapter;
use app\dispatchers\PsrContainer;
use Psr\Container\ContainerInterface;
use yii\base\BootstrapInterface;
use yii\di\Container;
use Yiisoft\EventDispatcher\Dispatcher\Dispatcher;
use Yiisoft\EventDispatcher\Provider\ListenerCollection;
use Yiisoft\EventDispatcher\Provider\Provider;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {

        $container = \Yii::$container;

        $container->setSingletons([
            \app\dispatchers\ListenerCollectionFactory::class => function (Container $container) {
                $module = \Yii::$app->controller->module;
                $class = new \ReflectionClass($module);
                $filePath = dirname($class->getFileName()) . '/event.php';
                $eventsListeners = require_once $filePath;

                $listenersCollectionFactory = $container->get(CustomListenerCollectionFactory::class);
                return $listenersCollectionFactory->create($eventsListeners);
            },
            \Psr\EventDispatcher\EventDispatcherInterface::class => function (Container $container) {
                /** @var ListenerCollection $listeners */
                $listeners = $container->get(\app\dispatchers\ListenerCollectionFactory::class);
                $provider = new Provider($listeners);

                return new Dispatcher($provider);
            },

            \app\dispatchers\EventDispatcherInterface::class => function (Container $container) {
                return $container->get(DispatcherAdapter::class);
            },

            ContainerInterface::class => PsrContainer::class,
        ]);
    }
}