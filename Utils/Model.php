<?php

namespace Model;

abstract class Model
{
    public $tableName = "";
    public $primaryKey = 'id';
    protected $columns = [];
    protected $foreignKeys = [];

    public function __construct()
    {
        $className = get_class($this);
        $this->tableName = strtolower($className);
        $this->initializeFields();
    }

    protected function initializeFields()
    {
        $reflect = new \ReflectionClass($this);
        $props = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);

        foreach ($props as $prop) {
            $name = $prop->getName();
            $docComment = $prop->getDocComment();

            if ($docComment) {
                preg_match('/@var ([a-zA-Z0-9_]+)/', $docComment, $matches);
                if (isset($matches[1])) {
                    $type = $matches[1];
                    $this->defineField($name, $type);
                }
            }
        }
    }

    protected function defineField($name, $type)
    {
        switch ($type) {
            case 'INT':
                $this->INT($name);
                break;
            case 'FLOAT':
                $this->FLOAT($name);
                break;
            case 'VARCHAR':
                $this->VARCHAR($name);
                break;
            case 'TEXT':
                $this->TEXT($name);
                break;
            case 'DATE':
                $this->DATE($name);
                break;
            case 'DATETIME':
                $this->DATETIME($name);
                break;
            case 'BOOLEAN':
                $this->BOOLEAN($name);
                break;
            default:
                throw new \Exception("Unsupported field type: $type");
        }
    }

    public function VARCHAR($name, $maxlen = 255)
    {
        $this->columns[$name] = "VARCHAR($maxlen)";
    }

    public function INT($name, $maxlen = 11)
    {
        $this->columns[$name] = "INT($maxlen)";
    }

    public function FLOAT($name)
    {
        $this->columns[$name] = "FLOAT";
    }

    public function TEXT($name)
    {
        $this->columns[$name] = "TEXT";
    }

    public function DATE($name)
    {
        $this->columns[$name] = "DATE";
    }

    public function DATETIME($name)
    {
        $this->columns[$name] = "DATETIME";
    }

    public function BOOLEAN($name)
    {
        $this->columns[$name] = "BOOLEAN";
    }

    public function FOREIGN_KEY($name, $referenceTable, $referenceField)
    {
        $this->columns[$name] = "INT";
        $this->foreignKeys[$name] = "FOREIGN KEY ($name) REFERENCES $referenceTable($referenceField)";
    }

    public function generateCreateTableSQL()
    {
        $sql = "CREATE TABLE {$this->tableName} (\n";
        $fields = [];
        foreach ($this->columns as $name => $type) {
            $fields[] = "$name $type";
        }

        $sql .= implode(",\n", $fields);

        if (!empty($this->foreignKeys)) {
            $foreignKeyDefinitions = implode(",\n", $this->foreignKeys);
            $sql .= ",\n" . $foreignKeyDefinitions;
        }

        $sql .= ",\nPRIMARY KEY ({$this->primaryKey})\n";
        $sql .= ");";
        return $sql;
    }
}
