<?php
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 05.01.2019
 * Time: 15:01
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadImage extends Model
{
    public $image;

    public function rules()
    {
        return[
          [['image'], 'required'],
          [['image'], 'file', 'extensions' => 'jpg, png']
        ];
    }

    public function uploadFile(UploadedFile $file, $currentImage)
    {
        $this->image = $file;

        $this->deleteOldFile($currentImage);

        return $this->loadFile();
    }

    public function getFolder(){
       return Yii::getAlias('@web') . 'images/';
    }


    public function getExits($currentImage){
        if(!empty($currentImage) && $currentImage != null){
            return file_exists($this->getFolder() . $currentImage);
        }
    }

    public function deleteOldFile($currentImage){
        if($this->getExits($currentImage)){
            unlink($this->getFolder() . $currentImage);
        }
    }

    public function fileNameGenerate(){
        return $this->image->baseName . '.' . $this->image->extension;
    }

    public function loadFile(){
        $fileName = $this->fileNameGenerate();
        $this->image->saveAs($this->getFolder() . $fileName);
        return $fileName;
    }
}