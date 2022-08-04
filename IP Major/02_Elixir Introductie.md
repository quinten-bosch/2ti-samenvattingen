## Elixir Introductie
---

### 01. Basics

#### Hello World

```elixir
IO.puts("Hello World!")
```

#### Functions
> Elixir requires functions to be part of a module.


We can add multiple functions in one module.
```elixir
defmodule Temperature do
  def kelvin_to_celsius(t) do
    t - 273.15
  end

  def celsius_to_kelvin(t) do
    t + 273.15
  end
end
```

#### Predicates

In other languages functions that return a boolean value are often named `Isodd`, `isMale`.
Elixir uses a `?` after the function name.

```exs
defmodule Numbers do
  def odd?(x) do
    rem(x, 2) != 0
  end
  # Shorter notation for single-expression functions
  def even?(x), do: rem(x, 2) == 0
end
```

#### Interpolated strings

```elixir
def greet(name), do:
    "Hello, #{name}"
```

#### If

The elixir language has no return statement.
```exs
defmodule Numbers do
  def abs(n) do
    if n >= 0 do
      n
    else
      -n
    end
  end
end
```

#### Conditionals

In other languages you can chain `if, elif, else` together. Elixir has a slightly different concept for this.

```exs
defmodule Numbers do
  def sign(n) do
    cond do
      n > 0 -> 1
      n < 0 -> -1
      true  -> 0
    end
  end
end
```
The `true` at the end of the condition has the equivalent of `else`

#### Arity
> The arity allows for a limited form of overloading: the same function name can be reused by multiple functions as long as they have a different arity.

```exs
def foo(), do: ...
def foo(x), do: ...
def foo(x, y), do: ...
```

#### Guards

Where a statically typed language like Java would prohibit you from calling a function which requires an `int` with a `string`, Elixir has no such checks.
This is why we use `guards`.

```exs
def sign(n) when is_number(n) do
    cond do
      n > 0 -> 1
      n < 0 -> -1
      true  -> 0
    end
end
```

#### Multiple Clauses
> As you can see, Elixir allows you to split the definition of a single function into multiple clauses, each specialized in its very own part of the input. When foo is called, the different clauses are looked at in turn. As soon as a clause is found whose guard evaluates to true, the search for a matching clause ends and its corresponding body is evaluated. If no such clause is found, an error ensues.

```exs
def foo(x) when is_number(x) and x > 0, do: # Deal with positive x
def foo(x) when is_number(x), do: # Deal with nonpositive x
```

> Elixir allows you to mention specific values in the parameter list. This causes the clause to only be considered whenever the corresponding argument is equal to that value.

```exs
def sign(x) when x > 0 , do: 1
def sign(x) when x < 0 , do: -1
def sign(0), do: 0
```

#### Private Functions

```exs
# Elixir
defmodule Foo do
    defp bar() do
        ...
    end
end
```

> Note the extra p in defp. That's all there is to it. Now bar is only accessible to other functions in the same module.

#### Default parameter values
> The syntax for default parameters is as follows:

```exs
# Elixir
def foo(x \\ 5) do
    ...
end
```
---

### 02. Data Types

#### **Atoms**

> Atoms can be best compared to JavaScript's symbols, which you are probably not familiar with... So let's try a different approach. This is what an atom looks like: :abc. Want another one? Here you go: :hello. Still not satisfied? :avff.

> The real Elixir does just that: atoms are actually integers. Internally, a large table associating atoms to integers is kept. Whenever you mention an atom, Elixir will look it up in this table to see if it has been encountered before. If that is the case, the associated integer is returned. If not, the atom is added to the table and linked to an as of yet unused integer. This table is also kept synchronized across machines, allowing atoms to be used to communicate efficiently between machines.

```exs
defmodule Cards do
  defp numericValue(k) when is_number(k), do: k
  defp numericValue(:jack), do: 11
  defp numericValue(:queen), do: 12
  defp numericValue(:king), do: 13
  defp numericValue(:ace), do: 14

  def higher?(x, y), do: numericValue(x) > numericValue(y)
end
```
> Implement a function Cards.higher?(x, y) that checks whether x is a higher card than y. There are thirteen possible cards. They are, in increasing order of value: 2, ..., 10, :jack, :queen, :king, :ace.

---

#### **Tuples**

