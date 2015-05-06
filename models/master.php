<?php

namespace Models;

class Master_Model
{
    protected $table;
    protected $limit = 10;
    protected $db;

    public function __construct($args = array())
    {
        $default = array(
            'limit' => 0
        );

        $args = array_merge($default, $args);

        if (!isset($args['table'])) {
            die('Table not defined');
        }

        extract($args);

        $this->table = $table;
        $this->limit = $limit;

        $db_object = \Lib\Database::get_instance();
        $this->db = $db_object::get_db();
    }

    public function find($args = array())
    {
        $defaults = array(
            'table' => $this->table,
            'limit' => $this->limit,
            'where' => '',
            'columns' => '*'
        );

        $args = array_merge($defaults, $args);
        extract($args);
        $query = "SELECT {$columns} FROM {$table}";

        if (!empty($where)) {
            $query .= " WHERE $where";
        }
        if (!empty($limit)) {
            $query .= " LIMIT $limit";
        }

        $result_set = $this->db->query($query);

        $results = $this->process_results($result_set);
//        var_dump($query);
        return $results;
    }

    public function get_comments($id)
    {
        $this->table = 'comments';
        return $this->find(array('where' => 'post_id=' . $id));
    }

    public function get_by_id($id)
    {
        return $this->find(array('where' => 'id=' . $id));
    }

    public function get_by_title($title)
    {
        return $this->find(array('where' => "title='" . $title . "'"));
    }

    public function get_user_by_username($name)
    {
        return $this->find(array('where' => "username='" . $name . "'"));
    }

    public function add($element)
    {
        $element['user_id'] = $_SESSION['user_id'];

        $keys = array_keys($element);
        $values = array();

        foreach ($element as $key => $value) {
            $values[] = '"' . $this->db->real_escape_string($value) . '"';
        }

        $keys = implode($keys, ', ');
        $valuesQuery = implode($values, ', ');
        $query = "INSERT INTO {$this->table}($keys) VALUES($valuesQuery)";
        $this->db->query($query);

        return $this->db->affected_rows;
    }

    public function update($element)
    {
        if (!isset($element['id'])) {
            die('Wrong model');
        }

        $query = "UPDATE {$this->table} SET ";

        foreach ($element as $key => $value) {
            if ($key === 'id') {
                continue;
            }
            $query .= "$key = '" . $this->db->real_escape_string($value) . "',";
        }
        $query = rtrim($query, ',');

        $query .= "WHERE id = {$element['id']}";

        $this->db->query($query);

        return $this->db->affected_rows;
    }

    public function delete_by_id($id)
    {
        $query = "DELETE FROM `blog`.`{$this->table}` WHERE `id`= " . $this->db->real_escape_string($id);
        $this->db->query($query);
        return $this->db->affected_rows;
    }


    protected function process_results($result_set)
    {
        $results = array();

        if (!empty($result_set) && $result_set->num_rows > 0) {
            while ($row = $result_set->fetch_assoc()) {
                $results[] = $row;
            }
        }

        return $results;
    }
}