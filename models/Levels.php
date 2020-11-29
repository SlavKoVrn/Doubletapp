<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%levels}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $code
 */
class Levels extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%levels}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ид',
            'name' => 'Название',
            'code' => 'Код',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function getLevelsList() {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function formName()
    {
        return 's';
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert)
    {
        $this->code = strtoupper($this->code);

        return parent::beforeSave($insert);

    }

}
