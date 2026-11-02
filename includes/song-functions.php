<?php

// Database operations shared by the song pages.

function deleteSong(PDO $db, int $id): void
{
    // TODO 1: Prepare and execute a DELETE for this ID.
    $sql = 'DELETE FROM songs WHERE song_id = :id';
    $statement = $db->prepare($sql);
    $statement->execute([':id' => $id]);
}

function addSong(PDO $db, Song $song): void
{
    // TODO 2: Prepare and execute an INSERT using the Song object properties. Convert its boolean favorite value to 1 or 0.
    $sql = 'INSERT INTO songs (title, artist, is_favorite)
            VALUES (:title, :artist, :is_favorite)';
    $statement = $db->prepare($sql);
    $statement->execute([
        ':title' => $song->title,
        ':artist' => $song->artist,
        ':is_favorite' => $song->isFavorite ? 1 : 0,
    ]);
}
