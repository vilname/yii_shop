<?php

namespace app\modules\shop\controllers;

use app\modules\shop\Command\Default\Command;
use yii\web\Controller;

/**
 * Default controller for the `shop` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $handler = \Yii::$container->get(Command::class);
        $handler->handler();

        return $this->render('index');
    }
}
