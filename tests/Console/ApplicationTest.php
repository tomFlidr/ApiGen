<?php declare(strict_types=1);

namespace ApiGen\Tests\Console;

use ApiGen\Console\Application;
use ApiGen\Contracts\Console\Input\DefaultInputDefinitionFactoryInterface;
use ApiGen\Contracts\Console\IO\IOInterface;
use Mockery;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Input\InputDefinition;

class ApplicationTest extends TestCase
{

    /**
     * @var Application
     */
    private $application;


    protected function setUp(): void
    {
        $ioMock = Mockery::mock(IOInterface::class);
        $defaultInputDefinitionFactoryMock = Mockery::mock(DefaultInputDefinitionFactoryInterface::class);
        $defaultInputDefinitionFactoryMock->shouldReceive('create')->andReturn(new InputDefinition);
        $this->application = new Application($ioMock, $defaultInputDefinitionFactoryMock);
    }


    public function testGetLongVersion(): void
    {
        $this->assertSame(
            'ApiGen',
            $this->application->getLongVersion()
        );
    }
}
