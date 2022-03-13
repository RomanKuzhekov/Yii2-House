<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 13.03.2022
 * Time: 20:26
 */

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\User]].
 *
 * @see \app\models\User
 */
class UserQuery extends \yii\db\ActiveQuery
{

    /**
     * @param $id
     * @return $this
     */
    public function exceptUser($id)
    {
        return $this->andWhere(['<>', 'id', $id]);
    }

    /**
     * @inheritdoc
     * @return \app\models\User[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\User|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
