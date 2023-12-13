<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "car_advanced".
 *
 * @property int $id
 * @property string $type_auto
 * @property string $brand
 * @property string $model
 * @property string $year_car
 * @property string $description
 * @property string|null $start_date
 * @property string|null $end_date
 *
 * @property CarAdvancedImage[] $Images
 */
function mine_content_type($filename) {
    $mime_type = mime_content_type($filename);
    return $mime_type;
}

class CarAdvanced extends \yii\db\ActiveRecord
{

    /**
     * @var UploadedFile
     */
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_advanced';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_auto', 'brand', 'model', 'year_car', 'description'], 'required'],
            [['brand', 'model', 'year_car', 'description'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['type_auto'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type_auto' => Yii::t('app', 'Type Auto'),
            'brand' => Yii::t('app', 'Brand'),
            'model' => Yii::t('app', 'Model'),
            'year_car' => Yii::t('app', 'Year Car'),
            'description' => Yii::t('app', 'Description'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
        ];
    }

    /**
     * Gets query for [[CarAdvancedImages]].
     *
     * @return \yii\db\ActiveQuery|CarAdvancedImageQuery
     */
    public function getImages()
    {
        return $this->hasMany(CarAdvancedImage::class, ['car_advanced_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CarAdvancedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CarAdvancedQuery(get_called_class());
    }

    public function saveImage(){
        Yii::$app->db->transaction(function ($db){
            /**
             * @var $db yii\db\Connection
             */
            $file = new File();
            $file->name = uniqid(true) . '.' . $this->imageFile->extension;
            $file->base_url = Yii::$app->urlManager->createAbsoluteUrl('uploads/projects');
            $file->mime_type = mine_content_type($this->imageFile->tempName);
            $file->save();

            $projectImage = new CarAdvancedImage();
            $projectImage->car_advanced_id = $this->id;
            $projectImage->file_id = $file->id;
            $projectImage->save();

            if(!$this->imageFile->saveAs('uploads/projects' . '/' .$file->name)){
                $db->transaction->rollBack();
            }

        });
    }
    public function hasImages(){
        return count($this->images) > 0;
    }
}
