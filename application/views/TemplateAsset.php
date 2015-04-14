<?php
/**
 * Created by DOK It-group LLC.
 * User: Dmitry Kalyuk
 * Date: 30.01.15
 * Time: 17:00
 **/

namespace templates\t0\t0\t1;


use yii\web\AssetBundle;

class TemplateAsset extends AssetBundle
{

    public $sourcePath = '@templateData/assets';
    public $css = [
        'bower_components/bootstrap/dist/css/bootstrap.css',
        'bower_components/angular-flash-alert/dist/angular-flash.css',
        'bower_components/angular-loading-bar/build/loading-bar.min.css',
        'css/app.css',
        'css/font-awesome.min.css',
        'css/animate.css',
        'css/main.css'
    ];

    public $js = [
        'bower_components/angular/angular.js',
        'bower_components/angular-ui-router/release/angular-ui-router.min.js',
        'bower_components/angular-bootstrap/ui-bootstrap.min.js',
        'bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js',
        'bower_components/angular-resource/angular-resource.min.js',
        'bower_components/angular-translate/angular-translate.min.js',
        'bower_components/angular-messages/angular-messages.min.js',
        'bower_components/angular-translate/angular-translate.min.js',
        'bower_components/angular-cache/dist/angular-cache.min.js',
        'bower_components/angular-flash-alert/dist/angular-flash.js',
        'bower_components/angular-loading-bar/build/loading-bar.min.js',
        'javascript/application.js'
    ];

}