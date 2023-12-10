<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car_basic_image".
 *
 * @property int $id
 * @property int $car_basic_id
 * @property int $file_id
 *
 * @property CarBasic $carBasic
 * @property File $file
 */
class CarBasicImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_basic_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_basic_id', 'file_id'], 'required'],
            [['car_basic_id', 'file_id'], 'integer'],
            [['car_basic_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarBasic::class, 'targetAttribute' => ['car_basic_id' => 'id']],
            [['file_id'], 'exist', 'skipOnError' => true, 'targetClass' => File::class, 'targetAttribute' => ['file_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'car_basic_id' => Yii::t('app', 'Car Basic ID'),
            'file_id' => Yii::t('app', 'File ID'),
        ];
    }

    /**
     * Gets query for [[CarBasic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarBasic()
    {
        return $this->hasOne(CarBasic::class, ['id' => 'car_basic_id']);
    }

    /**
     * Gets query for [[File]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFile()
    {
        return $this->hasOne(File::class, ['id' => 'file_id']);
    }
}
