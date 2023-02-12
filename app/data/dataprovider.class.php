<?php

require('contact.class.php');

class DataProvider
{
    function __construct(public $source = '')
    {
    }

    public function get_contacts()
    {
    }

    public function get_contact($contact)
    {
    }

    public function search_contacts($search)
    {
    }

    public function add_contact($name, $surname, $number, $comment)
    {
    }

    public function update_contact($original, $new_name, $new_surname, $new_number, $new_comment)
    {
    }

    public function delete_contact($contact)
    {
    }
}
