<?php
/**
 * @copyright Federico Nicolás Motta
 * @author Federico Nicolás Motta <fedemotta@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php The MIT License (MIT)
 * @package yii2-widget-datatables
 */

namespace sdelfi\datatables;

use yii\web\AssetBundle;

/**
 * Asset for the DataTables Bootstrap JQuery plugin
 * @author Federico Nicolás Motta <fedemotta@gmail.com>
 */
class DataTablesBootstrapAsset extends AssetBundle
{
    public $sourcePath = '@bower/datatables.net-bs4';

    public $css = [
        "css/dataTables.bootstrap4.min.css",
    ];

    public $js = [
        "js/dataTables.bootstrap4.min.js",
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'sdelfi\datatables\DataTablesAsset',
    ];
}