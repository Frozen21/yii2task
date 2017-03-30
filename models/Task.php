<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property integer $tasklist_id
 * @property string $text
 * @property string $created_at
 * @property integer $rate
 *
 * @property Tasklist $tasklist
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tasklist_id', 'text'], 'required'],
            [['tasklist_id', 'rate'], 'integer'],
            [['created_at'], 'safe'],
            [['text'], 'string', 'max' => 255],
            [['tasklist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tasklist::className(), 'targetAttribute' => ['tasklist_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tasklist_id' => 'Tasklist ID',
            'text' => 'Text',
            'created_at' => 'Created At',
            'rate' => 'Rate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasklist()
    {
        return $this->hasOne(Tasklist::className(), ['id' => 'tasklist_id']);
    }
}
