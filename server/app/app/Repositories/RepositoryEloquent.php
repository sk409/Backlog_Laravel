<?php

namespace App\Repositories;

use App\Utils\Where;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class RepositoryEloquent
{

    private $eloquent;

    public function __construct(string $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function all()
    {
        return call_user_func($this->eloquent . "::all")->all();
    }

    public function count(array $where): int
    {
        if (empty($where)) {
            return call_user_func($this->eloquent . "::all")->count();
        }
        $buder = $this->where($where);
        return $buder->count();
    }

    public function findAll(array $option)
    {
        return $this->find($option)->all();
    }

    public function findOne(array $option)
    {
        return $this->find($option)->first();
    }

    public function update(int $id, array $params)
    {
        call_user_func($this->eloquent . "::find", $id)->update($params);
    }

    private function find(array $option): Collection
    {
        $builder = null;
        if (isset($option["with"])) {
            $with = $option["with"];
            if (is_null($builder)) {
                $builder = call_user_func($this->eloquent . "::with", $with);
            } else {
                $builder = $builder->with($with);
            }
        }
        if (isset($option["primary"])) {
            $primary = $option["primary"];
            if (is_null($builder)) {
                $builder = call_user_func($this->eloquent . "::find", $primary);
            } else {
                $builder = $builder->find($primary);
            }
        }
        if (isset($option["where"])) {
            $where = $option["where"];
            $builder = $this->where($where, $builder);
        }
        if (isset($option["offset"])) {
            $offset = $option["offset"];
            if (is_null($builder)) {
                $builder = call_user_func($this->eloquent . "::offset", $offset);
            } else {
                $builder = $builder->offset($offset);
            }
        }
        if (isset($option["limit"])) {
            $limit = $option["limit"];
            if (is_null($limit)) {
                $builder = call_user_func($this->eloquent . "::limit", $limit);
            } else {
                $builder = $builder->limit($limit);
            }
        }
        return $builder->get();
    }

    private function where(array $where, $builder = null): Builder
    {
        $narrowDown = function ($query) use (&$builder) {
            $lhs = $query[0];
            $operation = count($query) === 2 ? "=" : $query[1];
            $rhs = count($query) === 2 ? $query[1] : $query[2];
            if (is_null($builder)) {
                $builder = call_user_func($this->eloquent . "::where", $lhs, $operation, $rhs);
            } else {
                $builder = $builder->where($lhs, $operation, $rhs);
            }
        };
        if (count($where) === 3 && gettype($where[0]) === "string" && gettype($where[1]) === "string") {
            $narrowDown($where);
        } else if (count($where) === 2 && gettype($where[0] === "string")) {
            $narrowDown($where);
        } else {
            foreach ($where as $query) {
                $narrowDown($query);
            }
        }
        return $builder;
    }
}
