<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/fonts.css',
        'libs/bootstrap/css/bootstrap.css',
        'css/font-awesome.min.css',
        'libs/animate/animate.min.css',
        'css/media.css',
        'css/style.css',
        'libs/slick/slick.css',
        'libs/slick/slick-theme.css',
    ];
    public $js = [
        'libs/jquery/jquery.min.js',
        'libs/bootstrap/js/bootstrap.bundle.min.js',
        'libs/slick/slick.min.js',
        'libs/jquery/jquery.maskedinput.min.js',
        'js/bucket.js',
        'js/common.js',
    ];
    
}
