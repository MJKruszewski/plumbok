Plumbok
=======

Runtime Code Generator like Lombok for PHP.

Code generation starts when additional autoloader detects class uses Plumbok annotations
and loads newly generated code with added methods in preprocess step.

![PHP 7.0](https://img.shields.io/badge/PHP-7.0-8C9CB6.svg?style=flat)
[![Build Status](https://travis-ci.org/plumbok/plumbok.svg?branch=master)](https://travis-ci.org/plumbok/plumbok)

---

## Installation

Install with Composer

```
composer require plumbok/plumbok
```

## Usage

Registering additional autoloader:

```php
require 'vendor/autoload.php';

Plumbok\Autoload::register('Plumbok\\Test');
```

Using annotations in class:

```php
namespace Plumbok\Test;

class Person
{
    /**
     * Holds age
     * @var int
     * @Getter @Setter
     */
    private $age;

    /**
     * @var \DateTime
     * @Getter @Setter
     */
    private $birthdate;

    /**
     * @var int[]
     * @Getter @Setter
     */
    private $days;

    /**
     * @var array
     */
    private $names = [];
}
```

After first run your original code will be little modified with 
additional docblock ennotations (tags) in PhpDocumentor style.

```php
namespace Plumbok\Test;

/**
 * @method int getAge() 
 * @method void setAge(int $age) 
 * @method \DateTime getBirthdate() 
 * @method void setBirthdate(\DateTime $birthdate) 
 * @method int[] getDays() 
 * @method void setDays(int[] $days) 
 */
class Person
{
    /**
     * Holds age
     * @var int
     * @Getter @Setter
     */
    private $age;

    /**
     * @var \DateTime
     * @Getter @Setter
     */
    private $birthdate;

    /**
     * @var int[]
     * @Getter @Setter
     */
    private $days;

    /**
     * @var array
     */
    private $names = [];
}
```

This preprocessing step allows IDE to recognise generated methods from docblock.
Second step is including generated code which looks like:

```php
namespace Plumbok\Test;

class Person
{
    /**
     * Holds age
     * @var int
     * @Getter() @Setter
     */
    private $age;
    /**
     * @var \DateTime
     * @Getter @Setter
     */
    private $birthdate;
    /**
     * @var int[]
     * @Getter @Setter
     */
    private $days;
    /**
     * @var array
     */
    private $names = [];
    /**
     * Retrieves age
     *
     * @return int 
     */
    public function getAge() : int
    {
        return $this->age;
    }
    /**
     * Sets age
     *
     * @param int $age
     * @return void 
     */
    public function setAge(int $age)
    {
        $this->age = $age;
    }
    /**
     * Retrieves birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate() : \DateTime
    {
        return $this->birthdate;
    }
    /**
     * Sets birthdate
     *
     * @param \DateTime $birthdate
     * @return void 
     */
    public function setBirthdate(\DateTime $birthdate)
    {
        $this->birthdate = $birthdate;
    }
    /**
     * Retrieves days
     *
     * @return int[] 
     */
    public function getDays() : array
    {
        return $this->days;
    }
    /**
     * Sets days
     *
     * @param int[] $days
     * @return void 
     */
    public function setDays(array $days)
    {
        $this->days = $days;
    }
}
```

## TODO

* [ ] Replace eval with save to file and `include_once`
* [ ] Add generated code caching for performance improvements
* [ ] Add warmup command generating code for deployment
* [x] Implement `@Getter` annotation
* [x] Implement `@Setter` annotation
* [ ] Implement `@ToString` annotation
* [ ] Implement `@AllArgsConstructor`, `@NoArgsConstructor`, `@RequiredArgsConstructor` annotation
* [ ] Implement `@Equal` annotation
* [ ] Implement `@Value`, `@Data` annotations

## License

The MIT License (MIT)

Copyright (c) 2016 Michał Brzuchalski <michal.brzuchalski@gmail.com>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.