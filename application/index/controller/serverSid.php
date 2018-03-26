<?php
//载入ucpass类
require_once('lib/Ucpaas.class.php');

//初始化必填


//改accountsid为
//填写 开发者平台 自己的Account Sid
$options['accountsid']='f6ecfd41752ef3f5979e022617d682b6';
//填写自己的的Auth Token
$options['token']='4d7fc852aa33e8e8c5d783f7f32e6bbc';

//初始化 $options必填
$ucpass = new Ucpaas($options);