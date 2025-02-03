```php
function processData(array $data): array {
  $result = [];
  foreach ($data as $key => $value) {
    if (is_array($value)) {
      $result[$key] = processData($value); // Recursive call
    } elseif (is_string($value) && str_starts_with($value, '#')) {
      $result[$key] = trim($value, '# '); // Remove '#' and whitespace
    } else {
      $result[$key] = $value;
    }
  }
  return $result;
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