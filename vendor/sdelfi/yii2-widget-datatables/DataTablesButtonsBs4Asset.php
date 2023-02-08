<?php

namespace sdelfi\datatables;

use yii\web\AssetBundle;

/**
 * Asset for the DataTables Buttons Bs4 plugin
 */
class DataTablesButtonsBs4Asset extends AssetBundle
{
    public $sourcePath = '@bower/datatables.net-buttons-bs4';

    public $js = [
        "js/buttons.bootstrap4.min.js",
    ];

    public $css = [
        "css/buttons.bootstrap4.min.css",
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'sdelfi\datatables\DataTablesAsset',
        'sdelfi\datatables\DataTablesButtonsAsset'
    ];
}