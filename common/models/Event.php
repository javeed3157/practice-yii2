<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%event}}".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int|null $host
 * @property string $venue
 * @property int $date
 * @property string $time
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property User $host0
 * @property User $updatedBy
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%event}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'venue', 'date', 'time'], 'required'],
            [['description'], 'string'],
            [['host', 'date', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['title', 'venue'], 'string', 'max' => 256],
            [['time'], 'string', 'max' => 20],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['host'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['host' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'host' => 'Host',
            'venue' => 'Venue',
            'date' => 'Date',
            'time' => 'Time',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Host0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getHost0()
    {
        return $this->hasOne(User::className(), ['id' => 'host']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\EventQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EventQuery(get_called_class());
    }
}
