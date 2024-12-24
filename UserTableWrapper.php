<?php
class UserTableWrapper
{
    private array $rows;

    public function insert(array $values): void
    {
        $this->rows[] = $values;
    }

    public function update(int $id, array $values): array
    {
        if (!isset($this->rows[$id]) {
            return [];
        }
        $this->rows[$id] = $values;
        return $this->rows[$id];
    }

    public function delete(int $id): void
    {
        unset($this->rows[$id]);
    }

    public function get(): array
    {
        return $this->rows;
    }
}
