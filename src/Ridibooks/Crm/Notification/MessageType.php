<?php
declare(strict_types=1);

namespace Ridibooks\Crm\Notification;

class MessageType
{
    const NONE = 'none';
    const COUPON = 'coupon';
    const COUPON_EXPIRE = 'coupon_expire';
    const PERIOD_POINT_EXPIRE = 'period_point_expire';
    const DEAL_START_BOOK = 'deal_start_book';
    const DEAL_END_BOOK = 'deal_end_book';
    const SERIES_NEW_BOOK = 'series_new_book';
    const RENT_BOOK_EXPIRE = 'rent_book_expire';
    const FLATRATE_TICKET_EXPIRE = 'flatrate_ticket_expire';
    const CMS = 'cms';
    const REMIND_BOOK = 'remind_book';
    const CART_REMIND_BOOK = 'cart_remind_book';
    const EVENT_BOOK = 'event_book';
    const AUTHOR_NEW_BOOK = 'author_new_book';
    const REVIEW_COMMENT_REGISTER = 'review_comment_register';
    const REVIEW_INVISIBLE = 'review_invisible';
    const DEPOSIT = 'deposit';
    const BEST_FREE_BOOK = 'best_free_book';
    const CS_REPLY = 'cs_reply';
    const UNGIFTABLE = 'ungiftable';
    const PERIODIC_CASH = 'periodic_cash';
    const GIFT = 'gift';
    const RIDISTORY_MIGRATION = 'ridistory_migration';
}
