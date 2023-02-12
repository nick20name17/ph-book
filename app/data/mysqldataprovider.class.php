<?php

class MySqlDataProvider extends DataProvider  {
    public function get_terms() {
        return $this->query('SELECT * FROM people');
    }
    
    public function get_term($name) {
        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $sql = 'SELECT * FROM people WHERE id = :id';
        $smt = $db->prepare($sql);

        $smt->execute([
            ':id' => $name,
        ]);

        $data = $smt->fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        $smt = null;
        $db = null;

        if (empty($data)) {
            return;
        }

        return $data[0];
    }
    
    public function search_terms($search) {
        return $this->query(
            'SELECT * FROM people WHERE name LIKE :search OR surname LIKE :search',
            [':search' => '%'.$search.'%']
        );
    }
    
    public function add_term($name, $surname, $number, $comment) {
        $this->execute(
            'INSERT INTO people (name, surname, number, comment) VALUES (:name, :surname, :number, :comment)',
            [
                ':name' => $name,
                ':surname' => $surname,
                ':number' => $number,
                ':comment' => $comment
            ]
        );
    }
    
    public function update($original, $new_name, $new_surname, $new_number, $new_comment) {
        $this->execute(
            'UPDATE people SET name = :name, surname = :surname, number = :number, comment = :comment WHERE id = :id',
            [
                ':name' => $new_name,
                ':surname' => $new_surname,
                ':number' => $new_number,
                ':comment' => $new_comment,
                ':id' => $original
            ]
        );
    }
    
    public function delete_term($item) {
        $this->execute(
            'DELETE FROM people WHERE id = :id',
            [':id' => $item]
        );
    }

    private function query($sql, $sql_parms = []) {
        $db = $this->connect();

        if ($db == null) {
            return [];
        }

        $query = null;

        if (empty($sql_parms)) {
            $query = $db->query($sql);
        } else {
            $query = $db->prepare($sql);
            $query->execute($sql_parms);
        }

        $data = $query->fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        $query = null;
        $db = null;

        return $data;
    }

    private function execute($sql, $sql_parms) {
        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $smt = $db->prepare($sql);

        $smt->execute($sql_parms);

        $smt = null;
        $db = null;
    }

    private function connect() {
        try {
            return new PDO($this->source, CONFIG['db_user'], CONFIG['db_password']);
        } catch (PDOException $e) {
            return null;
        }
    }
}