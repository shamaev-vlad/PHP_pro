<?php
namespace app\interfaces;

interface IModel
{
    public function getById(int $id): array;

    public function getALl();

    public function getTableName(): string;

}