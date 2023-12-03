<?php

namespace App\Source\Services\Project\Domain\Model;

use App\Source\Common\Domain\AggregateRoot;

class Project extends AggregateRoot implements \JsonSerializable
{

    /** @var int|null */
    public ?int $id;

    /** @var string  */
    public string $name;

    /** @var string  */
    public string $description;

    /** @var int  */
    public int $type;

    /** @var int  */
    public int $status;

    /**
     * @param int|null $id
     * @param string $name
     * @param string $description
     * @param int $type
     * @param int $status
     */
    public function __construct(?int $id, string $name, string $description, int $type, int $status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
        $this->status = $status;
    }


    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
            'status' => $this->status
        ];
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

}
