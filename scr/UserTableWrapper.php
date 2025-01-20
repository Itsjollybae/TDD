<?php
namespace App;

class UserTableWrapper implements TableWrapperInterface
{
    private array $rows;

    public function insert(array $values): void
    {
        $this->rows[] = $values;
    }

    public function update(int $id, array $values): array
    {
        if (!isset($this->rows[$id])) {
            throw new \Exception("User not found");
        }
        $this->rows[$id] = $values;
        return $this->rows[$id];
    }

    public function delete(int $id): void
    {
        if (!isset($this->rows[$id])) {
            throw new \Exception("User not found");
        }
        unset($this->rows[$id]);
    }

    public function get(): array
    {
        return $this->rows;
    }
}