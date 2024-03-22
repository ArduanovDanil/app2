<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\Yii\View\ViewRenderer;
use App\Models\Person;
use Yiisoft\Validator\Validator;
use Yiisoft\Validator\Rule\Each;
use Yiisoft\Validator\Rule\Number;


final class TestController
{
    public function __construct(private ViewRenderer $viewRenderer)
    {
        $this->viewRenderer = $viewRenderer->withControllerName('site');
    }

    public function index(): ResponseInterface
    {
        /*$person = new Person(
            name: 'John', 
            age: 17, 
            email: 'john@example.com',
            phone: null
        );
        */
        
        //$result = (new Validator())->validate($person);

        $rule = new Each([new Number(min: 21)]);
        
        $value = [21, 22, 23, 20];
        $result = (new Validator())->validate($value, $rule);

        dd($result->getErrorMessagesIndexedByAttribute());
        die;

        return $this->viewRenderer->render('index');
    }
}
