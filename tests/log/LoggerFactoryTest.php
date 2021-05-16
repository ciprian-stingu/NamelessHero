<?php declare(strict_types=1);


namespace tests\log;

use log\ILogger;
use log\LoggerFactory;
use log\WindowLogger;
use PHPUnit\Framework\TestCase;
use screen\InfoWindow;

final class LoggerFactoryTest extends TestCase
{
    private ILogger $_logger;

    protected function setUp() : void
    {
        $this->_logger = LoggerFactory::getLogger();
    }

    public function testGetLogger()
    {
        $this->assertInstanceOf(WindowLogger::class, $this->_logger);
    }

    public function testLoggerInfoWindowExistence()
    {
        $this->assertInstanceOf(InfoWindow::class, $this->_logger->getGraphic());
    }

    public function testLoggerLog()
    {
        $this->_logger->log("My message!");

        $data = $this->_logger->getGraphic()->getData();

        $this->assertGreaterThan(0, strpos(join('', $data), "My message!"));
    }
}