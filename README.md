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
- Get method throw exception when it's Err return

To get error message, getError() method is available