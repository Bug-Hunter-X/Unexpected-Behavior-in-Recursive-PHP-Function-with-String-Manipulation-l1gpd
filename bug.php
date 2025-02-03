```php
function processData(array $data): array {
  foreach ($data as $key => $value) {
    if (is_array($value)) {
      $data[$key] = processData($value); // Recursive call
    } elseif (is_string($value) && str_starts_with($value, '#')) {
      $data[$key] = trim($value, '# '); // Remove '#' and whitespace
    }
  }
  return $data;
}

$data = [
  'name' => 'John Doe',
  'details' => [
    'age' => 30,
    'address' => '# 123 Main St',
  ],
  'notes' => '# Important note'
];

$processedData = processData($data);
print_r($processedData); 
```