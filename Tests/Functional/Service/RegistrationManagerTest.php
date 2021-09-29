<?php

declare(strict_types=1);

namespace OliverKlee\Seminars\Tests\Functional\Service;

use Nimut\TestingFramework\TestCase\FunctionalTestCase;
use OliverKlee\Oelib\Configuration\ConfigurationRegistry;
use OliverKlee\Oelib\Configuration\DummyConfiguration;
use OliverKlee\Seminars\Tests\Unit\Traits\EmailTrait;
use OliverKlee\Seminars\Tests\Unit\Traits\LanguageHelper;
use OliverKlee\Seminars\Tests\Unit\Traits\MakeInstanceTrait;
use TYPO3\CMS\Core\Mail\MailMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * @covers \Tx_Seminars_Service_RegistrationManager
 */
final class RegistrationManagerTest extends FunctionalTestCase
{
    use LanguageHelper;

    use EmailTrait;

    use MakeInstanceTrait;

    /**
     * @var string
     */
    private const EMAIL_TEMPLATE_PATH = 'EXT:seminars/Resources/Private/Templates/Mail/e-mail.html';

    /**
     * @var string[]
     */
    protected $testExtensionsToLoad = ['typo3conf/ext/oelib', 'typo3conf/ext/seminars'];

    /**
     * @var \Tx_Seminars_Service_RegistrationManager
     */
    private $subject = null;

    /**
     * @var DummyConfiguration
     */
    private $configuration;

    protected function setUp(): void
    {
        parent::setUp();

        $this->initializeBackEndLanguage();
        $this->configuration = new DummyConfiguration([]);
        ConfigurationRegistry::getInstance()->set('plugin.tx_seminars', $this->configuration);

        $this->email = $this->createEmailMock();

        $this->subject = \Tx_Seminars_Service_RegistrationManager::getInstance();
    }

    protected function tearDown(): void
    {
        ConfigurationRegistry::purgeInstance();
        \Tx_Seminars_Service_RegistrationManager::purgeInstance();
        // Purge the FIFO buffer of mocks
        GeneralUtility::makeInstance(MailMessage::class);
        GeneralUtility::makeInstance(MailMessage::class);

        parent::tearDown();
    }

    /**
     * @test
     */
    public function notifyOrganizersForEventWithOneVacancyShowsVacanciesLabelWithVacancyNumber(): void
    {
        $this->importDataSet(__DIR__ . '/Fixtures/RegistrationManagerRecords.xml');
        $this->addMockedInstance(MailMessage::class, $this->email);
        $registration = \Tx_Seminars_OldModel_Registration::fromUid(1);

        $this->configuration->setAsBoolean('sendNotification', true);
        $this->configuration->setAsString('templateFile', self::EMAIL_TEMPLATE_PATH);
        $this->subject->setConfigurationValue('showSeminarFieldsInNotificationMail', 'vacancies');

        $this->subject->notifyOrganizers($registration);

        $expectedExpression = '/' . $this->getLanguageService()->getLL('label_vacancies') . ': 1\\n*$/';
        self::assertRegExp($expectedExpression, $this->email->getBody());
    }
}
