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

echo TreePrinter::printTree($data);
```
выходные данные
```
├── date: 1622656800
├── name: Vladimir
├── age: 30
└── address: 
│   ├── city: Moscow
│   ├── street: Lenina
│   ├── house: 1
│   └── flat: 1
```
