<?php
declare(strict_types=1);

namespace Ridibooks\Crm\Notification;

class IconType
{
    const DEFAULT = 0;
    const COUPON = 1;
    const VOUCHER_EXPIRE = 2;
    const PERIOD_POINT_PROVIDE = 3;
    const PERIOD_POINT_EXPIRE = 4;
    const DISCOUNT_START = 5;
    const SUCCEED = 6;
    const FREE = 7;
    const CS = 8;
    const BROWN_ALERT = 9;
    const PERIODIC_CASH_RECUR = 10;
    const PERIODIC_CASH_FAIL = 11;

    const BL = 33;
    const TL = 34;
    const HD = 35;
    const DISCOUNT_B = 36;
    const DISCOUNT_P = 37;
    const DISCOUNT_Y = 38;
    const EVENT = 39;

    const RIDISTORY = 64;

    /**
     * @param int $icon_type
     * @return string
     */
    public static function getIconUrlByIconType(int $icon_type)
    {
        $icon_url = [
            self::DEFAULT => '/ridibooks_noti_icon/icon_noti_default.png',
            self::COUPON => '/ridibooks_noti_icon/icon_noti_coupon.png',
            self::VOUCHER_EXPIRE => '/ridibooks_noti_icon/icon_noti_voucher_expire.png',
            self::PERIOD_POINT_PROVIDE => '/ridibooks_noti_icon/icon_noti_point.png',
            self::PERIOD_POINT_EXPIRE => '/ridibooks_noti_icon/icon_noti_point_alert.png',
            self::DISCOUNT_START => '/ridibooks_noti_icon/icon_noti_discount_approaching.png',
            self::SUCCEED => '/ridibooks_noti_icon/icon_noti_succeed.png',
            self::FREE => '/ridibooks_noti_icon/icon_noti_free.png',
            self::CS => '/ridibooks_noti_icon/icon_noti_cs.jpg',
            self::BROWN_ALERT => '/ridibooks_noti_icon/icon_noti_brown_alert.png',
            self::PERIODIC_CASH_RECUR => '/ridibooks_noti_icon/icon_noti_point.png',
            self::PERIODIC_CASH_FAIL => '/ridibooks_noti_icon/icon_noti_point_alert.png',
            self::BL => '/ridibooks_noti_icon/icon_noti_bl.png',
            self::TL => '/ridibooks_noti_icon/icon_noti_tl.png',
            self::HD => '/ridibooks_noti_icon/icon_noti_hd.png',
            self::DISCOUNT_B => '/ridibooks_noti_icon/icon_noti_discount_b.png',
            self::DISCOUNT_P => '/ridibooks_noti_icon/icon_noti_discount_p.png',
            self::DISCOUNT_Y => '/ridibooks_noti_icon/icon_noti_discount_y.png',
            self::EVENT => '/ridibooks_noti_icon/icon_noti_event.png',
            self::RIDISTORY => '/ridibooks_noti_icon/RIDISTORY.png'
        ];

        if (!isset($icon_url[$icon_type])) {
            $icon_type = self::DEFAULT;
        }

        return 'https://active.ridibooks.com' . $icon_url[$icon_type];
    }
}
