<?php


namespace App\Services;


use Illuminate\Support\Collection;

interface CrudService
{
    public function get();
    public function getOne(int $id);
    public function store(Array $input);
    public function update(int $id, Array $input);
    public function delete(int $id);
    /**
     * No softdeletes in this project
     */
/*    public function restore($id);
    public function hardDelete($id);*/
}
