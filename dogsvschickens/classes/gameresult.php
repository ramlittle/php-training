<?php
class GameResult
{
    private $conn;
    public $player_id;
    public $team_id;
    public $bullets_left;
    public $chickens_left;
    public $score;
    public $status;
    public $date_played;
    public $gameresult_id;

    public function __construct($dbase)
    {
        $this->conn = $dbase;
    }

    public function read()
    {
        $query = "SELECT gameresult_id,score,bullets_left,chickens_left,status,first_name,last_name,email,date_played,team_name,team_description
        FROM `gameresults` 
        INNER JOIN players ON players.player_id=gameresults.player_id
        INNER JOIN teams ON teams.team_id=gameresults.team_id
        ORDER BY score DESC
        ";
        $statement = $this->conn->prepare($query);
        $statement->execute();
        return $statement;
    }

    public function search($searchQuery)
    {
        $query = "SELECT gameresult_id,score,bullets_left,chickens_left,status,first_name,last_name,email,date_played,team_name,team_description
        FROM `gameresults` 
        INNER JOIN players ON players.player_id=gameresults.player_id
        INNER JOIN teams ON teams.team_id=gameresults.team_id
        WHERE last_name LIKE '%$searchQuery%'
        ORDER BY score DESC
        ";
        $statement = $this->conn->prepare($query);
        $statement->execute();
        return $statement;

    }
    public function add()
    {
        $query = "INSERT INTO gameresults 
            SET player_id=?,
            team_id=?,
            bullets_left=?,
            chickens_left=?,
            score=?,
            status=?,
            date_played=?
            ";
        $statement = $this->conn->prepare($query);


        $statement->bindParam(1, $this->player_id);
        $statement->bindParam(2, $this->team_id);
        $statement->bindParam(3, $this->bullets_left);
        $statement->bindParam(4, $this->chickens_left);
        $statement->bindParam(5, $this->score);
        $statement->bindParam(6, $this->status);
        $statement->bindParam(7, $this->date_played);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $query = "DELETE FROM gameresults WHERE gameresult_id=?";
        $statement = $this->conn->prepare($query);

        $statement->bindParam(1, $this->gameresult_id);
        $statement->execute();
    }

    public function getLosersPercentage()
    {
        $query = "SELECT COUNT(CASE WHEN status = 'Lost' THEN 1 END) AS 'Loses', COUNT(*) AS 'Total Games Played', CAST((COUNT(CASE WHEN status = 'Lost' THEN 1 END) / COUNT(*)) * 100 AS SIGNED) AS 'Losers Percentage' FROM `gameresults`; ";

        $statement = $this->conn->prepare($query);
        $statement->execute();
        return $statement;
    }
    public function getWinnersPercentage()
    {
        $query = "SELECT COUNT(CASE WHEN status = 'Won' THEN 1 END) AS 'Wins', COUNT(*) AS 'Total Games Played', CAST((COUNT(CASE WHEN status = 'Won' THEN 1 END) / COUNT(*)) * 100 AS SIGNED) AS 'Winners Percentage' FROM `gameresults`; ";

        $statement = $this->conn->prepare($query);
        $statement->execute();
        return $statement;
    }
}
?>