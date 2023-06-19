<?php

declare(strict_types=1);

namespace app\modules\shop;

use yii\base\BootstrapInterface;
use Yiisoft\EventDispatcher\Dispatcher\Dispatcher;
use Yiisoft\EventDispatcher\Provider\Provider;
use Yiisoft\EventDispatcher\Provider\ListenerCollection;
use Yiisoft\Yii\Event\ListenerCollectionFactory as Factory;

class Bootstrap implements BootstrapInterface
{

    public function bootstrap($app)
    {
        $container = \Yii::$container;

//        /** @var \Yiisoft\Config\Config $config */
//        $container->setSingletons([
//            ListenerCollection::class => static fn (Factory $factory) => $factory->create([
//                "111" => "22222222"
//            ]),
//        ]);

//        $listeners = (new \Yiisoft\EventDispatcher\Provider\ListenerCollection())
//            ->add();
//
//
//        $provider = new Provider($listeners);
//        $dispatcher = new Dispatcher($provider);
//
//        dd('43333333335');
    }
}