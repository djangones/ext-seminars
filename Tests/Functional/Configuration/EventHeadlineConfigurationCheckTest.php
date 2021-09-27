<?php

declare(strict_types=1);

namespace OliverKlee\Seminars\Tests\Functional\Configuration;

use Nimut\TestingFramework\TestCase\FunctionalTestCase;
use OliverKlee\Oelib\Configuration\DummyConfiguration;
use OliverKlee\Seminars\Configuration\EventHeadlineConfigurationCheck;

/**
 * @covers \OliverKlee\Seminars\Configuration\EventHeadlineConfigurationCheck
 */
final class EventHeadlineConfigurationCheckTest extends FunctionalTestCase
{
    /**
     * @var array<int, string>
     */
    protected $testExtensionsToLoad = [
        'typo3conf/ext/oelib',
        'typo3conf/ext/seminars',
    ];

    /**
     * @var EventHeadlineConfigurationCheck
     */
    private $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new EventHeadlineConfigurationCheck(new DummyConfiguration(), 'plugin.tx_seminars_pi1');
    }

    /**
     * @test
     */
    public function checkWithEmptyConfigurationCreatesErrors(): void
    {
        $this->subject->check();

        $result = $this->subject->getWarningsAsHtml();
        self::assertNotSame([], $result);
    }

    /**
     * @test
     */
    public function checkWithEmptyConfigurationUsesProvidedNamespaceForErrors(): void
    {
        $this->subject->check();

        $result = $this->subject->getWarningsAsHtml();
        self::assertArrayHasKey(1, $result);
        self::assertStringContainsString('plugin.tx_seminars_pi1', $result[1]);
    }
}
