![](https://travis-ci.org/lovelock/ServiceProvider.svg?branch=master)

## Why another ServiceProvider?

As we know, dependency injection is disgusting, so genies created what called Container. However, if we write code depending on a container, we must somehow extend a base class commonly called IoC or DIC, which fails me a lot.

**The most fatal weakness of this solution is I can not access a container inside a static method.**

## Usage

It plays almost the same role as a container, but it can be accessed wherever you are, and you don't have to give an alias to a service. For example, when you use a container, mostly you'll write this way:

```php
$c = new \Slim\Container($settings);
$c['foo'] = function($c) {
    return new Foo::class;
};

```

But if you use this ServiceProvider, you can directly access a `Foo`'s instance this way:

```php
ServiceProvider::get(Foo::class);
```

If the class `Foo` has more construct arguments, you can just pass them as an array as the second parameter of `ServiceProvider::get`.

```php
ServiceProvider::get(Foo::class, [1, 2, 'bar']);
```

By default, you'll access the same instance of a class whenever you access it via `ServiceProvider::get()`, but you have the option to change this

```php
ServiceProvider::get(Foo::class, [], false);
```

This will initialize a brand new instance of a class whenever it is called.

**Maybe you're worried about code jumping issues, as modern PHP developer, we should use PhpStorm, and there's a plugin named PHP-DI that will save your life.**

![](http://ww4.sinaimg.cn/large/006y8mN6jw1fah2tbhob6j319s11otcw.jpg)