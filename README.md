# 安装

```
composer require shopwwi/webman-validator
```
#说明
```
此为webman专用插件 原型为thinkphp验证包含TP验证所有内容 有些不明白的可查看TP验证文档
```
## 使用方法
### 验证器定义
```
//定义一个验证器
namespace app\validator;

use Shopwwi\WebmanValidator\Validator;

class User extends Validator
{
    protected $rule =   [
        'name'  => 'require|max:25',
        'age'   => 'number|between:1,120',
        'email' => 'email',    
    ];
    
    protected $message  =   [
        'name.require' => '名称必须',
        'name.max'     => '名称最多不能超过25个字符',
        'age.number'   => '年龄必须是数字',
        'age.between'  => '年龄只能在1-120之间',
        'email'        => '邮箱格式错误',    
    ];
}
//验证方法
<?php
namespace app\controller;

use app\validator\User;
use Shopwwi\WebmanValidator\ValidatorException;

class Index
{
    public function index()
    {
        try {
            Validator(User::class)->check([
                'name'  => 'webman',
                'email' => 'webman@qq.com',
            ]);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            dump($e->getError());
        }
    }
}

```
### 直接验证 batch()为批量验证

```
    $validator = Validator::rule([
        'name|手机/电话'=>'require',
        'password|密码'=>'require|min:6|max:18',
    ]);
    if(!$validator->batch()->check($request->all())){
        return json(['code'=>422,'error'=>$validete->getError()]);
    }
```

### 多语言设置 resource/translations/zh_CN/validator.php

```
return[
    'require'     => ':attribute 不能为空',
    'number'      => ':attribute 必须是数字',
    'integer'     => ':attribute 必须是整数',
    'float'       => ':attribute 必须是浮点数',
    'boolean'     => ':attribute 必须是布尔值',
    'email'       => ':attribute 格式不符',
    'array'       => ':attribute 必须是数组',
    'accepted'    => ':attribute 必须是yes、on或者1',
    'date'        => ':attribute 格式不符合',
    'file'        => ':attribute 不是有效的上传文件',
    'image'       => ':attribute 不是有效的图像文件',
    'alpha'       => ':attribute 只能是字母',
    'alphaNum'    => ':attribute 只能是字母和数字',
    'alphaDash'   => ':attribute 只能是字母、数字和下划线_及破折号-',
    'activeUrl'   => ':attribute 不是有效的域名或者IP',
    'chs'         => ':attribute 只能是汉字',
    'chsAlpha'    => ':attribute 只能是汉字、字母',
    'chsAlphaNum' => ':attribute 只能是汉字、字母和数字',
    'chsDash'     => ':attribute 只能是汉字、字母、数字和下划线_及破折号-',
    'url'         => ':attribute 不是有效的URL地址',
    'ip'          => ':attribute 不是有效的IP地址',
    'dateFormat'  => ':attribute 必须使用日期格式 :rule',
    'in'          => ':attribute 必须在 :rule 范围内',
    'notIn'       => ':attribute 不能在 :rule 范围内',
    'between'     => ':attribute 只能在 :1 - :2 之间',
    'notBetween'  => ':attribute 不能在 :1 - :2 之间',
    'length'      => ':attribute 长度不符合要求 :rule',
    'max'         => ':attribute 长度不能超过 :rule',
    'min'         => ':attribute 长度不能小于 :rule',
    'after'       => ':attribute 日期不能小于 :rule',
    'before'      => ':attribute 日期不能超过 :rule',
    'expire'      => '不在有效期内 :rule',
    'allowIp'     => '不允许的IP访问',
    'denyIp'      => '禁止的IP访问',
    'confirm'     => ':attribute 和确认字段 :2 不一致',
    'different'   => ':attribute 和比较字段 :2 不能相同',
    'egt'         => ':attribute 必须大于等于 :rule',
    'gt'          => ':attribute 必须大于 :rule',
    'elt'         => ':attribute 必须小于等于 :rule',
    'lt'          => ':attribute 必须小于 :rule',
    'eq'          => ':attribute 必须等于 :rule',
    'regex'       => ':attribute 不符合指定规则',
    'method'      => '无效的请求类型',
    'fileSize'    => '上传文件大小不符',
    'fileExt'     => '上传文件后缀不符',
    'fileMime'    => '上传文件类型不符',
];
```