<?php
class ContactModel {
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=Game_News", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Lỗi kết nối database: " . $e->getMessage());
        }
    }

    public function getAllContacts() {
        $stmt = $this->db->prepare("SELECT * FROM contacts ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getContactById($id) {
        $stmt = $this->db->prepare("SELECT * FROM contacts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteContact($id) {
        $stmt = $this->db->prepare("DELETE FROM contacts WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function addContact($name, $email, $subject, $message) {
        $stmt = $this->db->prepare("INSERT INTO contacts (name, email, subject, message, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->execute([$name, $email, $subject, $message]);
    }

    public function updateContact($id, $name, $email, $subject, $message) {
        $stmt = $this->db->prepare("UPDATE contacts SET name = ?, email = ?, subject = ?, message = ? WHERE id = ?");
        $stmt->execute([$name, $email, $subject, $message, $id]);
    }
}
?>