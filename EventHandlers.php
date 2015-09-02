<?php

/**
 * @link https://github.com/bitrix-expert/tools
 * @license MIT
 */

namespace Bex\Tools;

class EventHandlers
{
    const CACHE_TAG_GROUP = 'group_tools_cache';

    /**
     * ���������� ����� �������� ������ �������������
     * @param $id
     */
    public static function onGroupDeleteHandler($id)
    {
        static::deleteGroupCache();
    }

    /**
     * ���������� ����� ���������� ������ �������������
     * @param $arFields
     */
    public static function onAfterGroupAddHandler($arFields)
    {
        static::deleteGroupCache();
    }

    /**
     * ���������� ����� ���������� ������ �������������
     * @param $id
     * @param $arFields
     */
    public static function onAfterGroupUpdateHandler($id, $arFields)
    {
        static::deleteGroupCache();
    }

    protected static function deleteGroupCache()
    {
        global $CACHE_MANAGER;

        if(defined('BX_COMP_MANAGED_CACHE'))
            $CACHE_MANAGER->ClearByTag(static::CACHE_TAG_GROUP);
    }
}