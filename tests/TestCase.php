<?php

namespace Tests;

use App\Support\Installation;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
  /**
   * Marque l'application comme installée pour les tests fonctionnels.
   *
   * @return void
   */
  protected function setUp(): void
  {
    parent::setUp();

    Installation::markAsInstalled();
  }

  /**
   * Nettoie le marqueur d'installation après chaque test.
   *
   * @return void
   */
  protected function tearDown(): void
  {
    Installation::reset();

    parent::tearDown();
  }
}
