<?php
namespace App\Models;

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
