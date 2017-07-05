<?php
/**
 * Created by PhpStorm.
 * User: Kurraz
 * Date: 21.01.2016
 * Time: 8:53
 */

namespace app\components\storage;


use yii\base\Component;

abstract class BaseStorageConnector extends Component
{
    /**
     * @param $key
     * @return Record
     */
    abstract public function one($key);
    /**
     * @return Record[]
     */
    abstract public function all();
    /**
     * @param $key
     * @return bool
     */
    abstract public function delete($key);
    /**
     * @param $key
     * @param $value
     * @return bool
     */
    abstract public function save($key,$value);
}