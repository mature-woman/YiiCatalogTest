<?php

class CompaniesCreateFormCest 
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnPage(['companies/create']);
    }

    protected function _inject(\CategoriesCreateFormCest $categoriesCreateForm)
    {
        $this->categoriesCreateForm = $categoriesCreateForm;
    }


    public function openContactPage(\FunctionalTester $I)
    {
        $I->see('Create Companies', 'h1');        
    }

    public function submitEmptyForm(\FunctionalTester $I)
    {
        $I->submitForm('.companies-form form', []);
        $I->expectTo('see validations errors');
        $I->see('Create Companies', 'h1');
        $I->see('Название cannot be blank');
    }

    public function submitFormWithNameLessLimit(\FunctionalTester $I)
    {
        $I->submitForm('.companies-form form', [
            'Companies[category_id]'    => '3',
            'Companies[name]' => 'se'
        ]);
        $I->expectTo('see that name is less validator limit');
        $I->see('Название should contain at least 3 characters.');
    }

    public function submitFormSuccessfully(\FunctionalTester $I)
    {
        // Создание категории (зависимость)
        $this->categoriesCreateForm->_before($I);
        $this->categoriesCreateForm::submitFormSuccessfully($I);

        // Отправка формы создания компании
        $this->_before($I);
        $I->submitForm('.companies-form form', [
            'Companies[category_id]'    => 2,
            'Companies[name]'           => 'TestName'
        ]);
        $I->see('TestName', 'h1');
    }
}
