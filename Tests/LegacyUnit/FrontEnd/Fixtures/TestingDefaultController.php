<?php

declare(strict_types=1);

namespace OliverKlee\Seminars\Tests\LegacyUnit\FrontEnd\Fixtures;

use OliverKlee\Seminars\FrontEnd\DefaultController;
use OliverKlee\Seminars\OldModel\LegacyEvent;

/**
 * Proxy class to make some things public.
 */
class TestingDefaultController extends DefaultController
{
    public function setSeminar(?LegacyEvent $event = null): void
    {
        parent::setSeminar($event);
    }

    public function createAllEditorLinks(): string
    {
        return parent::createAllEditorLinks();
    }

    public function mayCurrentUserEditCurrentEvent(): bool
    {
        return parent::mayCurrentUserEditCurrentEvent();
    }

    public function processEventEditorActions(): void
    {
        parent::processEventEditorActions();
    }

    public function hideEvent(\Tx_Seminars_Model_Event $event): void
    {
        parent::hideEvent($event);
    }

    public function unhideEvent(\Tx_Seminars_Model_Event $event): void
    {
        parent::unhideEvent($event);
    }

    public function copyEvent(\Tx_Seminars_Model_Event $event): void
    {
        parent::copyEvent($event);
    }
}
