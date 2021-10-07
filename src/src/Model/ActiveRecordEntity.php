<?php
namespace Model;
use Model\Content;


abstract class ActiveRecordEntity
{

    public function __set(string $name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }
    /**
     * @return static[]
     */
    public static function findAll() : array
    {
        $db = new Content();
        $res=$db->conn->query('SELECT * FROM `' . static::getTableName() . '`')->fetch_assoc();
        return $res;
    }

    public static function sendText($content) : void
    {
        $row=static::findAll();
        $db = new Content();
        $txt=htmlspecialchars($content);
        if($row!=null)
        {
            $id=$row['id'];
            $sql='UPDATE `'. static::getTableName() .'` SET text_content="'.$txt.'" WHERE id='.$id;
        }
        else{
            $sql = '"INSERT INTO `'.static::getTableName().'` (text_content) VALUES ('.$txt.')"';
        }
        $db->conn->query($sql);
    }

    abstract protected static function getTableName(): string;
}
