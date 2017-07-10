<?php
/**
 * Created by PhpStorm.
 * User: Fu Yuefei
 * Date: 2017/7/6
 * Time: 16:10
 */

namespace Admin\Model;


use Think\Model;

class SaleModel extends Model
{
    protected $_validate = array(
        array('publisher', 'require', '发布人不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('tel', 'require', '电话不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('type', 'require', '类型不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('price', 'require', '价格不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
    );

    protected $_auto = array(
        array('create_time', NOW_TIME, self::MODEL_INSERT),
        array('end_time', NOW_TIME, self::MODEL_BOTH),
        array('status', '1', self::MODEL_INSERT),
    );
}