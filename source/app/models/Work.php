<?php
require_once('Model.php');

class Work extends Model
{
    /**
     * Constructor
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->table('works');
    }
}
