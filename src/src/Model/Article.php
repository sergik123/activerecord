<?php

namespace Model;
use Model\Content;
class Article extends ActiveRecordEntity
{
    protected static function getTableName(): string
    {
        return 'content';
    }
}
