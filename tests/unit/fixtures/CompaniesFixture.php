<?php

namespace app\tests\unit\fixtures;

class CompaniesFixture extends \yii\test\ActiveFixture
{
    public $modelClass  = 'app\models\Companies';
    public $depends     = ['app\tests\unit\fixtures\CategoriesFixture'];
}
