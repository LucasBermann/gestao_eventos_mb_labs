<?php

namespace App\Models\Intermediary;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class IModel extends Model
{
    public static function search($search)
    {
        try {
            $query = get_called_class()::query();
            $search = (array)json_decode($search);
            $contains = $search['contains'] ?? [];
            $equals = $search['equals'] ?? [];
            $sort = $search['sort'] ?? [];
            $lt = $search['lt'] ?? [];
            $gt = $search['gt'] ?? [];
            $join = $search['join'] ?? [];

            if (isset($search['populate']) && $search['populate']) {
                $query->with($search['populate']);
            }

            foreach ($join as $table => $fields) {
                $query->join($table, $fields->leftField, '=', $fields->rightField);
            }

            foreach ($contains as $field => $value) {
                $query->where($field, 'like', "%$value%");
            }
            foreach ($equals as $field => $value) {
                $query->where($field, '=', $value);
            }
            foreach ($lt as $field => $value) {
                $query->where($field, '<', $value);
            }
            foreach ($gt as $field => $value) {
                $query->where($field, '>', $value);
            }
            foreach ($sort as $field => $order) {
                $query->orderBy($field, $order);
            }

            $total = $query->count();

            $size = $search['size'] ?? 10;
            $query->take($size);

            $from = $search['from'] ?? 0;
            $query->skip($from);

            return [ 'total' => $total, 'data' => $query->get()];
        } catch (Throwable $e) {
            return [];
        }
    }
}
