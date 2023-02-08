<?php

namespace sdelfi\datatables;

use yii\web\AssetBundle;

/**
 * Asset for the DataTables Buttons plugin
 */
class DataTablesButtonsAsset extends AssetBundle
{
    public $sourcePath = '@bower/datatables.net-buttons';

    public $js = [
        "js/buttons.print.min.js",
        "js/buttons.html5.min.js",
        "js/buttons.flash.min.js",
        "js/buttons.colVis.min.js",
        "js/dataTables.buttons.min.js",
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'sdelfi\datatables\DataTablesAsset',
    ];
}