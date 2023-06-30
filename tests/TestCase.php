<?php

namespace Neography7\EasyResponse\Tests;

use Neography7\EasyResponse\EasyResponseServiceProvider;
use Orchestra\Testbench\TestCase as ParentTestCase;

class TestCase extends ParentTestCase
{
  public function setUp(): void
  {
    Parent::setUp();
    // additional setup
  }

  protected function getPackageProviders($app)
  {
    return [
        EasyResponseServiceProvider::class,
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    // perform environment setup
  }

}