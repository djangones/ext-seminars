<?php

declare(strict_types=1);

namespace OliverKlee\Seminars\Tests\LegacyUnit\Model;

use OliverKlee\Oelib\DataStructures\Collection;
use OliverKlee\PhpUnit\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

final class EventTopicTest extends TestCase
{
    /**
     * @var \Tx_Seminars_Model_Event
     */
    private $subject;

    protected function setUp(): void
    {
        $GLOBALS['SIM_EXEC_TIME'] = 1524751343;

        $this->subject = new \Tx_Seminars_Model_Event();
    }

    ////////////////////////////////
    // Tests concerning the title.
    ////////////////////////////////

    /**
     * @test
     */
    public function getTitleWithNonEmptyTitleReturnsTitle(): void
    {
        $this->subject->setData(['title' => 'Superhero']);

        self::assertSame(
            'Superhero',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function getRawTitleWithNonEmptyTitleReturnsTitle(): void
    {
        $this->subject->setData(['title' => 'Superhero']);

        self::assertSame(
            'Superhero',
            $this->subject->getRawTitle()
        );
    }

    //////////////////////////////////
    // Tests regarding the subtitle.
    //////////////////////////////////

    /**
     * @test
     */
    public function getSubtitleForEventTopicWithoutSubtitleReturnsAnEmptyString(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertEquals(
            '',
            $this->subject->getSubtitle()
        );
    }

    /**
     * @test
     */
    public function getSubtitleForEventTopicWithSubtitleReturnsSubtitle(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'subtitle' => 'sub title',
            ]
        );

        self::assertEquals(
            'sub title',
            $this->subject->getSubtitle()
        );
    }

    /**
     * @test
     */
    public function setSubtitleForEventTopicSetsSubtitle(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setSubtitle('sub title');

        self::assertEquals(
            'sub title',
            $this->subject->getSubtitle()
        );
    }

    /**
     * @test
     */
    public function hasSubtitleForEventTopicWithoutSubtitleReturnsFalse(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertFalse(
            $this->subject->hasSubtitle()
        );
    }

    /**
     * @test
     */
    public function hasSubtitleForEventTopicWithSubtitleReturnsTrue(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setSubtitle('sub title');

        self::assertTrue(
            $this->subject->hasSubtitle()
        );
    }

    ////////////////////////////////
    // Tests regarding the teaser.
    ////////////////////////////////

    /**
     * @test
     */
    public function getTeaserForEventTopicWithoutTeaserReturnsAnEmptyString(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertEquals(
            '',
            $this->subject->getTeaser()
        );
    }

    /**
     * @test
     */
    public function getTeaserForEventTopicWithTeaserReturnsTeaser(): void
    {
        $this->subject->setData(
            [
                'teaser' => 'wow, this is teasing',
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
            ]
        );

        self::assertEquals(
            'wow, this is teasing',
            $this->subject->getTeaser()
        );
    }

    /**
     * @test
     */
    public function setTeaserForEventTopicSetsTeaser(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setTeaser('wow, this is teasing');

        self::assertEquals(
            'wow, this is teasing',
            $this->subject->getTeaser()
        );
    }

    /**
     * @test
     */
    public function hasTeaserForEventTopicWithoutTeaserReturnsFalse(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertFalse(
            $this->subject->hasTeaser()
        );
    }

