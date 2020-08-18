<?php

namespace app\tests\unit\models;

use app\tests\unit\fixtures\CategoriesFixture;
use app\models\Categories;

class CategoryTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function _fixtures(){
        return [
            'categories' => [
                'class' => CategoriesFixture::className()
            ]
        ];
    }

    /**
     * Тест создания категории
     */
    public function testCreate()
    {
        // Создание
        $category = new Categories();
        $category->name = 'Сельское хозяйство';
        $this->assertTrue($category->save());

        // Запрос
        $category = $category::findOne(['name' => 'Сельское хозяйство']);

        // Проверка
        $this->assertSame('Сельское хозяйство', $category->name);
    }

    /**
     * Тест изменения категории
     */
    public function testUpdate()
    {
        // Запрос
        $category = Categories::findOne(1);
        $this->assertTrue($category !== null);

        // Изменение
        $category->name = 'Лесодобывающая промышленность';
        $this->assertTrue($category->save());

        // Проверка
        $category = Categories::findOne(['name' => 'Лесодобывающая промышленность']);
        $this->assertTrue($category !== null);
    }

    /**
     * Тест удаления категории
     */
    public function testDelete()
    {
        // Запрос
        $category = Categories::findOne(1);

        // Проверка
        $this->assertTrue($category !== null);
        $this->assertTrue(!empty($category->delete()));
    }
}
