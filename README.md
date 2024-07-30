## About PHPOptionalResult

This package is an implementation of Rust return response.

## Usage

_Look at examples directory_

### Optional response

When need return value that can be nullable, you can use  `Option::class`

#### Return with value :

- `Option::some('AnyValue')`
- `Option::some(10)`
- `Option::some(['one', 'two', 'three'])`

You can replace parameter by any value you need.

#### No return value : 

- `Option::none()`

#### Methods allowed : 

$value = `Option::some('any value'')`

`$value->isSome()` return boolean
`$value->isNone()` return boolean


#### Get() method

- Get method return value when it's a Some return

- Get method throw NoneException when it's a None return

### Result Response

When need return an object that explain if process work great or had error, you can use `Result::class`

#### Return OK with value

- `Result::ok('anyValue')`
- `Result::ok(10)`
- `Result::ok([1, 2, 3])`
  
You can replace parameter by any value you need, or by `Option::class`

##### Return Error with message

- `Result::err('an error occur')`

#### Get Method 

- Get method return value when it's Ok return
- Get method error value when it's Err return

To get error message, getError() method is available


## Example (_see examples directory_) 

### Before : 
```

/**
* @return string
*/
function askDomain(string $name): ?String
{
  try {
      $json = Http::get('myResolverApi?name='.$name)->json();
      if (isset($json['domain']) && ($json['domain'] !== null || $json['domain'] !== '')) {
      return $json['domain'];
      }
      return null;

  } catch (HttpException) {
    throw new Exception('API No respond');
  }
}

function isDomainExist(string $name): string
{
    try {
        $result = askDomain($name);

        if (!empty($result)) {
            return 'domain is' . $result; 
        }
        
    } catch (Exception $e) {
        return '';
    }
}


echo isDomainExist('goooooooooooogle');
```


### After : 

```

/**
* @return Ok<Some<string>|None>|Err<None>
*/
function askDomain(string $name): Ok|Err
{
    try {
        $json = Http::get('myResolverApi?name='.$name)->json();
        if (isset($json['domain'])) {
            return Result::ok(Option::some($json['domain']));
        }
    
       return Result::ok(Option::none());
    
    } catch (HttpException) {
    return Result::Err(Option::none());
    }
}

function isDomainExist(string $name): string
{
    $result = askDomain($name);

    if ($result->isErr()) {
        return 'Not sure. API not respond';
    }

    if ($result->isOk() && $result->get()->isSome()) {
        return 'domain is'.$result->get()->isSome()->get();
    }

    return 'domain does not exist';
}


echo isDomainExist('goooooooooooogle');
```