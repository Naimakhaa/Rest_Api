<?php
class Database
{
    private $conn;

    public function connect()
    {
        $this->conn = null;
        try {
            
            $host = getenv('POSTGRES_HOST');
            $db   = getenv('POSTGRES_DATABASE');
            $user = getenv('POSTGRES_USER');
            $pass = getenv('POSTGRES_PASSWORD');
            $port = getenv('POSTGRES_PORT') ?: 5432;

            $this->conn = new PDO(
                "pgsql:host={$host};port={$port};dbname={$db};sslmode=require",
                $user,
                $pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die(json_encode(["error" => "Koneksi gagal: " . $e->getMessage()]));
        }

        return $this->conn;
    }
}
