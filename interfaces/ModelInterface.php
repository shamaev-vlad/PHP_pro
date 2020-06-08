<?php
interface ModelInterface
{
    public function getById(int $id): array;

    public function getALl();

    public function getTableName(): string;

}