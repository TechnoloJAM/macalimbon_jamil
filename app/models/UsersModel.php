<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersModel extends Model {
    protected $table = 'info';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Paginated query with optional search ($q).
     * If $page is null, returns all records.
     * returns ['total_rows' => int, 'records' => array]
     */
    public function page($q = '', $records_per_page = null, $page = null) {

        // if page is null, return all records (no pagination)
        if (is_null($page)) {
            $records = $this->db->table('info')->get_all();
            return [
                'total_rows' => count($records),
                'records'    => $records
            ];
        }

        // base query builder
        $query = $this->db->table('info');

        if ($q !== '') {
            // apply search conditions (safe builder methods)
            $query->like('id', '%'.$q.'%')
                  ->or_like('username', '%'.$q.'%')
                  ->or_like('email', '%'.$q.'%');
        }

        // clone query to count total rows
        $countQuery = clone $query;
        $data['total_rows'] = (int) $countQuery->select_count('*', 'count')->get()['count'];

        // get paginated records
        $data['records'] = $query->pagination($records_per_page, $page)
                                  ->get_all();

        return $data;
    }
}
