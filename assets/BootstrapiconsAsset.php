<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Asset bundle for Bootstrap Icons.
 */
class BootstrapIconsAsset extends AssetBundle
{
    public $sourcePath = '@vendor/twbs/bootstrap-icons/font';
    public $css = [
        'bootstrap-icons.css'
    ];
}