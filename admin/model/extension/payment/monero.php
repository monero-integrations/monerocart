<?php
class ModelExtensionPaymentMonero extends Model
{
    public function createDatabaseTables()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "monero_opencart` (
            `bind_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `order_id` int(32) NOT NULL,
            `session_id` varchar(32) NOT NULL,
            `status` varchar(32)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        $this->db->query($sql);
    }
    public function dropDatabaseTables()
    {
        $sql = "DROP TABLE IF EXISTS `" . DB_PREFIX . "monero_opencart`;";
        $this->db->query($sql);
    }
}
