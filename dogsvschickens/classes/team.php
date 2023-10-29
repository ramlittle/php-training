<?php
class Team
{
    private $conn;
    public $team_id;
    public $team_name;
    public $team_description;

    public function __construct($dbase)
    {
        $this->conn = $dbase;
    }

    public function read()
    {
        $query = "SELECT * FROM teams";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
?>