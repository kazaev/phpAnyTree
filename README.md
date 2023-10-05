# phpAnyTree

вводимые данные
```php
$data = [
    'date' => 1622656800,
    'name' => 'Vladimir',
    'age' => 30,
    'address' => [
        'city' => 'Moscow',
        'street' => 'Lenina',
        'house' => 1,
        'flat' => 1,
    ],
];

echo Object2Tree::convert($data);
```
выходные данные
```
Array
├─ date: 1622656800
├─ name: "Vladimir"
├─ age: 30
└─ address: Array
   ├─ city: "Moscow"
   ├─ street: "Lenina"
   ├─ house: 1
   └─ flat: 1
```
