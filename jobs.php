<?php
require_once ("database.php");

class jobs
{
    var $job_id;
    var $job_name;
    var $job_category;
    var $job_city;
    var $company_id;
    var $job_active;

    public function __construct($args=[])
    {
        $this->job_id = $args['job_id'] ?? '';
        $this->job_name = $args['job_name'] ?? '';
        $this->job_category = $args['job_category'] ?? '';
        $this->job_city = $args['job_city'] ?? '';
        $this->company_id = $args['company_id'] ?? '';
        $this->job_active = $args['job_active'] ?? '';
    }

    public static function create() {
        global $pdo;
        $sql = "INSERT INTO jobs (job_name, job_category, job_city, company_id, job_active) VALUES (:jobs)";
        $pdo->exec($sql);
    }

    public static function get_jobs()
    {
        global $pdo;
        $companies = [];

        $sql = "SELECT * FROM jobs";
        $result = $pdo->query($sql, PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $job = new jobs(['job_id' => $row['job_id'],
                'job_name' => $row['job_name'],
                'job_category' => $row['job_category'],
                'job_city' => $row['job_city'],
                'company_id' => $row['company_id'] ]);
            $jobs[] = $job;
        }

        return $jobs;
    }

    public static function delete_jobs($job_id) {
        global $pdo;
        $sql = "DELETE FROM companies WHERE id='$job_id'";
        $pdo->exec($sql);
    }
}
