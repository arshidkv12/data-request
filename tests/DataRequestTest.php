<?php

namespace Tests\Unit;

use Illuminate\Http\Request;
use Arshidkv12\DataRequest\FormDataRequest;
use Illuminate\Container\Container;
use Illuminate\Validation\Factory;
use Illuminate\Translation\ArrayLoader;
use Illuminate\Translation\Translator;
use PHPUnit\Framework\TestCase;
use Illuminate\Contracts\Validation\Factory as ValidatorFactoryContract;

class FormDataRequestTest extends TestCase
{
    public function testPassedValidationAssignsProperties()
    {
        // Anonymous subclass of your DataRequest
        $request = new class extends FormDataRequest {
            public $name;
            public $email;

            public function rules()
            {
                return [
                    'name' => 'required|string',
                    'email' => 'required|email',
                ];
            }
        };

        // Simulated form input
        $input = [
            'name' => 'Test Name',
            'email' => 'test@example.com',
        ];

        // Create base Illuminate HTTP Request
        $base = Request::create('/fake-url', 'POST', $input);

        // Transfer input to your custom request
        $request->initialize(
            $base->query->all(),
            $base->request->all(),
            $base->attributes->all(),
            $base->cookies->all(),
            $base->files->all(),
            $base->server->all(),
            $base->getContent()
        );

        // Set up a basic container + validator factory
        $container = new Container();
        $translator = new Translator(new ArrayLoader(), 'en');
        $validatorFactory = new Factory($translator, $container);

        $container->bind(ValidatorFactoryContract::class, fn () => $validatorFactory);
        $request->setContainer($container);

        // This triggers validation and passedValidation()
        $request->validateResolved();

        // Assertions
        $this->assertSame('Test Name', $request->name);
        $this->assertSame('test@example.com', $request->email);
    }
}
