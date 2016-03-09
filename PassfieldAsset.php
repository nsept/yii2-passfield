<?php

namespace nsept\passfield;

use yii\web\AssetBundle;

class PassfieldAsset extends AssetBundle
{
    public $sourcePath = '@nsept/passfield/assets';

    public $js = [
        'passfield.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
