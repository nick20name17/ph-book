<?php

require('glossaryterm.class.php');

class DataProvider
{
    function __construct(public $source = '')
    {
    }

    public function get_terms()
    {
    }

    public function get_term($term)
    {
    }

    public function search_terms($search)
    {
    }

    public function add_term($name, $surname, $number, $comment)
    {
    }

    public function update_term($original_term, $new_term, $definition)
    {
    }

    public function delete_term($term)
    {
    }
}
