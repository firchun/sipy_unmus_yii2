<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        '<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">',
        '<link href="https://cdn.datatables.net/buttons/1.2.3/css/buttons.dataTables.min.css" rel="stylesheet">',


    ];
    public $js = [
        '<script src="//code.jquery.com/jquery-1.12.4.js"></script>',
        '<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>',
        '<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>',
        '<script src="https://cdn.datatables.net/buttons/1.2.3/js/dataTables.buttons.min.js"></script>',
        '<script src="//cdn.datatables.net/buttons/1.2.3/js/buttons.flash.min.js"></script>',
        '<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>',
        '<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>',
        '<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>',
        '<script src="//cdn.datatables.net/buttons/1.2.3/js/buttons.html5.min.js"></script>',
        '<script src="//cdn.datatables.net/buttons/1.2.3/js/buttons.print.min.js"></script>'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        'sdelfi\datatables\DataTablesAsset',

    ];
}
