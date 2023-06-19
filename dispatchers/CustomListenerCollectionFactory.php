<?php

declare(strict_types=1);

namespace app\dispatchers;

use Yiisoft\EventDispatcher\Provider\ListenerCollection;
use Yiisoft\Injector\Injector;
use Yiisoft\Yii\Event\CallableFactory;
use Yiisoft\Yii\Event\InvalidEventConfigurationFormatException;

class CustomListenerCollectionFactory
{
//    private ListenerCollection $listenerCollection;
//
//    public function __construct(ListenerCollection $listenerCollection)
//    {
//        $this->listenerCollection = $listenerCollection;
//    }

    public function __construct(
        private Injector $injector,
        private CallableFactory $callableFactory,
    ) {
    }

    public function create(array $eventListeners): ListenerCollection
    {
        $listenerCollection = new ListenerCollection();

        foreach ($eventListeners as $eventName => $callable) {
            if (!is_string($eventName)) {
                throw new InvalidEventConfigurationFormatException(
                    'Incorrect event listener format. Format with event name must be used.'
                );
            }

            $listener =
                    /** @return mixed */
                    fn (object $event) => $this->injector->invoke(
                        $this->callableFactory->create($callable),
                        [$event]
                    );

            $listenerCollection = $listenerCollection->add($listener, $eventName);

//            if (!is_iterable($listeners)) {
//                $type = get_debug_type($listeners);
//
//                throw new InvalidEventConfigurationFormatException(
//                    "Event listeners for $eventName must be an iterable, $type given."
//                );
//            }
//
//            /** @var mixed */
//            foreach ($listeners as $callable) {
//                $listener =
//                    /** @return mixed */
//                    fn (object $event) => $this->injector->invoke(
//                        $this->callableFactory->create($callable),
//                        [$event]
//                    );
//                $listenerCollection = $listenerCollection->add($listener, $eventName);
//            }
        }

        return $listenerCollection;
    }
}