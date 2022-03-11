<?php

declare (strict_types = 1);
namespace Shopwwi\WebmanValidator\Facade;

/**
 * @see \Shopwwi\WebmanValidator\Validator
 * @mixin \Shopwwi\WebmanValidator\Validator
 * @method \Shopwwi\WebmanValidator\Validator rule(mixed $name, mixed $rule = '') static 添加字段验证规则
 * @method void extend(string $type, callable $callback = null, string $message='') static 注册扩展验证（类型）规则
 * @method void setTypeMsg(mixed $type, string $msg = null) static 设置验证规则的默认提示信息
 * @method \Shopwwi\WebmanValidator\Validator message(mixed $name, string $message = '') static 设置提示信息
 * @method \Shopwwi\WebmanValidator\Validator scene(string $name) static 设置验证场景
 * @method bool hasScene(string $name) static 判断是否存在某个验证场景
 * @method \Shopwwi\WebmanValidator\Validator batch(bool $batch = true) static 设置批量验证
 * @method \Shopwwi\WebmanValidator\Validator only(array $fields) static 指定需要验证的字段列表
 * @method \Shopwwi\WebmanValidator\Validator remove(mixed $field, mixed $rule = true) static 移除某个字段的验证规则
 * @method \Shopwwi\WebmanValidator\Validator append(mixed $field, mixed $rule = null) static 追加某个字段的验证规则
 * @method bool confirm(mixed $value, mixed $rule, array $data = [], string $field = '') static 验证是否和某个字段的值一致
 * @method bool different(mixed $value, mixed $rule, array $data = []) static 验证是否和某个字段的值是否不同
 * @method bool egt(mixed $value, mixed $rule, array $data = []) static 验证是否大于等于某个值
 * @method bool gt(mixed $value, mixed $rule, array $data = []) static 验证是否大于某个值
 * @method bool elt(mixed $value, mixed $rule, array $data = []) static 验证是否小于等于某个值
 * @method bool lt(mixed $value, mixed $rule, array $data = []) static 验证是否小于某个值
 * @method bool eq(mixed $value, mixed $rule) static 验证是否等于某个值
 * @method bool must(mixed $value, mixed $rule) static 必须验证
 * @method bool is(mixed $value, mixed $rule, array $data = []) static 验证字段值是否为有效格式
 * @method bool ip(mixed $value, mixed $rule) static 验证是否有效IP
 * @method bool requireIf(mixed $value, mixed $rule) static 验证某个字段等于某个值的时候必须
 * @method bool requireCallback(mixed $value, mixed $rule,array $data) static 通过回调方法验证某个字段是否必须
 * @method bool requireWith(mixed $value, mixed $rule, array $data) static 验证某个字段有值的情况下必须
 * @method bool filter(mixed $value, mixed $rule) static 使用filter_var方式验证
 * @method bool in(mixed $value, mixed $rule) static 验证是否在范围内
 * @method bool notIn(mixed $value, mixed $rule) static 验证是否不在范围内
 * @method bool between(mixed $value, mixed $rule) static between验证数据
 * @method bool notBetween(mixed $value, mixed $rule) static 使用notbetween验证数据
 * @method bool length(mixed $value, mixed $rule) static 验证数据长度
 * @method bool max(mixed $value, mixed $rule) static 验证数据最大长度
 * @method bool min(mixed $value, mixed $rule) static 验证数据最小长度
 * @method bool after(mixed $value, mixed $rule) static 验证日期
 * @method bool before(mixed $value, mixed $rule) static 验证日期
 * @method bool expire(mixed $value, mixed $rule) static 验证有效期
 * @method bool allowIp(mixed $value, mixed $rule) static 验证IP许可
 * @method bool denyIp(mixed $value, mixed $rule) static 验证IP禁用
 * @method bool regex(mixed $value, mixed $rule) static 使用正则验证数据
 * @method bool token(mixed $value, mixed $rule) static 验证表单令牌
 * @method bool dateFormat(mixed $value, mixed $rule) static 验证时间和日期是否符合指定格式
 * @method bool unique(mixed $value, mixed $rule, array $data = [], string $field = '') static 验证是否唯一
 * @method bool check(array $data, mixed $rules = []) static 数据自动验证
 * @method bool checkRule(mixed $data, mixed $rules = []) static 数据手动验证
 * @method mixed getError() static 获取错误信息
 */
class Validator
{
    protected static $_instance = null;


    public static function instance()
    {
        if (!static::$_instance) {
            static::$_instance = new \Shopwwi\WebmanValidator\Validator();
        }
        return static::$_instance;
    }
    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return static::instance()->{$name}(... $arguments);
    }
}
