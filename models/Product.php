<?php


namespace app\models;


class Product extends Record
{
    protected int $id;
    protected string $name;
    protected string $full_desc;
    protected int $price;
    protected int $image_id;
    protected int $section_id;
    protected int $views_count;
    protected int $quantity;

    public static function getTableName(): string
    {
        return 'products';
    }

    public function create()
    {
        $sql = "INSERT INTO {$this->tableName}
            VALUES (DEFAULT, :name, :full_desc, :price, DEFAULT, DEFAULT, DEFAULT, :quantity)";

        $this->db->execute($sql, [
            ':name' => $this->name,
            ':full_desc' => $this->full_desc,
            ':price' => $this->price,
            ':quantity' => $this->quantity,
        ]);
        return $this->db->getLastId();
    }


    /**
     * @return \app\traits\SingletonTrait|object|null
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param \app\traits\SingletonTrait|object|null $db
     */
    public function setDb($db): void
    {
        $this->db = $db;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getFullDesc(): string
    {
        return $this->full_desc;
    }

    /**
     * @param string $full_desc
     */
    public function setFullDesc(string $full_desc): void
    {
        $this->full_desc = $full_desc;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getImageId(): int
    {
        return $this->image_id;
    }

    /**
     * @param int $image_id
     */
    public function setImageId(int $image_id): void
    {
        $this->image_id = $image_id;
    }

    /**
     * @return int
     */
    public function getSectionId(): int
    {
        return $this->section_id;
    }

    /**
     * @param int $section_id
     */
    public function setSectionId(int $section_id): void
    {
        $this->section_id = $section_id;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }


}