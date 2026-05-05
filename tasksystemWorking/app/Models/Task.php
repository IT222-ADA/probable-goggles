<?php

class Task extends Model
{
   protected $table = 'tbl_task';

    public function countAll(): int
    {
        return parent::countAll();
    }

    public function getTasks(): array
    {
        return $this->all();
    }

    public function getTasksByStatus(int $status, int $userId): array
    {
        return $this->findWhere ([
            'status' => $status,
            'user_id' => $userId
        ]);
    }

    public function getTasksByUser(int $userId): array
    {
        return $this->findColumn('user_id', $userId);
    }

    public function createTask(array $data): void
    {
        $this->insert($data);
    }

    public function deleteTask(int $id): void
    {
        $this->delete($id);
    }

    public function markComplete(int $id): void
    {
        $this->update($id, ['status' => 1]);
    }

    public function markUncomplete(int $id): void
    {
        $this->update($id, ['status' => 0]);
    }

    public function updateTask(int $id, array $data): void
    {
        $this->update($id, $data);
    }

    public function filterByDate(string $date, int $userId): array
    {
       return $this->findWhere(['DATE(created_at)' => $date , 'user_id' => $userId]);
    }


}