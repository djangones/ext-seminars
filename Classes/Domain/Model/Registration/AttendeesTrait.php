<?php

declare(strict_types=1);

namespace OliverKlee\Seminars\Domain\Model\Registration;

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;

/**
 * Provides attendees-related fields to `Registration`.
 *
 * @mixin Registration
 */
trait AttendeesTrait
{
    /**
     * @var \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser|null
     * @phpstan-var FrontendUser|LazyLoadingProxy|null
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $user;

    public function getUser(): ?FrontendUser
    {
        $user = $this->user;
        if ($user instanceof LazyLoadingProxy) {
            $user = $user->_loadRealInstance();
            \assert($user instanceof FrontendUser);
            $this->user = $user;
        }

        return $user;
    }

    public function setUser(FrontendUser $user): void
    {
        $this->user = $user;
    }
}
