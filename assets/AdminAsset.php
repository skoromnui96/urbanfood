<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 08.11.17
 * Time: 16:14
 */

namespace app\assets;
use yii\web\AssetBundle;


class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',

    ];
    public $js = [

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',

    ];

}