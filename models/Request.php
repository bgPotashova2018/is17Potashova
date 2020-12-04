<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $idCategore
 * @property string $status
 * @property string $timestamp
 * @property string $photoBefore
 * @property string|null $photoAfter
 * @property int $idUser
 *
 * @property Category $idCategore0
 * @property User $idUser0
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'idCategore', 'status', 'photoBefore', 'idUser'], 'required'],
            [['description', 'status'], 'string'],
            [['idCategore', 'idUser'], 'integer'],
            [['timestamp'], 'safe'],
            [['name', 'photoBefore', 'photoAfter'], 'string', 'max' => 255],
            [['idCategore'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['idCategore' => 'id']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'idCategore' => 'Id Categore',
            'status' => 'Status',
            'timestamp' => 'Timestamp',
            'photoBefore' => 'Photo Before',
            'photoAfter' => 'Photo After',
            'idUser' => 'Id User',
        ];
    }

    /**
     * Gets query for [[IdCategore0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategore0()
    {
        return $this->hasOne(Category::className(), ['id' => 'idCategore']);
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }
}
