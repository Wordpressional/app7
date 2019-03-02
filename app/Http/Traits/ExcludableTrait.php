<?php
namespace App\Http\Traits;
use Schema;

trait ExcludableTrait {

	/**
 * Get the array of columns
 * @return mixed
 */
private function getTableColumns($table) {
    return Schema::getColumnListing($table);
}

/**
 * Exclude an array of elements from the result.
 * @param $query
 * @param $columns
 * @return mixed
 */
public function Exclude($table, $column1, $column2)
{
    //dd(array_diff($this->getTableColumns($table), (array) $columns));
    //return $query->select(array_diff($this->getTableColumns(), (array) $columns));
    return array_diff($this->getTableColumns($table), (array) $column1, (array) $column2);
}


}