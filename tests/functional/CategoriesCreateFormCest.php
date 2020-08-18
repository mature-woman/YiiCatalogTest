<?php

class CategoriesCreateFormCest 
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnPage(['categories/create']);
    }

    public function openContactPage(\FunctionalTester $I)
    {
        $I->see('Create Categories', 'h1');        
    }

    public function submitEmptyForm(\FunctionalTester $I)
    {
        $I->submitForm('.categories-form form', []);
        $I->expectTo('see validations errors');
        $I->see('Create Categories', 'h1');
        $I->see('Название cannot be blank');
    }

    public function submitFormWithNameLessLimit(\FunctionalTester $I)
    {
        $I->submitForm('.categories-form form', [
            'Categories[name]' => 'se'
        ]);
        $I->expectTo('see that name is less validator limit');
        $I->see('Название should contain at least 3 characters.');
    }

    public function submitFormSuccessfully(\FunctionalTester $I)
    {
        $I->submitForm('.categories-form form', [
            'Categories[name]' => 'TestName'
        ]);
        $I->dontSeeElement('.categories-form form');
        $I->see('TestName', 'h1');
    }
}
