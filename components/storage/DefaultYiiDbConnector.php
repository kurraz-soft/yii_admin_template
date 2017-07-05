<?php
/**
 * Created by PhpStorm.
 * User: Kurraz
 * Date: 27.11.2016
 * Time: 9:01
 */

namespace app\components\storage;

use yii\base\Exception;
use yii\db\Query;

class DefaultYiiDbConnector extends BaseStorageConnector
{
    public $tableName = 'core_storage';

    /**
     * @param $key
     * @return Record
     */
    public function one($key)
    {
        return new Record(
            $key,
            (new Query())
                ->select(['value'])
                ->from($this->tableName)
                ->where(['key'=>$key])
                ->scalar()
        );
    }

    /**
     * @return Record[]
     */
    public function all()
    {
        $res = [];

        $q = (new Query())->from($this->tableName);
        foreach($q->each() as $row)
        {
            $res[] = new Record($row['key'], $row['value']);
        }

        return $res;
    }

    /**
     * @param $key
     * @return bool
     */
    public function delete($key)
    {
        try
        {
            \Yii::$app->db->createCommand()->delete($this->tableName,['key' => $key])->execute();
        }catch (Exception $e)
        {
            return false;
        }

        return true;
    }

    /**
     * @param $key
     * @param $value
     * @return bool
     */
    public function save($key, $value)
    {
        $row = (new Query())
                ->select(['value'])
                ->from($this->tableName)
                ->where(['key'=>$key])
                ->one();

        try{
            if($row)
            {
                //Update
                \Yii::$app->db->createCommand()->update($this->tableName,['value' => $value], ['key' => $key])->execute();
            }else
            {
                //Insert
                \Yii::$app->db->createCommand()->insert($this->tableName,['key' => $key,'value' => $value])->execute();
            }
        }catch (\Exception $e)
        {
            return false;
        }

        return true;
    }

}