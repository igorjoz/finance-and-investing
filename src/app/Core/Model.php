<?php
require_once 'Database.php';

abstract class Model
{
    protected $id;

    protected function serialize()
    {
        $object = [
            '_id' => new MongoDB\BSON\ObjectId($this->id)
            // '_id' => new MongoDB($this->id)
        ];
        return $object;
    }

    abstract static protected function deserialize($object);

    public function save()
    {
        if (isset($this->id)) {
            static::getCollection()->updateOne(
                ['_id' => new MongoDB\BSON\ObjectId($this->id)],
                ['$set' => $this->serialize()]
            );
        } else {
            $result = static::getCollection()->insertOne($this->serialize());
            $this->id = $result->getInsertedId();
        }
    }

    static public function get($query = [])
    {
        $object = static::getCollection()->findOne($query);
        if ($object) {
            return static::deserialize($object);
        } else {
            return null;
        }
    }
    static public function getAll($query = [])
    {
        $cursor = static::getCollection()->find($query);

        $objects = [];
        foreach ($cursor as $object) {
            array_push($objects, static::deserialize($object));
        }

        return $objects;
    }

    public function id()
    {
        return $this->id;
    }

    static private function getCollection()
    {
        $collectionName = strtolower(get_called_class()) . 's';
        return Database::get()->$collectionName;
    }
}