<?php

/*
 * Bookmark.php
 * 
 */

namespace trewny\models\forms;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
//-
use trewny\models\Bookmark as ModelBookmark;

/**
 * @author André Echevarria <echevarriandre@gmail.com>
 */
class Bookmark extends Model {

    /** @var ModelBookmark */
    private $bookmark;

    /** @var string */
    public $title;

    /** @var string */
    public $link;

    /** @var string */
    public $color;

    /** @var \yii\web\UploadedFile */
    public $image;

    /**
     * @inheritdoc
     */
    public function rules(): array {
        return [
            [['title', 'link'], 'required', 'message' => 'Can\'t be empty'],
            [['color', 'title', 'link'], 'string'],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function __construct(ModelBookmark $bookmark = null) {
        $this->bookmark = $bookmark;

        if ($this->bookmark) {
            $this->title = $this->bookmark->title;
            $this->link = $this->bookmark->link;
            $this->color = $this->bookmark->color ?: null;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return $this->bookmark ? $this->bookmark->attributeLabels() : (new ModelBookmark())->attributeLabels();
    }

    /**
     * @return bool
     */
    public function save(): bool {
        if ($this->validate()) {
            if (!$this->bookmark) {
                $this->bookmark = new ModelBookmark();
            }

            $transaction = $this->bookmark->getDb()->beginTransaction();

            $this->bookmark->title = $this->title;

            echo $this->link;
            echo strpos($this->link, 'https://');

            if ((strpos($this->link, 'https://')) == 0) {
                $this->bookmark->link = $this->link;
            } else if ((strpos($this->link, 'http://')) == 0) {
                $this->bookmark->link = $this->link;
            } else {
                $this->bookmark->link = 'https://' . $this->link;
            }

            $this->bookmark->color = $this->color ?: null;
            $this->bookmark->idAccount = Yii::$app->user->id;

            if (($image = UploadedFile::getInstance($this, 'image'))) {
                $end = explode('.', $image->name);
                $name = strtoupper(Yii::$app->security->generateRandomString()) . '.' . end($end);

                $base = Yii::$app->params['data'] . '/bookmarks/';
                if (!is_dir($base)) {
                    mkdir($base, 0777, true);
                }

                $this->bookmark->image = $name;
                $destino = $base . '/' . $name;

                try {
                    if (!$image->saveAs($destino)) {
                        $transaction->rollBack();
                        $this->addError('image', 'An error ocurred while uploading the image');

                        return false;
                    }
                } catch (\yii\base\ErrorException $ex) {
                    $this->addError('foto', 'An error ocurred while uploading the image');
                    $transaction->rollBack();
                    return false;
                }
            }

            if ($this->bookmark->save()) {
                $transaction->commit();
                return true;
            }

            $transaction->rollBack();
            return false;
        }
        return false;
    }

    public function getId(): int {
        return $this->bookmark ? $this->bookmark->id : 0;
    }

}
