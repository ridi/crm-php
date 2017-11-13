<?php

namespace Ridibooks\Bi\Crm\RegularCoupon;

abstract class RegularComicRentCouponConstant
{
	const COMIC_RENT_COUPON_1 = '주말의 만화 대여 쿠폰 1';
	const COMIC_RENT_COUPON_2 = '주말의 만화 대여 쿠폰 2';
	const COMIC_RENT_COUPON_3 = '주말의 만화 대여 쿠폰 3';
	const COMIC_RENT_COUPON_4 = '주말의 만화 대여 쿠폰 4';

	const ISSUABLE_COMIC_RENT_COUPONS = [
		self::COMIC_RENT_COUPON_1,
		self::COMIC_RENT_COUPON_2,
		self::COMIC_RENT_COUPON_3,
		self::COMIC_RENT_COUPON_4,
	];

	const COUPON_VALUE_MAP = [
		self::COMIC_RENT_COUPON_1 => [
			'value' => 1000,
			'value2' => 200,
		],
		self::COMIC_RENT_COUPON_2 => [
			'value' => 2000,
			'value2' => 500,
		],
		self::COMIC_RENT_COUPON_3 => [
			'value' => 5000,
			'value2' => 1000,
		],
		self::COMIC_RENT_COUPON_4 => [
			'value' => 10000,
			'value2' => 2000,
		],
	];
}
