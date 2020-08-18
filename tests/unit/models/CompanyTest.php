<?php

namespace app\tests\unit\models;

use app\tests\unit\fixtures\CompaniesFixture;
use app\models\Companies;
use app\models\Categories;

class CompanyTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function _fixtures(){
        return [
            'companies' => [
                'class' => CompaniesFixture::className()
            ]
        ];
    }

    /**
     * Тест создания категории
     */
    public function testCreate()
    {
        // Создание
        $company = new Companies();
        $company->name = 'Газпром';
        $this->assertTrue($company->save());

        // Запрос
        $company = $company::findOne(['name' => 'Газпром']);

        // Проверка
        $this->assertSame($company->name, 'Газпром');
    }

    /**
     * Тест изменения категории
     */
    public function testUpdate()
    {
        // Запрос
        $company = Companies::findOne(1);
        $this->assertTrue($company !== null);

        // Изменение
        $company->name = 'Роскосмос';
        $this->assertTrue($company->save());

        // Проверка
        $company = Companies::findOne(['name' => 'Роскосмос']);
        $this->assertTrue($company !== null);
    }

    /**
     * Тест удаления категории
     */
    public function testDelete()
    {
        // Запрос
        $company = Companies::findOne(1);

        // Проверка
        $this->assertTrue($company !== null);
        $this->assertTrue(!empty($company->delete()));
    }

    /**
     * Тест удаления категории
     */
    public function testCategoryExist()
    {
        // Запрос
        $company = Companies::findOne(1);

        // Проверка
        $this->assertTrue(!empty(Categories::findOne(['id' => $company->category_id])));
    }
}
