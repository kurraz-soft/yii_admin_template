<?php
/**
 * Created by PhpStorm.
 * User: Kurraz
 * Date: 16.01.2016
 * Time: 22:11
 */

namespace app\commands;


use app\models\User;
use yii\console\Controller;
use yii\helpers\VarDumper;

class UserController extends Controller
{
    /**
     * Creates new user
     *
     * @param string $login
     * @param string $password
     * @param string $roles roles separated by comma
     * @param string|null $name
     * @throws \ErrorException
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function actionNew($login, $password, $roles = '', $name = null)
    {
        if(!$name) $name = $login;

        $roles = explode(',', $roles);

        $user = new User();
        $user->setRoles($roles);
        $user->login = $login;
        $user->password = $password;
        $user->name = $name;
        if(!$user->save())
        {
            throw new \ErrorException(VarDumper::dumpAsString($user->errors));
        }

        echo "Done!\n";
    }
}