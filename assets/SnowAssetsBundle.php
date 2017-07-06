<?php
namespace app\assets;

class SnowAssetsBundle extends \yii\web\AssetBundle
{
    public $sourcePath = '@app/assets/snow';
    public $css = ['snow.css'];
    public $depends = ['app\\assets\\ApplicationUiAssetBundle'];
}