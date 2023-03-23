<?php

namespace App\Controllers;

use App\Models\Work;

class WorkController
{
    protected $work;
    /**
     * Constructor controller
     *
     */
    public function __construct(Work $work)
    {
        $this->work = $work;
    }

    /**
     * Function list work to view calender
     *
     * @return array
     */
    public function getList()
    {
        return $this->work->get(
            ' id, name as "constraint", '
                . 'start_date as "start", '
                . 'end_date as "end", '
                . 'status as "color"'
        );
    }

    /**
     * Function insert data to table works
     *
     * @return array
     */
    public function insert($data)
    {
        //If insert is success then redirect to index
        if ($this->work->insert($data)) {
            ob_start();
            header("Location: http://localhost");
            ob_end_flush();
        };
    }

    /**
     * Function find data to table works by id
     *
     * @return array
     */
    public function find($id)
    {
        return $this->work->find($id);
    }

    /**
     * Function update data to table works
     *
     * @return array
     */
    public function update($id, $data)
    {
        return $this->work->update($id, $data);
    }

    /**
     * Function delete data to table works
     *
     * @return array
     */
    public function delete($id)
    {
        return $this->work->delete($id);
    }
}