    /**
     * @test
     */
    public function hasTeaserForEventTopicWithTeaserReturnsTrue(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'teaser' => 'wow, this is teasing',
            ]
        );

        self::assertTrue(
            $this->subject->hasTeaser()
        );
    }

    /////////////////////////////////////
    // Tests regarding the description.
    /////////////////////////////////////

    /**
     * @test
     */
    public function getDescriptionForEventTopicWithoutDescriptionReturnsAnEmptyString(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertEquals(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function getDescriptionForEventTopicWithDescriptionReturnsDescription(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'description' => 'this is a great event.',
            ]
        );

        self::assertEquals(
            'this is a great event.',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForEventTopicSetsDescription(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setDescription('this is a great event.');

        self::assertEquals(
            'this is a great event.',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function hasDescriptionForEventTopicWithoutDescriptionReturnsFalse(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertFalse(
            $this->subject->hasDescription()
        );
    }

    /**
     * @test
     */
    public function hasDescriptionForEventTopicWithDescriptionReturnsTrue(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setDescription('this is a great event.');

        self::assertTrue(
            $this->subject->hasDescription()
        );
    }

    ///////////////////////////////////////
    // Tests regarding the credit points.
    ///////////////////////////////////////

    /**
     * @test
     */
    public function getCreditPointsForEventTopicWithoutCreditPointsReturnsZero(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertEquals(
            0,
            $this->subject->getCreditPoints()
        );
    }

    /**
     * @test
     */
    public function getCreditPointsForEventTopicWithPositiveCreditPointsReturnsCreditPoints(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'credit_points' => 42,
            ]
        );

        self::assertEquals(
            42,
            $this->subject->getCreditPoints()
        );
    }

    /**
     * @test
     */
    public function setCreditPointsForEventTopicWithZeroCreditPointsSetsCreditPoints(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setCreditPoints(0);

        self::assertEquals(
            0,
            $this->subject->getCreditPoints()
        );
    }

    /**
     * @test
     */
    public function setCreditPointsForEventTopicWithPositiveCreditPointsSetsCreditPoints(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setCreditPoints(42);

        self::assertEquals(
            42,
            $this->subject->getCreditPoints()
        );
    }

    /**
     * @test
     */
    public function hasCreditPointsForEventTopicWithoutCreditPointsReturnsFalse(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertFalse(
            $this->subject->hasCreditPoints()
        );
    }

    /**
     * @test
     */
    public function hasCreditPointsForEventTopicWithCreditPointsReturnsTrue(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'credit_points' => 42,
            ]
        );

        self::assertTrue(
            $this->subject->hasCreditPoints()
        );
    }

    ///////////////////////////////////////
    // Tests regarding the regular price.
    ///////////////////////////////////////

    /**
     * @test
     */
    public function getRegularPriceForEventTopicWithoutRegularPriceReturnsZero(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'price_regular' => 0.00,
            ]
        );

        self::assertEquals(
            0.00,
            $this->subject->getRegularPrice()
        );
    }

    /**
     * @test
     */
    public function getRegularPriceForEventTopicWithPositiveRegularPriceReturnsRegularPrice(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'price_regular' => 42.42,
            ]
        );

        self::assertEquals(
            42.42,
            $this->subject->getRegularPrice()
        );
    }

    /**
     * @test
     */
    public function setRegularPriceForEventTopicWithZeroRegularPriceSetsRegularPrice(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setRegularPrice(0.00);

        self::assertEquals(
            0.00,
            $this->subject->getRegularPrice()
        );
    }

    /**
     * @test
     */
    public function setRegularPriceForEventTopicWithPositiveRegularPriceSetsRegularPrice(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setRegularPrice(42.42);

        self::assertEquals(
            42.42,
            $this->subject->getRegularPrice()
        );
    }

    /**
     * @test
     */
    public function hasRegularPriceForEventTopicWithoutRegularPriceReturnsFalse(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertFalse(
            $this->subject->hasRegularPrice()
        );
    }

    /**
     * @test
     */
    public function hasRegularPriceForEventTopicWithRegularPriceReturnsTrue(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'price_regular' => 42.42,
            ]
        );

        self::assertTrue(
            $this->subject->hasRegularPrice()
        );
    }

    //////////////////////////////////////////////////
    // Tests regarding the regular early bird price.
    //////////////////////////////////////////////////

    /**
     * @test
     */
    public function getRegularEarlyBirdPriceForEventTopicWithoutRegularEarlyBirdPriceReturnsZero(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertEquals(
            0.00,
            $this->subject->getRegularEarlyBirdPrice()
        );
    }

    /**
     * @test
     */
    public function getRegularEarlyBirdPriceForEventTopicWithPositiveRegularEarlyBirdPriceReturnsRegularEarlyBirdPrice(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'price_regular_early' => 42.42,
            ]
        );

        self::assertEquals(
            42.42,
            $this->subject->getRegularEarlyBirdPrice()
        );
    }

    /**
     * @test
     */
    public function setRegularEarlyBirdPriceForEventTopicWithNegativeRegularEarlyBirdPriceThrowsException(): void
    {
        $this->expectException(
            \InvalidArgumentException::class
        );
        $this->expectExceptionMessage(
            'The parameter $price must be >= 0.00.'
        );

        $this->subject->setRegularEarlyBirdPrice(-1.00);
    }

    /**
     * @test
     */
    public function setRegularEarlyBirdPriceForEventTopicWithZeroRegularEarlyBirdPriceSetsRegularEarlyBirdPrice(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setRegularEarlyBirdPrice(0.00);

        self::assertEquals(
            0.00,
            $this->subject->getRegularEarlyBirdPrice()
        );
    }

    /**
     * @test
     */
    public function setRegularEarlyBirdPriceForEventTopicWithPositiveRegularEarlyBirdPriceSetsRegularEarlyBirdPrice(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setRegularEarlyBirdPrice(42.42);

        self::assertEquals(
            42.42,
            $this->subject->getRegularEarlyBirdPrice()
        );
    }

    /**
     * @test
     */
    public function hasRegularEarlyBirdPriceForEventTopicWithoutRegularEarlyBirdPriceReturnsFalse(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertFalse(
            $this->subject->hasRegularEarlyBirdPrice()
        );
    }

    /**
     * @test
     */
    public function hasRegularEarlyBirdPriceForEventTopicWithRegularEarlyBirdPriceReturnsTrue(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'price_regular_early' => 42.42,
            ]
        );

        self::assertTrue(
            $this->subject->hasRegularEarlyBirdPrice()
        );
    }

    /////////////////////////////////////////////
    // Tests regarding the regular board price.
    /////////////////////////////////////////////

    /**
     * @test
     */
    public function getRegularBoardPriceForEventTopicWithoutRegularBoardPriceReturnsZero(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertEquals(
            0.00,
            $this->subject->getRegularBoardPrice()
        );
    }

    /**
     * @test
     */
    public function getRegularBoardPriceForEventTopicWithPositiveRegularBoardPriceReturnsRegularBoardPrice(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'price_regular_board' => 42.42,
            ]
        );

        self::assertEquals(
            42.42,
            $this->subject->getRegularBoardPrice()
        );
    }

    /**
     * @test
     */
    public function setRegularBoardPriceForEventTopicWithZeroRegularBoardPriceSetsRegularBoardPrice(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setRegularBoardPrice(0.00);

        self::assertEquals(
            0.00,
            $this->subject->getRegularBoardPrice()
        );
    }

    /**
     * @test
     */
    public function setRegularBoardPriceForEventTopicWithPositiveRegularBoardPriceSetsRegularBoardPrice(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setRegularBoardPrice(42.42);

        self::assertEquals(
            42.42,
            $this->subject->getRegularBoardPrice()
        );
    }

    /**
     * @test
     */
    public function hasRegularBoardPriceForEventTopicWithoutRegularBoardPriceReturnsFalse(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertFalse(
            $this->subject->hasRegularBoardPrice()
        );
    }

    /**
     * @test
     */
    public function hasRegularBoardPriceForEventTopicWithRegularBoardPriceReturnsTrue(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'price_regular_board' => 42.42,
            ]
        );

        self::assertTrue(
            $this->subject->hasRegularBoardPrice()
        );
    }

    ///////////////////////////////////////
    // Tests regarding the special price.
    ///////////////////////////////////////

    /**
     * @test
     */
    public function getSpecialPriceForEventTopicWithoutSpecialPriceReturnsZero(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertEquals(
            0.00,
            $this->subject->getSpecialPrice()
        );
    }

    /**
     * @test
     */
    public function getSpecialPriceForEventTopicWithSpecialPriceReturnsSpecialPrice(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'price_special' => 42.42,
            ]
        );

        self::assertEquals(
            42.42,
            $this->subject->getSpecialPrice()
        );
    }

    /**
     * @test
     */
    public function setSpecialPriceForEventTopicWithZeroSpecialPriceSetsSpecialPrice(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setSpecialPrice(0.00);

        self::assertEquals(
            0.00,
            $this->subject->getSpecialPrice()
        );
    }

    /**
     * @test
     */
    public function setSpecialPriceForEventTopicWithPositiveSpecialPriceSetsSpecialPrice(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setSpecialPrice(42.42);

        self::assertEquals(
            42.42,
            $this->subject->getSpecialPrice()
        );
    }

    /**
     * @test
     */
    public function hasSpecialPriceForEventTopicWithoutSpecialPriceReturnsFalse(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertFalse(
            $this->subject->hasSpecialPrice()
        );
    }

    /**
     * @test
     */
    public function hasSpecialPriceForEventTopicWithSpecialPriceReturnsTrue(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setSpecialPrice(42.42);

        self::assertTrue(
            $this->subject->hasSpecialPrice()
        );
    }

    //////////////////////////////////////////////////
    // Tests regarding the special early bird price.
    //////////////////////////////////////////////////

    /**
     * @test
     */
    public function getSpecialEarlyBirdPriceForEventTopicWithoutSpecialEarlyBirdPriceReturnsZero(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertEquals(
            0.00,
            $this->subject->getSpecialEarlyBirdPrice()
        );
    }

    /**
     * @test
     */
    public function getSpecialEarlyBirdPriceForEventTopicWithPositiveSpecialEarlyBirdPriceReturnsSpecialEarlyBirdPrice(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'price_special_early' => 42.42,
            ]
        );

        self::assertEquals(
            42.42,
            $this->subject->getSpecialEarlyBirdPrice()
        );
    }

    /**
     * @test
     */
    public function setSpecialEarlyBirdPriceForEventTopicWithZeroSpecialEarlyBirdPriceSetsSpecialEarlyBirdPrice(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setSpecialEarlyBirdPrice(0.00);

        self::assertEquals(
            0.00,
            $this->subject->getSpecialEarlyBirdPrice()
        );
    }

    /**
     * @test
     */
    public function setSpecialEarlyBirdPriceForEventTopicWithPositiveSpecialEarlyBirdPriceSetsSpecialEarlyBirdPrice(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setSpecialEarlyBirdPrice(42.42);

        self::assertEquals(
            42.42,
            $this->subject->getSpecialEarlyBirdPrice()
        );
    }

    /**
     * @test
     */
    public function hasSpecialEarlyBirdPriceForEventTopicWithoutSpecialEarlyBirdPriceReturnsFalse(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertFalse(
            $this->subject->hasSpecialEarlyBirdPrice()
        );
    }

    /**
     * @test
     */
    public function hasSpecialEarlyBirdPriceForEventTopicWithSpecialEarlyBirdPriceReturnsTrue(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'price_special_early' => 42.42,
            ]
        );

        self::assertTrue(
            $this->subject->hasSpecialEarlyBirdPrice()
        );
    }

    /////////////////////////////////////////////
    // Tests regarding the special board price.
    /////////////////////////////////////////////

    /**
     * @test
     */
    public function getSpecialBoardPriceForEventTopicWithoutSpecialBoardPriceReturnsZero(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertEquals(
            0.00,
            $this->subject->getSpecialBoardPrice()
        );
    }

    /**
     * @test
     */
    public function getSpecialBoardPriceForEventTopicWithSpecialBoardPriceReturnsSpecialBoardPrice(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'price_special_board' => 42.42,
            ]
        );

        self::assertEquals(
            42.42,
            $this->subject->getSpecialBoardPrice()
        );
    }

    /**
     * @test
     */
    public function setSpecialBoardPriceForEventTopicWithZeroSpecialBoardPriceSetsSpecialBoardPrice(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setSpecialBoardPrice(0.00);

        self::assertEquals(
            0.00,
            $this->subject->getSpecialBoardPrice()
        );
    }

    /**
     * @test
     */
    public function setSpecialBoardPriceForEventTopicWithPositiveSpecialBoardPriceSetsSpecialBoardPrice(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setSpecialBoardPrice(42.42);

        self::assertEquals(
            42.42,
            $this->subject->getSpecialBoardPrice()
        );
    }

    /**
     * @test
     */
    public function hasSpecialBoardPriceForEventTopicWithoutSpecialBoardPriceReturnsFalse(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertFalse(
            $this->subject->hasSpecialBoardPrice()
        );
    }

    /**
     * @test
     */
    public function hasSpecialBoardPriceForEventTopicWithSpecialBoardPriceReturnsTrue(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setSpecialBoardPrice(42.42);

        self::assertTrue(
            $this->subject->hasSpecialBoardPrice()
        );
    }

    ////////////////////////////////////////////////
    // Tests regarding the additional information.
    ////////////////////////////////////////////////

    /**
     * @test
     */
    public function getAdditionalInformationForEventTopicWithoutAdditionalInformationReturnsEmptyString(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertEquals(
            '',
            $this->subject->getAdditionalInformation()
        );
    }

    /**
     * @test
     */
    public function getAdditionalInformationForEventTopicWithAdditionalInformationReturnsAdditionalInformation(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'additional_information' => 'this is good to know',
            ]
        );

        self::assertEquals(
            'this is good to know',
            $this->subject->getAdditionalInformation()
        );
    }

    /**
     * @test
     */
    public function setAdditionalInformationForEventTopicSetsAdditionalInformation(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setAdditionalInformation('this is good to know');

        self::assertEquals(
            'this is good to know',
            $this->subject->getAdditionalInformation()
        );
    }

    /**
     * @test
     */
    public function hasAdditionalInformationForEventTopicWithoutAdditionalInformationReturnsFalse(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertFalse(
            $this->subject->hasAdditionalInformation()
        );
    }

    /**
     * @test
     */
    public function hasAdditionalInformationForEventTopicWithAdditionalInformationReturnsTrue(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'additional_information' => 'this is good to know',
            ]
        );

        self::assertTrue(
            $this->subject->hasAdditionalInformation()
        );
    }

    //////////////////////////////////////////////////
    // Tests regarding allowsMultipleRegistration().
    //////////////////////////////////////////////////

    /**
     * @test
     */
    public function allowsMultipleRegistrationForEventTopicWithUnsetAllowsMultipleRegistrationReturnsFalse(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertFalse(
            $this->subject->allowsMultipleRegistrations()
        );
    }

    /**
     * @test
     */
    public function allowsMultipleRegistrationForEventTopicWithSetAllowsMultipleRegistrationReturnsTrue(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'allows_multiple_registrations' => true,
            ]
        );

        self::assertTrue(
            $this->subject->allowsMultipleRegistrations()
        );
    }

    //////////////////////////////////
    // Tests regarding usesTerms2().
    //////////////////////////////////

    /**
     * @test
     */
    public function usesTerms2ForEventTopicWithUnsetUseTerms2ReturnsFalse(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertFalse(
            $this->subject->usesTerms2()
        );
    }

    /**
     * @test
     */
    public function usesTerms2ForEventTopicWithSetUseTerms2ReturnsTrue(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'use_terms_2' => true,
            ]
        );

        self::assertTrue(
            $this->subject->usesTerms2()
        );
    }

    ///////////////////////////////
    // Tests regarding the notes.
    ///////////////////////////////

    /**
     * @test
     */
    public function getNotesForEventTopicWithoutNotesReturnsEmptyString(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertEquals(
            '',
            $this->subject->getNotes()
        );
    }

    /**
     * @test
     */
    public function getNotesForEventTopicWithNotesReturnsNotes(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'notes' => 'Don\'t forget this.',
            ]
        );

        self::assertEquals(
            'Don\'t forget this.',
            $this->subject->getNotes()
        );
    }

    /**
     * @test
     */
    public function setNotesForEventTopicSetsNotes(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setNotes('Don\'t forget this.');

        self::assertEquals(
            'Don\'t forget this.',
            $this->subject->getNotes()
        );
    }

    /**
     * @test
     */
    public function hasNotesForEventTopicWithoutNotesReturnsFalse(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertFalse(
            $this->subject->hasNotes()
        );
    }

    /**
     * @test
     */
    public function hasNotesForEventTopicWithNotesReturnsTrue(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'notes' => 'Don\'t forget this.',
            ]
        );

        self::assertTrue(
            $this->subject->hasNotes()
        );
    }

    ///////////////////////////////
    // Tests regarding the image.
    ///////////////////////////////

    /**
     * @test
     */
    public function getImageForEventTopicWithoutImageReturnsEmptyString(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertEquals(
            '',
            $this->subject->getImage()
        );
    }

    /**
     * @test
     */
    public function getImageForEventTopicWithImageReturnsImage(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'image' => 'file.jpg',
            ]
        );

        self::assertEquals(
            'file.jpg',
            $this->subject->getImage()
        );
    }

    /**
     * @test
     */
    public function setImageForEventTopicSetsImage(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );
        $this->subject->setImage('file.jpg');

        self::assertEquals(
            'file.jpg',
            $this->subject->getImage()
        );
    }

    /**
     * @test
     */
    public function hasImageForEventTopicWithoutImageReturnsFalse(): void
    {
        $this->subject->setData(
            ['object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC]
        );

        self::assertFalse(
            $this->subject->hasImage()
        );
    }

    /**
     * @test
     */
    public function hasImageForEventTopicWithImageReturnsTrue(): void
    {
        $this->subject->setData(
            [
                'object_type' => \Tx_Seminars_Model_Event::TYPE_TOPIC,
                'image' => 'file.jpg',
            ]
        );

        self::assertTrue(
            $this->subject->hasImage()
        );
    }

    ///////////////////////////////////////
    // Tests concerning hasEarlyBirdPrice
    ///////////////////////////////////////

    /**
     * @test
     */
    public function hasEarlyBirdPriceForNoDeadlineAndAllPricesSetReturnsFalse(): void
    {
        $this->subject->setData(
            [
                'deadline_early_bird' => 0,
                'price_regular' => 1.000,
                'price_regular_early' => 1.000,
                'price_special' => 1.000,
                'price_special_early' => 1.000,
            ]
        );

        self::assertFalse(
            $this->subject->hasEarlyBirdPrice()
        );
    }

    /**
     * @test
     */
    public function hasEarlyBirdPriceForDeadlineAndAllPricesSetReturnsTrue(): void
    {
        $this->subject->setData(
            [
                'deadline_early_bird' => 1234,
                'price_regular' => 1.000,
                'price_regular_early' => 1.000,
                'price_special' => 1.000,
                'price_special_early' => 1.000,
            ]
        );

        self::assertTrue(
            $this->subject->hasEarlyBirdPrice()
        );
    }

    /**
     * @test
     */
    public function hasEarlyBirdPriceForDeadlinAndAllRegularPricesSetReturnsTrue(): void
    {
        $this->subject->setData(
            [
                'deadline_early_bird' => 1234,
                'price_regular' => 1.000,
                'price_regular_early' => 1.000,
            ]
        );

        self::assertTrue(
            $this->subject->hasEarlyBirdPrice()
        );
    }

    /**
     * @test
     */
    public function hasEarlyBirdPriceForDeadlineAndRegularPriceAndAllSpecialPricesSetReturnsFalse(): void
    {
        $this->subject->setData(
            [
                'deadline_early_bird' => 1234,
                'price_regular' => 1.000,
                'price_special' => 1.000,
                'price_special_early' => 1.000,
            ]
        );

        self::assertFalse(
            $this->subject->hasEarlyBirdPrice()
        );
    }

    /**
     * @test
     */
    public function hasEarlyBirdPriceForDeadlineAndNoRegularPriceAndAllSpecialPricesSetReturnsFalse(): void
    {
        $this->subject->setData(
            [
                'deadline_early_bird' => 1234,
                'price_special' => 1.000,
                'price_special_early' => 1.000,
            ]
        );

        self::assertFalse(
            $this->subject->hasEarlyBirdPrice()
        );
    }

    /**
     * @test
     */
    public function hasEarlyBirdPriceForDeadlineAndOnlyEarlyBirdPricesSetReturnsFalse(): void
    {
        $this->subject->setData(
            [
                'deadline_early_bird' => 1234,
                'price_regular_early' => 1.000,
                'price_special_early' => 1.000,
            ]
        );

        self::assertFalse(
            $this->subject->hasEarlyBirdPrice()
        );
    }

    /////////////////////////////////////////////
    // Tests concerning isEarlyBirdDeadlineOver
    /////////////////////////////////////////////

    /**
     * @test
     */
    public function isEarlyBirdDeadlineOverForNoEarlyBirdDeadlineReturnsTrue(): void
    {
        $this->subject->setData([]);

        self::assertTrue(
            $this->subject->isEarlyBirdDeadlineOver()
        );
    }

    /**
     * @test
     */
    public function isEarlyBirdDeadlineOverForEarlyBirdDeadlineInPastReturnsTrue(): void
    {
        $this->subject->setData(
            ['deadline_early_bird' => $GLOBALS['SIM_EXEC_TIME'] - 1]
        );

        self::assertTrue(
            $this->subject->isEarlyBirdDeadlineOver()
        );
    }

    /**
     * @test
     */
    public function isEarlyBirdDeadlineOverForEarlyBirdDeadlineNowReturnsTrue(): void
    {
        $this->subject->setData(
            ['deadline_early_bird' => $GLOBALS['SIM_EXEC_TIME']]
        );

        self::assertTrue(
            $this->subject->isEarlyBirdDeadlineOver()
        );
    }

    /**
     * @test
     */
    public function isEarlyBirdDeadlineOverForEarlyBirdDeadlineInFutureReturnsFalse(): void
    {
        $this->subject->setData(
            ['deadline_early_bird' => $GLOBALS['SIM_EXEC_TIME'] + 1]
        );

        self::assertFalse(
            $this->subject->isEarlyBirdDeadlineOver()
        );
    }

    //////////////////////////////////////
    // Tests concerning earlyBirdApplies
    //////////////////////////////////////

    /**
     * @test
     */
    public function earlyBirdAppliesForNoEarlyBirdPriceAndDeadlineOverReturnsFalse(): void
    {
        /** @var \Tx_Seminars_Model_Event&MockObject $subject */
        $subject = $this->createPartialMock(
            \Tx_Seminars_Model_Event::class,
            ['hasEarlyBirdPrice', 'isEarlyBirdDeadlineOver']
        );
        $subject->method('hasEarlyBirdPrice')
            ->willReturn(false);
        $subject->method('isEarlyBirdDeadlineOver')
            ->willReturn(true);

        self::assertFalse(
            $subject->earlyBirdApplies()
        );
    }

    /**
     * @test
     */
    public function earlyBirdAppliesForEarlyBirdPriceAndDeadlineOverReturnsFalse(): void
    {
        /** @var \Tx_Seminars_Model_Event&MockObject $subject */
        $subject = $this->createPartialMock(
            \Tx_Seminars_Model_Event::class,
            ['hasEarlyBirdPrice', 'isEarlyBirdDeadlineOver']
        );
        $subject->method('hasEarlyBirdPrice')
            ->willReturn(true);
        $subject->method('isEarlyBirdDeadlineOver')
            ->willReturn(true);

        self::assertFalse(
            $subject->earlyBirdApplies()
        );
    }

    /**
     * @test
     */
    public function earlyBirdAppliesForEarlyBirdPriceAndDeadlineNotOverReturnsTrue(): void
    {
        /** @var \Tx_Seminars_Model_Event&MockObject $subject */
        $subject = $this->createPartialMock(
            \Tx_Seminars_Model_Event::class,
            ['hasEarlyBirdPrice', 'isEarlyBirdDeadlineOver']
        );
        $subject->method('hasEarlyBirdPrice')
            ->willReturn(true);
        $subject->method('isEarlyBirdDeadlineOver')
            ->willReturn(false);

        self::assertTrue(
            $subject->earlyBirdApplies()
        );
    }

    ////////////////////////////////////////
    // Tests concerning getAvailablePrices
    ////////////////////////////////////////

    /**
     * @test
     */
    public function getAvailablePricesForNoPricesSetAndNoEarlyBirdReturnsZeroRegularPrice(): void
    {
        /** @var \Tx_Seminars_Model_Event&MockObject $subject */
        $subject = $this->createPartialMock(
            \Tx_Seminars_Model_Event::class,
            ['earlyBirdApplies']
        );
        $subject->method('earlyBirdApplies')
            ->willReturn(false);
        $subject->setData([]);

        self::assertEquals(
            ['regular' => 0.000],
            $subject->getAvailablePrices()
        );
    }

    /**
     * @test
     */
    public function getAvailablePricesForRegularPriceSetAndNoEarlyBirdReturnsRegularPrice(): void
    {
        /** @var \Tx_Seminars_Model_Event&MockObject $subject */
        $subject = $this->createPartialMock(
            \Tx_Seminars_Model_Event::class,
            ['earlyBirdApplies']
        );
        $subject->method('earlyBirdApplies')
            ->willReturn(false);
        $subject->setData(['price_regular' => 12.345]);

        self::assertEquals(
            ['regular' => 12.345],
            $subject->getAvailablePrices()
        );
    }

    /**
     * @test
     */
    public function getAvailablePricesForRegularEarlyBirdPriceSetAndEarlyBirdReturnsEarlyBirdPrice(): void
    {
        /** @var \Tx_Seminars_Model_Event&MockObject $subject */
        $subject = $this->createPartialMock(
            \Tx_Seminars_Model_Event::class,
            ['earlyBirdApplies']
        );
        $subject->method('earlyBirdApplies')
            ->willReturn(true);
        $subject->setData(
            [
                'price_regular' => 12.345,
                'price_regular_early' => 23.456,
            ]
        );

        self::assertEquals(
            ['regular_early' => 23.456],
            $subject->getAvailablePrices()
        );
    }

    /**
     * @test
     */
    public function getAvailablePricesForRegularEarlyBirdPriceSetAndNoEarlyBirdReturnsRegularPrice(): void
    {
        /** @var \Tx_Seminars_Model_Event&MockObject $subject */
        $subject = $this->createPartialMock(
            \Tx_Seminars_Model_Event::class,
            ['earlyBirdApplies']
        );
        $subject->method('earlyBirdApplies')
            ->willReturn(false);
        $subject->setData(
            [
                'price_regular' => 12.345,
                'price_regular_early' => 23.456,
            ]
        );

        self::assertEquals(
            ['regular' => 12.345],
            $subject->getAvailablePrices()
        );
    }

    /**
     * @test
     */
    public function getAvailablePricesForRegularBoardPriceSetAndNoEarlyBirdReturnsRegularBoardPrice(): void
    {
        /** @var \Tx_Seminars_Model_Event&MockObject $subject */
        $subject = $this->createPartialMock(
            \Tx_Seminars_Model_Event::class,
            ['earlyBirdApplies']
        );
        $subject->method('earlyBirdApplies')
            ->willReturn(false);
        $subject->setData(
            [
                'price_regular_board' => 23.456,
            ]
        );

        self::assertEquals(
            [
                'regular' => 0.000,
                'regular_board' => 23.456,
            ],
            $subject->getAvailablePrices()
        );
    }

    /**
     * @test
     */
    public function getAvailablePricesForSpecialBoardPriceSetAndNoEarlyBirdReturnsSpecialBoardPrice(): void
    {
        /** @var \Tx_Seminars_Model_Event&MockObject $subject */
        $subject = $this->createPartialMock(
            \Tx_Seminars_Model_Event::class,
            ['earlyBirdApplies']
        );
        $subject->method('earlyBirdApplies')
            ->willReturn(false);
        $subject->setData(
            [
                'price_special_board' => 23.456,
            ]
        );

        self::assertEquals(
            [
                'regular' => 0.000,
                'special_board' => 23.456,
            ],
            $subject->getAvailablePrices()
        );
    }

    /**
     * @test
     */
    public function getAvailablePricesForSpecialPriceSetAndNoEarlyBirdReturnsSpecialPrice(): void
    {
        /** @var \Tx_Seminars_Model_Event&MockObject $subject */
        $subject = $this->createPartialMock(
            \Tx_Seminars_Model_Event::class,
            ['earlyBirdApplies']
        );
        $subject->method('earlyBirdApplies')
            ->willReturn(false);
        $subject->setData(['price_special' => 12.345]);

        self::assertEquals(
            [
                'regular' => 0.000,
                'special' => 12.345,
            ],
            $subject->getAvailablePrices()
        );
    }

    /**
     * @test
     */
    public function getAvailablePricesForSpecialPriceSetAndSpecialEarlyBirdPriceSetAndEarlyBirdReturnsSpecialEarlyBirdPrice(): void
    {
        /** @var \Tx_Seminars_Model_Event&MockObject $subject */
        $subject = $this->createPartialMock(
            \Tx_Seminars_Model_Event::class,
            ['earlyBirdApplies']
        );
        $subject->method('earlyBirdApplies')
            ->willReturn(true);
        $subject->setData(
            [
                'price_special' => 34.567,
                'price_special_early' => 23.456,
            ]
        );

        self::assertEquals(
            [
                'regular' => 0.000,
                'special_early' => 23.456,
            ],
            $subject->getAvailablePrices()
        );
    }

    /**
     * @test
     */
    public function getAvailablePricesForNoSpecialPriceSetAndSpecialEarlyBirdPriceSetAndEarlyBirdNotReturnsSpecialEarlyBirdPrice(): void
    {
        /** @var \Tx_Seminars_Model_Event&MockObject $subject */
        $subject = $this->createPartialMock(
            \Tx_Seminars_Model_Event::class,
            ['earlyBirdApplies']
        );
        $subject->method('earlyBirdApplies')
            ->willReturn(true);
        $subject->setData(
            [
                'price_regular' => 34.567,
                'price_special_early' => 23.456,
            ]
        );

        self::assertEquals(
            ['regular' => 34.567],
            $subject->getAvailablePrices()
        );
    }

    /**
     * @test
     */
    public function getAvailablePricesForSpecialPriceSetAndSpecialEarlyBirdPriceSetAndNoEarlyBirdReturnsSpecialPrice(): void
    {
        /** @var \Tx_Seminars_Model_Event&MockObject $subject */
        $subject = $this->createPartialMock(
            \Tx_Seminars_Model_Event::class,
            ['earlyBirdApplies']
        );
        $subject->method('earlyBirdApplies')
            ->willReturn(false);
        $subject->setData(
            [
                'price_special' => 34.567,
                'price_special_early' => 23.456,
            ]
        );

        self::assertEquals(
            [
                'regular' => 0.000,
                'special' => 34.567,
            ],
            $subject->getAvailablePrices()
        );
    }

    /////////////////////////////////////////
    // Tests concerning the payment methods
    /////////////////////////////////////////

    /**
     * @test
     */
    public function setPaymentMethodsSetsPaymentMethods(): void
    {
        $this->subject->setData([]);

        /** @var Collection<\Tx_Seminars_Model_PaymentMethod> $paymentMethods */
        $paymentMethods = new Collection();
        $this->subject->setPaymentMethods($paymentMethods);

        self::assertSame(
            $paymentMethods,
            $this->subject->getPaymentMethods()
        );
    }
}
