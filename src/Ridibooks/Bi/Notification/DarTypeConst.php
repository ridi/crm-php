<?php

namespace Ridibooks\Bi\Notification;

class DarTypeConst
{
    const DAR_TYPE_NOTIFICATION_CENTER_MESSAGE = 'noti';
    const DAR_TYPE_APP_PUSH = 'push';
    const DAR_TYPE_DIRECT_MAIL = 'dm';

    // ICON
    const ICON_DEFAULT = 1;
    const ICON_COUPON = 2;
    const ICON_CONGRATULATION = 3;
    const ICON_X2 = 4;
    const ICON_15YA = 5;
    const ICON_DISCOUNT_APPROACHING = 6;
    const ICON_DISCOUNT = 7;
    const ICON_UPDATE = 8;
    const ICON_VOUCHER_EXPIRE = 9;
    const ICON_19 = 10;

    const ICON_FREE = 11;
    const ICON_RIDIONLY = 12;
    const ICON_RIDISHOP = 13;
    const ICON_RIDISTORY = 14;
    const ICON_DAILY_BEST = 15;
    const ICON_70_PERCENT = 16;
    const ICON_CASHBACK = 17;
    const ICON_CROWN = 18;
    const ICON_HIGHLIGHTED = 19;
    const ICON_JUSTTODAY = 20;

    const ICON_NEW = 21;
    const ICON_NOW = 22;
    const ICON_RECOMMENDATION = 23;
    const ICON_QUESTIONMARK = 24;
    const ICON_CHICKEN = 25;
    const ICON_CHICKEN2 = 26;
    const ICON_NOTI18_BAN = 27;
    const ICON_POINT = 28;
    const ICON_POINT_ALERT = 29;
    const ICON_18ROCK = 30;

    const ICON_NINE = 31;
    const ICON_WEEKEND = 32;
    const ICON_BL = 33;
    const ICON_TL = 34;
    const ICON_HD = 35;
    const ICON_DISCOUNT_B = 36;
    const ICON_DISCOUNT_P = 37;
    const ICON_DISCOUNT_Y = 38;
    const ICON_EVENT = 39;
    const ICON_UPDATE_P = 40;

    const ICON_DISCOUNT_W_P = 41;
    const ICON_DISCOUNT_W_Y = 42;
    const ICON_DISCOUNT_W_B = 43;

    // tb_notification_type 에서 관리하는 알림/DM type
    const NOTI_ETC = 1;
    const DAR_TYPE_NOTI_FANTASY_DAILY_BEST = 2;
    const DAR_TYPE_NOTI_ROMANCE_DAILY_BEST = 3;
    const DAR_TYPE_NOTI_EXTRACT_WINNER = 14;
    const DAR_TYPE_NOTI_ROMANCE_ETC = 28;
    const DAR_TYPE_NOTI_FANTASY_ETC = 29;
    const DAR_TYPE_NOTI_FANTASY_WEEKLY_POPULAR = 49;

    const DAR_TYPE_NOTI_15YA_POINT = 47;
    const DAR_TYPE_NOTI_DORMANT_POINT = 48;

    const DAR_TYPE_NOTI_GENERAL_CLOSING_BOOK = 50;
    const DAR_TYPE_NOTI_ROMANCE_CLOSING_BOOK = 5;
    const DAR_TYPE_NOTI_FANTASY_CLOSING_BOOK = 51;
    const DAR_TYPE_NOTI_COMIC_CLOSING_BOOK = 52;

    const DAR_TYPE_NOTI_ROMANCE_REGULAR_PROMOTION = 63;
    const DAR_TYPE_NOTI_ETC_NEW_BOOK = 66;

    const DAR_TYPE_NOTI_GENERAL_NEW_BOOK = 82;
    const DAR_TYPE_NOTI_ROMANCE_NEW_BOOK = 83;
    const DAR_TYPE_NOTI_FANTASY_NEW_BOOK = 84;
    const DAR_TYPE_NOTI_COMIC_NEW_BOOK = 85;

    // DM
    const DAR_TYPE_DM_REGULAR_DM_GENERAL = 32;
    const DAR_TYPE_DM_REGULAR_DM_ROMANCE = 33;
    const DAR_TYPE_DM_REGULAR_DM_FANTASY = 34;
    const DAR_TYPE_DM_REGULAR_DM_COMIC = 35;
    const DAR_TYPE_DM_ETC_NEW_BOOK = 65;

    const DAR_TYPE_DM_GENERAL_NEW_BOOK = 78;
    const DAR_TYPE_DM_ROMANCE_NEW_BOOK = 79;
    const DAR_TYPE_DM_FANTASY_NEW_BOOK = 80;
    const DAR_TYPE_DM_COMIC_NEW_BOOK = 81;

    // Push
    const DAR_TYPE_PUSH_ETC = 57;
    const DAR_TYPE_PUSH_15YA_NOTICE = 64;
    const DAR_TYPE_PUSH_ETC_NEW_BOOK = 67;

    const DAR_TYPE_PUSH_GENERAL_NEW_BOOK = 86;
    const DAR_TYPE_PUSH_ROMANCE_NEW_BOOK = 87;
    const DAR_TYPE_PUSH_FANTASY_NEW_BOOK = 88;
    const DAR_TYPE_PUSH_COMIC_NEW_BOOK = 89;

