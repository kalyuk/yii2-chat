<?php

namespace app\views;


use yii\web\AssetBundle;

class TemplateAsset extends AssetBundle
{

    public $sourcePath = '@app/views/assets';
    public $css = [
        'bower_components/bootstrap/dist/css/bootstrap.css',
        'bower_components/angular-loading-bar/build/loading-bar.min.css',
        'bower_components/angular-flash-alert/dist/angular-flash.css',
    ];

    public $js = [
        'bower_components/angular/angular.js',
        'bower_components/angular-bootstrap/ui-bootstrap.min.js',
        'bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js',
        'bower_components/angular-resource/angular-resource.min.js',
        'bower_components/angular-route/angular-route.min.js',
        'bower_components/angular-cookie/angular-cookie.min.js',
        'bower_components/angular-loading-bar/build/loading-bar.min.js',
        'bower_components/angular-flash-alert/dist/angular-flash.js',
        'javascript/application.js'
    ];

}