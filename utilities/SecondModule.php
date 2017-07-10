<?php
namespace app\utilities;
use yii\base\Module;

class SecondModule extends Module
{
    public function init()
    {
        parent::init();
        $this->modules = [
            'thirdLevel' => [
                'class' => 'app\utilities\ThirdModule',
                'basePath' => '@app'
            ]
        ];
    }
}