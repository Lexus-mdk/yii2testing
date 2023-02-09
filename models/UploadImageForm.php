<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadImageForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 5],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $name = $this->transliterate($file->baseName);
                $final_name = $this->isRepeat($name, $name . '.' . $file->extension, $file->extension);
                $file->saveAs('uploads/' . $final_name);
                $model = new Images();
                $model->name = $final_name;
                $model->datetime = date('Y-m-d H:i:s');
                if (!$model->save()){
                    return false;
                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function transliterate($string)
    {
        $trans = array(
            "а"=>"a",  "б"=>"b",  "в"=>"v",  "г"=>"g",
            "д"=>"d",  "е"=>"e",  "ё"=>"yo", "ж"=>"j",
            "з"=>"z",  "и"=>"i",  "й"=>"i",  "к"=>"k",
            "л"=>"l",  "м"=>"m",  "н"=>"n",  "о"=>"o",
            "п"=>"p",  "р"=>"r",  "с"=>"s",  "т"=>"t",
            "у"=>"y",  "ф"=>"f",  "х"=>"h",  "ц"=>"c",
            "ч"=>"ch", "ш"=>"sh", "щ"=>"sh", "ы"=>"i",
            "э"=>"e",  "ю"=>"u",  "я"=>"ya",

            "А"=>"A",  "Б"=>"B",  "В"=>"V",  "Г"=>"G",
            "Д"=>"D",  "Е"=>"E",  "Ё"=>"Yo", "Ж"=>"J",
            "З"=>"Z",  "И"=>"I",  "Й"=>"I",  "К"=>"K",
            "Л"=>"L",  "М"=>"M",  "Н"=>"N",  "О"=>"O",
            "П"=>"P",  "Р"=>"R",  "С"=>"S",  "Т"=>"T",
            "У"=>"Y",  "Ф"=>"F",  "Х"=>"H",  "Ц"=>"C",
            "Ч"=>"Ch", "Ш"=>"Sh", "Щ"=>"Sh", "Ы"=>"I",
            "Э"=>"E",  "Ю"=>"U",  "Я"=>"Ya",

            "ь"=>"",   "Ь"=>"",   "ъ"=>"",   "Ъ"=>"",

            " "=>"_"
        );
        return(strtolower(strtr($string, $trans)));
    }

    public function isRepeat($start, $finish, $ext,  $num = 0){
        if(file_exists('uploads/' . $finish)){
            $num++;
            return $this->isRepeat($start,$start . "($num)" . '.' . $ext, $ext, $num);
        }else{
            return $finish;
        }
    }
}