<?php
declare(strict_types=1);

namespace App\Utils;

use Closure;

use Illuminate\Support\Facades\DB;

class TransactionUtils {
    // $attempts = number of tries if a deadlock occur
    public static function executeInTransaction(Closure $closure, $attempts = 1) {
        return DB::transaction($closure, $attempts);
    }
}