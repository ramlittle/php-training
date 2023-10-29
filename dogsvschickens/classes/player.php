<?php
class Player
{
    private $conn;
    public $first_name;
    public $last_name;
    public $email;
    public $player_id;

    public function __construct($dbase)
    {
        $this->conn = $dbase;
    }
    public function read()
    {
        $query = "SELECT * FROM players";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function search($searchQuery)
    {
        $query = "SELECT * FROM players WHERE last_name LIKE '%$searchQuery%'";
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }
    public function add()
    {
        $query = "INSERT INTO players 
            SET first_name = ?,
            last_name=?,
            email=?";
        $statement = $this->conn->prepare($query);

        $statement->bindParam(1, $this->first_name);
        $statement->bindParam(2, $this->last_name);
        $statement->bindParam(3, $this->email);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function edit()
    {
        $query = "SELECT * FROM players WHERE player_id=?";
        $statement = $this->conn->prepare($query);

        $statement->bindParam(1, $this->player_id);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $this->first_name = $row['first_name'];
        $this->last_name = $row['last_name'];
        $this->email = $row['email'];
        // return $statement;

    }

    public function update()
    {
        $query = "UPDATE players
            SET first_name = ?,
            last_name=?,
            email=?
            WHERE player_id=?
            ";
        $statement = $this->conn->prepare($query);

        $statement->bindParam(1, $this->first_name);
        $statement->bindParam(2, $this->last_name);
        $statement->bindParam(3, $this->email);
        $statement->bindParam(4, $this->player_id);

        // you may put a return statement like in the update function if you want to return a success message
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $query = "DELETE FROM players WHERE player_id=?";
        $statement = $this->conn->prepare($query);

        $statement->bindParam(1, $this->player_id);
        $statement->execute();

    }


}
?>