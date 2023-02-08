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
 * Asset for the DataTables JQuery plugin
 * @author Federico Nicolás Motta <fedemotta@gmail.com>
 */
class DataTablesAsset extends AssetBundle
{
    public $sourcePath = '@bower/datatables.net';

    public $js = [
        "js/jquery.dataTables.min.js",
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}