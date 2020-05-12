<?php
class Chat extends Core {
    public function fetchMessages() {
        // query db
        $this->query("SELECT `chat`.`message`, `users`.`username`,`users`.`id`
        FROM `chat`
        JOIN `users`
        ON `chat`.`id` = `users`.`id`
        ORDER BY `chat`.`timestamp`
        DESC
    ");
        // return rows
        return $this->rows();

    }

    public function throwMessage($id, $message) {
        // insert into db
        $this->query("
        INSERT INTO `chat` (`id`, `message`, `timestamp`)
        VALUES (".(int)$id.", '" .$this->db->real_escape_string(htmlentities($message)). "', UNIX_TIMESTAMP())
        ");
    }
}