<?php

class Object2Tree
{
    public static function convert(array|object $data, $indent = '', $isLast = true): string
    {
        $tree = self::formatTitle($data)."\n";

        $data = (array) $data;
        $keys = array_keys($data);
        $lastKey = end($keys);

        foreach ($data as $key => $value) {
            $isCurrentLast = ($key === $lastKey);
            $tree .= $indent;

            $tree .= $isCurrentLast ? '└─ ' : '├─ ';
            $newIndent = $indent.($isLast ? '│  ' : ($isCurrentLast ? '   ' : '│  '));

            $tree .= "$key: ";

            if (is_array($value) || is_object($value)) {
                $tree .= self::convert($value, $newIndent, $isCurrentLast);
            } else {
                $tree .= self::formatValue($value)."\n";
            }
        }

        return $tree;
    }

    public static function formatValue(mixed $value): string
    {
        $value = match (gettype($value)) {
            'boolean' => $value ? 'true' : 'false',
            'string' => '"'.$value.'"',
            default => $value
        };

        return $value ?? 'null';
    }

    public static function formatTitle(mixed $value): string
    {
        if (is_object($value)) {
            $title = get_class($value);
        } else {
            $title = gettype($value);
        }

        return ucfirst($title);
    }
}
