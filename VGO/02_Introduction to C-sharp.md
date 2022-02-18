## Introduction to C&num; 
---


### Naming Conventions

[Capitalization Conventions - Framework Design Guidelines | Microsoft Docs](https://docs.microsoft.com/en-us/dotnet/standard/design-guidelines/capitalization-conventions)

---

### String Interpolation


Say you want to construct a string "Player N is the winner with K points" where N and K need to be replaced with values stored in variables.

```c#
var message = $"Player {winner} is the winner with {scores[winner]} points.";
```

> To indicate your intention to insert variables into the string, you need to prefix the string literal with a $. Inserting variable values can then be inserted using {expression}.

More info:
- [$ - string interpolation - C# reference | Microsoft Docs](https://docs.microsoft.com/en-us/dotnet/csharp/language-reference/tokens/interpolated)

---

### Operator Overloading

Many languages (such as C++, Python, Ruby and C#) do allow the user to define new meaning for + (and other operators) for their own classes. For example,

```c#
public static Fraction operator *(Fraction left, Fraction right)
    {
        return new Fraction(left.Numerator * right.Numerator, left.Denominator * right.Denominator)
    }
```

> Contrary to java, C# uses == to represent equals.


---
### Null-Conditional Operators

Having to check if an object is null is burdensome.

```c#
if ( someObject != null )
{
    someObject.someAction();
}
```
This can be replaced by:
```c#
someObject?.someAction();
```

This also applies to indexing:
```c#
var element = someContainer?[i];
```

#### Null Coalescing Operator

Say you have an object x which you don’t want to be null. If it is, you’d like this null to be replaced by some default value:
```c#
x != null ? x : defaultValue
```
Can become:
```c#
void Foo(int? x)
{
    int y = x ?? 0; // Either use x, or 0 if x is null
}
```
More info:
- [Member access operators and expressions - C# reference | Microsoft Docs](https://docs.microsoft.com/en-us/dotnet/csharp/language-reference/operators/member-access-operators)
- [?? and ??= operators - C# reference | Microsoft Docs](https://docs.microsoft.com/en-us/dotnet/csharp/language-reference/operators/null-coalescing-operator)

---

### Generics

In Java generics only work with referenct types, in c# this limitation doesn't exist.  
- For example `List<int>` is valid.

---


### Nullable Types

C# has two kinds of types:
- Value types such as:
    - int
    - double
    - bool
- Reference types such as:
    - string
    - List<int>
    - All classes define reference types

Value types can not be set to null: <br>
`int x = null //Error`  <br>
<br>
This is solved by adding a `?` to the value type: <br>
`int? x = null;`
<br>
<br>
More info:
- [Nullable value types - C# reference | Microsoft Docs](https://docs.microsoft.com/en-us/dotnet/csharp/programming-guide/nullable-types/)
- [Null-Conditional Operators | C# Introduction](https://ucll-vgo.github.io/csharp-intro/null-conditional-operators.html)

---

### Type interface

> Type inference refers to the compiler’s ability to infer (deduce) types from the surrounding code. 

#### Local variables

In the code below `List<int>` occurs twice:
```java
List<int> ns = new List<int>();
```

C# allows you to write:
```c#
var ns = new List<int>();
```

More info:
- [JEP 286: Local-Variable Type Inference](https://openjdk.java.net/jeps/286)

---

### Inheritance

#### Inheritance syntax

```java
//Java
class Foo extends Bar implements Baz
{

}
```

```c#
// C#
class Foo : Bar, IBaz
{

}
```
> Note that the superclass has to come first, followed by the interfaces.

#### Superconstructor

In Java, the superclass’s constructor is called as follows:
```java
// Java
class Foo extends Bar
{
    public Foo()
    {
        super();
    }
}
```

> super() must come first in the constructor’s body, C# enforces this by giving the programmer no choice

```C#
// C#
class Foo : Bar
{
    public Foo() : base()
    {

    }
}

```

> C# uses slightly different terminology: the superclass is called the base class, hence the keyword base.

---

#### Virtual

> In Java, every method is overrideable by default. C# does not agree with this choice. Methods in C# are **not** overridable by default, except if you explicitly make them so by adding the `virtual` keyword.

```c#
public class Foo
{
    public void NonoverrideableMethod() { ... }

    public virtual void OverrideableMethod() { ... }
}
```

#### Override

In Java `@Override` is not mandatory. In C# it is mandatory


```c#
// C#
public class Foo
{
    public virtual void bar() { ... }
    public virtual void qux() { ... }
}

public class : Foo
{
    public override void bar() { ... }

    public override void quks() { ... }
}
```

---

### Loggers

```
NullLogger: doet niks met de message  
StreamLogger: Elke keer dat een message de StreamLogger bereikt, passed naar StreamWriter  
FileLogger: Gespecialiseerde versie van StreamLogger maar gaat er vanuit dat de stream naar een file schrijft  
LogBroadcaster: als er meerdere logs zijn  
```
---

### Properties

This chapter is best explained here:
- [Properties | C# Introduction](https://ucll-vgo.github.io/csharp-intro/properties.html)

More info:
- [Properties - C# Programming Guide | Microsoft Docs](https://docs.microsoft.com/en-us/dotnet/csharp/programming-guide/classes-and-structs/properties)
- [Expression-bodied members - C# Programming Guide | Microsoft Docs](https://docs.microsoft.com/en-us/dotnet/csharp/programming-guide/statements-expressions-operators/expression-bodied-members)


---

### Events

This chapter is best explained here:
- [Events | C# Introduction](https://ucll-vgo.github.io/csharp-intro/events.html)

More info:
- [Events - C# Programming Guide | Microsoft Docs](https://docs.microsoft.com/en-us/dotnet/csharp/programming-guide/events/index)

---

### Lambdas

This chapter is best explained here:
- [Lambdas | C# Introduction](https://ucll-vgo.github.io/csharp-intro/lambdas.html)


More info:
- [Lambda expressions - C# reference | Microsoft Docs](https://docs.microsoft.com/en-us/dotnet/csharp/programming-guide/statements-expressions-operators/lambda-expressions)
- [Local functions - C# Programming Guide | Microsoft Docs](https://docs.microsoft.com/en-us/dotnet/csharp/programming-guide/classes-and-structs/local-functions)