<?php
declare(strict_types=1);

namespace Ridibooks\Crm\Notification;

class Type
{
    // tb_notification_type 에서 관리하는 알림/DM type
    const FANTASY_DAILY_BEST = 2;
    const ROMANCE_DAILY_BEST = 3;
    const ROMANCE_CLOSING_BOOK = 5;
    const EXTRACT_WINNER = 14;
    const ROMANCE_ETC = 28;
    const FANTASY_ETC = 29;
    const REGULAR_DM_GENERAL = 32;
    const REGULAR_DM_ROMANCE = 33;
    const REGULAR_DM_FANTASY = 34;
    const REGULAR_DM_COMIC = 35;
    const FANTASY_WEEKLY_POPULAR = 49;

    const FIFTEEN_NIGHT_POINT = 47;
    const DORMANT_POINT = 48;
    const GENERAL_CLOSING_BOOK = 50;
    const FANTASY_CLOSING_BOOK = 51;
    const COMIC_CLOSING_BOOK = 52;

    /**
     * @param int $notification_type
     * @return bool
     */
    public static function isRegularDm(int $notification_type)
    {
        $regular_dm_noti_types = [
            self::REGULAR_DM_GENERAL,
            self::REGULAR_DM_ROMANCE,
            self::REGULAR_DM_FANTASY,
            self::REGULAR_DM_COMIC
        ];

        return in_array($notification_type, $regular_dm_noti_types);
    }
}
