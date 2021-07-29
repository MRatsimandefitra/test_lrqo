<?php

namespace App\Tests\Manager;

use App\Entity\Gift;
use App\Manager\GiftManager;
use App\Repository\GiftRepository;
use PHPUnit\Framework\TestCase;

class GiftManagerTest extends TestCase
{
    private $repository;

    public function setup():void {
        $this->repository = $this->createMock(GiftRepository::class);
    }
    public function testGetGiftByCsvRow(): void
    {
        $giftManager = new GiftManager($this->repository);

        $gift = new Gift();
        $row = [
            'gift_uuid' => 'xxxx',
            'gift_code' => 'code',
            'gift_price' => 20,
            'gift_description' => 'desc'
        ];
        $gift
            ->setGiftPrice($row['gift_price'])
            ->setGiftDescription($row['gift_description'])
            ->setGiftCode($row['gift_code'])
            ->setGiftUuid($row['gift_uuid']);

        $this->assertInstanceOf(Gift::class, $giftManager->getGiftByCsvRow($row));
        $this->assertEquals($row['gift_uuid'], $giftManager->getGiftByCsvRow($row)->getGiftUuid());
        $this->assertEquals($row['gift_code'], $giftManager->getGiftByCsvRow($row)->getGiftCode());
        $this->assertEquals($row['gift_price'], $giftManager->getGiftByCsvRow($row)->getGiftPrice());
        $this->assertEquals($row['gift_description'], $giftManager->getGiftByCsvRow($row)->getGiftDescription());
    }
}