    const PUSH_GENERAL_DOUBLE_POINT_START = 127;
    const PUSH_GENERAL_DOUBLE_POINT_END = 135;

    // 테스트발송 유저 그룹
    const DAR_TEST_USER_GROUP_NONE = 0;
    const DAR_TEST_USER_GROUP_ALL = 1;
    const DAR_TEST_USER_GROUP_GENERAL = 2;
    const DAR_TEST_USER_GROUP_ROMANCE = 3;
    const DAR_TEST_USER_GROUP_FANTASY = 4;
    const DAR_TEST_USER_GROUP_COMIC = 5;

    const FIXED_USER_SEGMENTATION_15YA_0_PUSH = 909;
    const FIXED_USER_SEGMENTATION_15YA_0 = 785;
    const FIXED_USER_SEGMENTATION_15YA_1 = 786;
    const FIXED_USER_SEGMENTATION_15YA_2 = 787;
    const FIXED_USER_SEGMENTATION_15YA_3 = 788;
    const FIXED_USER_SEGMENTATION_15YA_4 = 789;
    const FIXED_USER_SEGMENTATION_15YA_5 = 790;

    const TAG_TYPE_NONE = 'none';
    const TAG_TYPE_COUPON = 'coupon';
    const TAG_TYPE_COUPON_EXPIRE = 'coupon_expire';
    const TAG_TYPE_PERIOD_POINT_EXPIRE = 'period_point_expire';
    const TAG_TYPE_DEAL_START_BOOK = 'deal_start_book';
    const TAG_TYPE_DEAL_END_BOOK = 'deal_end_book';
    const TAG_TYPE_SERIES_NEW_BOOK = 'series_new_book';
    const TAG_TYPE_AUTHOR_NEW_BOOK = 'author_new_book';
    const TAG_TYPE_NEW_BOOK = 'new_book';
    const TAG_TYPE_CMS = 'cms';
    const TAG_TYPE_REMIND_BOOK = 'remind_book';
    const TAG_TYPE_CART_REMIND_BOOK = 'cart_remind_book';
    const TAG_TYPE_EVENT_BOOK = 'event_book';
    const TAG_TYPE_DEPOSIT = 'deposit';
    const TAG_TYPE_BEST_FREE_BOOK = 'best_free_book';
    const TAG_TYPE_CS_REPLY = 'cs_reply';
    const TAG_TYPE_UNGIFTABLE = 'ungiftable';
    const TAG_TYPE_PERIODIC_CASH = 'periodic_cash';
    const TAG_TYPE_RENT_BOOK_EXPIRE = 'rent_book_expire';
    const TAG_TYPE_FLATRATE_TICKET_EXPIRE = 'flatrate_ticket_expire';
    const TAG_TYPE_LAPSED_USER_COUPON = 'lapsed_user_coupon';
    const TAG_TYPE_NEW_ACCOUNT_COUPON = 'new_account_coupon';
    const TAG_TYPE_REVIEW_COMMENT_REGISTER = 'review_comment_register';
    const TAG_TYPE_REVIEW_INVISIBLE = 'review_invisible';

    const NOTIFICATION_CENTER_IMAGE_TYPE_BOOK = 'book';
    const NOTIFICATION_CENTER_IMAGE_TYPE_ICON = 'icon';
    const NOTIFICATION_CENTER_IMAGE_TYPE_ETC = 'etc';

    const ANDROID_PUSH_TYPE_OPEN_URL_IN_BROWSER = 'PUSH_TYPE_OPEN_URL_IN_BROWSER';

    public static function isRegularDm($notification_type)
    {
        $regular_dm_noti_types = [
            DarTypeConst::DAR_TYPE_DM_REGULAR_DM_GENERAL,
            DarTypeConst::DAR_TYPE_DM_REGULAR_DM_ROMANCE,
            DarTypeConst::DAR_TYPE_DM_REGULAR_DM_FANTASY,
            DarTypeConst::DAR_TYPE_DM_REGULAR_DM_COMIC
        ];

        return in_array($notification_type, $regular_dm_noti_types);
    }

    /**
     * @param $seq
     * @return int
     */
    public static function get15yaUserSegmentationIdBySeq($seq, $type)
    {
        if ($seq == 0) {
            if ($type === self::DAR_TYPE_APP_PUSH) {
                return self::FIXED_USER_SEGMENTATION_15YA_0_PUSH;
            } else {
                return self::FIXED_USER_SEGMENTATION_15YA_0;
            }
        } elseif ($seq == 1) {
            return self::FIXED_USER_SEGMENTATION_15YA_1;
        } elseif ($seq == 2) {
            return self::FIXED_USER_SEGMENTATION_15YA_2;
        } elseif ($seq == 3) {
            return self::FIXED_USER_SEGMENTATION_15YA_3;
        } elseif ($seq == 4) {
            return self::FIXED_USER_SEGMENTATION_15YA_4;
        } elseif ($seq == 5) {
            return self::FIXED_USER_SEGMENTATION_15YA_5;
        }

        return false;
    }
}