For this chapter reading the full explanation is strongly recommended:
- [GitHub - WannesFransen1994/elixir-learning-materials: repository that contains multiple learning materials with code examples.](https://github.com/WannesFransen1994/elixir-learning-materials)

#### Creation
> { 1, 2, 3 } is a tuple of three long, containing the elements 1, 2 and 3. You can put anything you want in a tuple, including other tuples. The elements don't need to have matching types.

Write a function Math.quotrem(x, y) that returns a tuple containing
- the quotient (integer division) of x and y.
- the remainder (modulo) of the division of x by y.

```exs
defmodule Math do
  def quotrem(x, y) when is_number(x) and is_number(y), do: { div(x, y), rem(x, y) }
end
```
---

#### Destructuring

> Tuples are also used to group related data together, such as objects do in OO-languages. For example, say you want to represent a card, which consists of a value (ace, 2...10, jack, queen, king) and a suit (hearts, clubs, spades and diamonds), you would use a tuple and introduce the convention to have the tuple's first element be the value and the second the suit: {value, suit}. The other way around would work as well, you only need to be consistent about it.

> Destructuring is also available in Elixir:

```exs
# Elixir
def doSomethingWithCard(card) do
    # Retrieve card components
    {value, suit} = card
    ...
end
```

> Say your function receives a tuple but is not interested in all its value, in order to ignore a value, you need to do so explicitly:

```exs
# Elixir
def caresOnlyAboutValue( { value, _ } ) do
    ...
end
```
---
#### Destructuring Remarketed

> Remember `cond`? That construct that replaces if-chains in Elixir? It looked like this:

```exs
cond do
  condition1 -> ...
  condition2 -> ...
  condition3 -> ...
end
```

> Turns out you can also use the similar `case` to pattern match!

```exs
case x do
  pattern1 -> ...
  pattern2 -> ...
  pattern3 -> ...
end
```

> In fact, you can even throw in some guards, too:

```exs
# For purists that don't consider 5 5 5 5 5 a real full house
def full_house?(cards) do
    case sort_cards_by_value(x) do
        {x, x, x, y, y} when x != y -> true
        {y, y, x, x, x} when x != y -> true
        _                           -> false
    end
end
```
---

### **Lists**

#### Creation

- [Lists · WannesFransen1994/elixir-learning-materials · GitHub](https://github.com/WannesFransen1994/elixir-learning-materials/blob/master/elixir-basics/reading-materials/lists.md)

Example
> We shortly study a simple function repeat(n, x) that creates a list containing n occurrences of x.


```exs
def repeat(0, x), do: []
def repeat(n, x), do: [x | repeat(n - 1, x)]
```
Make sure you take the time necessary to fully understand how this algorithm works.
- The base case is where n == 0 is simple: 0 repetitions of anything is simple the empty list.
- Next comes the inductive case. In general, writing this case consists of finding a way to express repeat(n, x) in terms of repeat(n - 1, x). In this example, the repetition of n×x is the equal to taking (n-1) × x, and adding an extra x to it.

#### Destructuring

Regarding tuples, we mentioned destructuring:

`{first, second, third} = tuple`

The same technique is available on lists:

```elixir
xs = [ 1, 2, 3, 4, 5 ]

[ head | tail ] = xs
# head == 1
# tail == [2, 3, 4, 5]

[ first, second | rest ] = xs
# first = 1
# second = 2
# rest = [3, 4, 5]
```
---


### **Maps**

Associative containers are data structures that associate values with keys. In Elixir, the built-in associative containers are called `Map`. Map literals take the form `%{key1 => val1, key2 => val2, ...}`.

> Given you are already familiar with map-like data structures, there is not a lot to tell. The main difference is that Elixir's maps cannot be modified, so that's something you'll have to keep in mind when interacting with them.

```exs
> Given a map, you'll probably want to read data from it. There are many ways to proceed:
map = %{a: 1, b: 2, c: 3}

# Map.get/2 returns nil if key is not part of map
value = Map.get(map, :a)    # value = 1
value = Map.get(map, :x)    # value = nil

# Map.get/3 returns default_if_missing in case of a missing key
value = Map.get(map, :b)       # value = 2
value = Map.get(map, :x, 0)    # value = 0

# Indexing operator returns nil for missing keys
value = map[:a]   # value = 1

# Indexing operator combined with ||
# Careful, there is a slight difference with Map.get/3!
# Cakepoint for first who tells us the difference
value = map[:x] || :oops   # value = :oops

# Destructuring
%{a => x} = map                   # x is now 1
%{a => x, b => y, c => z} = map   # x = 1, y = 2, z = 3
```

---

### First Class Functions

#### Receiving functions as parameter
- [Loops in Functional Languages · WannesFransen1994/elixir-learning-materials · GitHub](https://github.com/WannesFransen1994/elixir-learning-materials/blob/master/elixir-basics/reading-materials/loops.md)

Calling functions:
```exs
defmodule Hello do
  def hello() do
    IO.puts('hello')
  end
end

# Have func refer to hello
func = &Hello.hello/0

# Call hello directly
Hello.hello()

# Call via func
func.()
```


#### **Returning functions**

> Let's start simple. Say you have a function foo:

```exs
defmodule Foo do
    def foo(x) do
        ...
    end
end
```

> If you want to "pick up" foo as if it were a value, you need to use a special syntax in Elixir, namely &Foo.foo/1. The ampersand indicates "I am referring to a function here", the /1 corresponds to the arity.

```exs
defmodule Foo do
    # Referred to using &Foo.foo/0
    def foo() do
        ...
    end

    # Referred to using &Foo.foo/1
    def foo(x) do
        ...
    end

    # Referred to using &Foo.foo/2
    def foo(x, y) do
        ...
    end
end
```

> Once you "hold" the function, you can do whatever you want with it:

```exs
# Store it in a variable
f = &Foo.foo/1

# Pass it as argument
some_function(&Foo.foo/1)

# Return it
def bar() do
    &Foo.foo/1
end
```

#### **Lambdas**

```exs
def foo(x) do
    x
end

def get_foo() do
    &foo/1
end
```

Can be written as:

```exs
def get_foo() do
    fn x -> x end
end
```

---

### Goodbye Loops

Mostly excercises

---


### Recursion