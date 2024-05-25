<?php

namespace App\Repository;

use App\Domain\Galeri;

class GaleriRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function saveImage(Galeri $galeri) : Galeri
    {
        $statement = $this->connection->prepare('INSERT INTO galeri (id_galeri, title_galeri, subtitle_galeri, image_galeri) VALUES (?, ?, ? ,?)');
        $statement->execute([
            $galeri->id_galeri,
            $galeri->title_galeri,
            $galeri->subtitle_galeri,
            $galeri->image_galeri
        ]);
        return $galeri;
    }

    public function selectAllImage() : array
    {
        $statement = $this->connection->prepare('SELECT * FROM galeri');
        $statement->execute();

        $galeri_list = [];

        try {
            while ($row = $statement->fetch()) {
                $galeri = new Galeri();
                $galeri->id_galeri = $row['id_galeri'];
                $galeri->title_galeri = $row['title_galeri'];
                $galeri->subtitle_galeri = $row['subtitle_galeri'];
                $galeri->image_galeri = $row['image_galeri'];
                $galeri_list[] = $galeri;
            }
        } finally {
            $statement->closeCursor();
        }
        return $galeri_list;
    }

    public function selectImageById(string $id_galeri) : ?Galeri
    {
        $statement = $this->connection->prepare('SELECT * FROM galeri WHERE id_galeri = ?');
        $statement->execute([$id_galeri]);

        try {
            if (($row = $statement->fetch()) !== false) {
                $galeri = new Galeri();
                $galeri->id_galeri = $row['id_galeri'];
                $galeri->title_galeri = $row['title_galeri'];
                $galeri->subtitle_galeri = $row['subtitle_galeri'];
                $galeri->image_galeri = $row['image_galeri'];
                return $galeri;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function deleteImage(string $id_galeri) : void
    {
        $statement = $this->connection->prepare('DELETE FROM galeri WHERE id_galeri = ?');
        $statement->execute([$id_galeri]);
    }
}