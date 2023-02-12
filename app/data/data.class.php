<?php

require('dataprovider.class.php');


class Data {
    static private $ds;
    static public function initialize(DataProvider $data_provider) {
        return self::$ds = $data_provider;
    }

    static public function get_contacts() {    
        return self::$ds->get_contacts();
    }
    
    static public function get_contact($contact) {
        return self::$ds->get_contact($contact);
    }
    
    static public function search_contacts($search) {
        return self::$ds->search_contacts($search);
    }
    
    static public function add_contact($name, $surname, $number, $comment) {
        return self::$ds->add_contact($name, $surname, $number, $comment);
    }
    
    static public function update_contact($original, $new_name, $new_surname, $new_number, $new_comment) {
        return self::$ds->update_contact($original, $new_name, $new_surname, $new_number, $new_comment);
    }
    
    static public function delete_contact($contact) {
        return self::$ds->delete_contact($contact);
    }
}
