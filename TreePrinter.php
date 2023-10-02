<?php

class TreePrinter
{
    public static function printTree(object|array $data, string $indent = '', bool $isLast = true): string
    {
        $result = ''; // Создаем пустую строку для сбора результата
        if (is_object($data)) {
            $data = (array) $data;
        }
        $keys = array_keys($data);
        $lastKey = end($keys);

        foreach ($data as $key => $value) {
            $isCurrentLast = ($key === $lastKey);

            // Добавляем к результату текущий элемент дерева
            $result .= $indent;
            if ($isLast) {
                $result .= $isCurrentLast ? '└── ' : '├── ';
                $newIndent = $indent.'│   ';
            } else {
                $result .= $isCurrentLast ? '└── ' : '├── ';
                $newIndent = $indent.($isCurrentLast ? '    ' : '│   ');
            }
            $result .= "$key: ";

            if (is_array($value)) {
                $result .= PHP_EOL;
                // Рекурсивно добавляем поддерево к результату
                $result .= self::printTree($value, $newIndent, $isCurrentLast);
            } elseif (is_object($value)) {
                $result .= get_class($value).PHP_EOL;
                // Рекурсивно добавляем поддерево к результату
                $result .= self::printTree((array) $value, $newIndent, $isCurrentLast);
            } else {
                $result .= $value.PHP_EOL;
            }
        }

        return $result; // Возвращаем собранный результат
    }
}
