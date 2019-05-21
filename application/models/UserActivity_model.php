<?php
/**
 * Created by PhpStorm.
 * User: pablocamara
 * Date: 25/03/2018
 * Time: 17:33
 */

class UserActivity_model extends CI_Model {

    public $id;
    public $ip;
    public $url;
    public $email;
    public $timestamp;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function registerView($ip,$url,$email = null){
        $this->ip    = $ip; // please read the below note
        $this->url  = $url;
        $this->email = $email;
        $this->timestamp     = date('Y-m-d H:i:s');

        $this->db->insert('user_activity', $this);
    }

    public function getViewsStats($start = null,$end = null){

        if($start){

            if(!$end){
                $end = $start;
            }

            $start = date("Y-m-d 00:00:00", strtotime($start));
            $end = date("Y-m-d 23:59:59", strtotime($end));

            $sql = <<<SQL
    SELECT
      uc.url,
      COUNT(uc.id) AS total_views,
      COUNT(DISTINCT uc.ip) AS unique_views,
      TIMEDIFF(NOW(),MAX(uc.timestamp)) AS last_visit,
      COUNT(DISTINCT uc.email) AS total_subscribers,
      COUNT(DISTINCT c.id) AS total_checkouts,
      COUNT(DISTINCT c.email) AS total_buyers
    FROM
      user_activity AS uc
    LEFT JOIN
      checkouts AS c ON c.url = uc.url
    WHERE
      uc.timestamp BETWEEN '{$start}' AND '{$end}'
    GROUP BY 
      uc.url
    ORDER BY
      COUNT(DISTINCT uc.ip) DESC
SQL;

        } else {

            $sql = <<<SQL
    SELECT
      uc.url,
      COUNT(uc.id) AS total_views,
      COUNT(DISTINCT uc.ip) AS unique_views,
      TIMEDIFF(NOW(),MAX(uc.timestamp)) AS last_visit,
      COUNT(DISTINCT uc.email) AS total_subscribers,
      COUNT(DISTINCT c.id) AS total_checkouts,
      COUNT(DISTINCT c.email) AS total_buyers
    FROM
      user_activity AS uc
    LEFT JOIN
      checkouts AS c ON c.url = uc.url
    GROUP BY 
      uc.url
    ORDER BY
      COUNT(DISTINCT uc.ip) DESC
SQL;

        }


        $stats = $this->db->query($sql)->result();

        return $stats;
    }

}